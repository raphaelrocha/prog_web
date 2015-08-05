<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Curso;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\Aluno */
/* @var $arrayCursos Array de cursos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="aluno-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'matricula')->textInput() ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

  
     <?= $form->field($model, 'sexo')->dropDownList(['F' => 'Feminino', 'M' => 'Masculino']); ?>

    <?= $form->field($model, 'id_curso')->dropDownList($arrayCursos, ['prompt'=>'Selecione o curso']); ?>

    
    <?= $form->field($model, 'ano_ingresso')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


