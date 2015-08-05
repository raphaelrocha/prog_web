<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "curso".
 *
 * @property integer $id
 * @property string $sigla
 * @property string $nome
 *
 * @property Aluno[] $alunos
 */
class Curso extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'curso';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id','nome'], 'required', 'message'=>'Campo obrigatório.'],
            [['id'], 'integer','message'=>'Este campo só pode contar números.'],
            [['nome'],'match','pattern'=>'/^[A-Za-z ]+$/u','message'=> 'Este campo deve conter apenas letras.'],
            [['sigla'], 'string', 'max' => 4],
            [['nome'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sigla' => 'Sigla',
            'nome' => 'Nome',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlunos()
    {
        return $this->hasMany(Aluno::className(), ['id_curso' => 'id']);
    }


    public function afterDelete()
    {
        Yii::$app->session->setFlash('sucess','Exercício 09 - Mensagem gerada no afterDelete() Curso');
        if (parent::afterDelete()) {

            return true;
        } else {
            return false;
        }
    }
}
