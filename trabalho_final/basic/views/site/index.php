<?php
/* @var $this yii\web\View */
use yii\helpers\Html;

$this->title = 'Instituto de Computação';
?>

<div class="site-index">
    <div class="jumbotron" >
    	<?= Html::cssFile('@web/css/custom.css'); ?>
        <?= Html::img('@web/images/icomp.png',['align'=>'left']); ?>
        <?= Html::jsFile('@web/js/custom.js'); ?>
        <h1 id="icomp_title" class="icomptitlecima">Instituto de Computação</h1>
    </div>
    <div class="body-content">
    </div>
</div>