<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <br><p><h4 style="color: blue">Este sistema é responsável pelo gerenciamento de alunos e professores do Instituto de Computação (IComp) .</h4></p></br>
    <p>
        Date:<?php echo $data;?>
    </p>
</div>