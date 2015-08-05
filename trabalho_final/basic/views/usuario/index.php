<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuarios';
$this->params['breadcrumbs'][] = $this->title;
?>

<?= Html::cssFile('@web/css/custom.css'); ?>
<div class="usuario-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Usuario', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php  
    if(Yii::$app->session->getFlash('sucess')):?>
        <div class="sucess-summary">
            <?php echo Yii::$app->session->getFlash('sucess');  ?>
        </div>
     <?php endif; ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'login',
            //'senha',
            'nome',
            'email:email',
            // 'pagina',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
