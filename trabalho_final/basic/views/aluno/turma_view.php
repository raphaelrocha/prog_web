<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AlunoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Turma de '.$ano;
$this->params['breadcrumbs'][] = $this->title;
?>

<?= Html::cssFile('@web/css/custom.css'); ?>

<div class="aluno-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Aluno', ['create'], ['class' => 'btn btn-success']) ?>
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
            'matricula',
            'nome',
            //'sexo',
            //'id_curso',
            //'nome_curso',
            [
				'label' => 'nome_curso',
				'attribute' => 'id_curso',
				'value' => 'nome_curso',
				'filter' => ArrayHelper::map(app\models\Curso::find()->all(), 'id', 'nome'),
				//'enableSorting' => false,
            ],
            //'ano_ingresso',
            [
				'label' => 'ano_ingresso',
				'attribute' => 'ano_ingresso',
				'value' => 'ano_ingresso',
				'filter'=>false,

            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
