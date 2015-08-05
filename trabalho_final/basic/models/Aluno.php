<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "aluno".
 *
 * @property integer $id
 * @property integer $matricula
 * @property string $nome
 * @property string $sexo
 * @property integer $id_curso
 * @property integer $ano_ingresso
 *
 * @property Curso $idCurso
 */
class Aluno extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    var $nome_curso;
    var $nome_sexo;

    
    public static function tableName()
    {
        return 'aluno';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['matricula', 'id_curso', 'ano_ingresso'], 'integer','message'=>'Este campo deve conter apenas números.'],
            [['matricula'], 'unique','message'=>'Esta matrícula já existe no sistema.'],
            [['nome'], 'string', 'max' => 200],
            [['nome'],'match','pattern'=>'/^[A-Za-z ]+$/u','message'=> 'Este campo deve conter apenas letras.'],
            [['sexo'], 'string', 'max' => 1],
            [['matricula', 'id_curso', 'ano_ingresso','nome', 'sexo'],'required','message'=>'Este campo é obrigatório'],
            [['curso','nome_curso'],'safe']  
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'matricula' => 'Matrícula',
            'nome' => 'Nome',
            'sexo' => 'Sexo',
            'nome_sexo' => 'Sexo',
            'id_curso' => 'Id Curso',
            'nome_curso' => 'Curso',
            'ano_ingresso' => 'Ano de Ingresso',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCurso()
    {
        return $this->hasOne(Curso::className(), ['id' => 'id_curso']);
        
    }
 
    public function afterFind() {
        
        $this->nome = ucwords(strtolower($this->nome));

        $modelCurso = Curso::findOne(Aluno::getIdCurso()->primaryModel->id_curso);
        if($modelCurso!=NULL){
            $this->nome_curso = $modelCurso->nome;
        }

        if($this->sexo == 'F'){
            $this->nome_sexo = 'Feminino';
        }
        else if($this->sexo == 'M'){
            $this->nome_sexo = 'Masculino';
        }
        parent::afterFind();
    }

    public function afterDelete()
    {
        Yii::$app->session->setFlash('sucess','Exercício 09 - Mensagem gerada no afterDelete() Aluno');
        if (parent::afterDelete()) {

            return true;
        } else {
            return false;
        }
    }
}
