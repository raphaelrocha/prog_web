<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property integer $id
 * @property string $login
 * @property string $senha
 * @property string $nome
 * @property string $email
 * @property string $pagina
 */
class Usuario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id','login','senha','nome','email'], 'required', 'message'=>'Campo obrigatório.'],
            [['id'], 'integer', 'message'=>'Este campo deve conter apenas números.'],
            [['login'], 'string', 'max' => 20],
            [['senha'], 'string', 'max' => 128],
            [['nome'],'match','pattern'=>'/^[A-Za-z ]+$/u','message'=> 'Nome só pode conter letras.'],
            [['nome', 'pagina'], 'string', 'max' => 200],
            [['email'], 'string', 'max' => 100],
            [['email'],'email','message'=>'e-Mail informado no é válido.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Login',
            'senha' => 'Senha',
            'nome' => 'Nome',
            'email' => 'e-Mail',
            'pagina' => 'Página',
        ];
    }
    
    public function afterDelete()
    {
        Yii::$app->session->setFlash('sucess','Exercício 09 - Mensagem gerada no afterDelete() Usuário');
        if (parent::afterDelete()) {

            return true;
        } else {
            return false;
        }
    }
}
