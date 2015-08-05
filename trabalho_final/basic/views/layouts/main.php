<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => 'Instituto de Computação',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    ['label' => 'Home', 'url' => ['/site/index']],
                    ['label' => 'About', 'url' => ['/site/about']],
                    ['label' => 'Contact', 'url' => ['/site/contact']],
                    ['label' => 'Aluno', 
                           'visible'=>!Yii::$app->user->isGuest,
                        'items' => [
                 ['label' => 'Adicionar Aluno', 'url' => ['/aluno/create']],
                 '<li class="divider"></li>',
                 ['label' => 'Gerenciar Alunos', 'url' => ['/aluno/index']],
                 ],
                    ],
                    ['label' => 'Curso',
                       'visible'=>!Yii::$app->user->isGuest,
                        'items' => [
                 ['label' => 'Adicionar Curso', 'url' => ['/curso/create']],
                 '<li class="divider"></li>',
                 ['label' => 'Gerenciar Cursos', 'url' => ['/curso/index']],
                 ],
                    ],
                    
                    ['label' => 'Usuário',
                        'visible'=>!Yii::$app->user->isGuest,
                        'items' => [
                 ['label' => 'Adicionar Usuário', 'url' => ['/usuario/create']],
                 '<li class="divider"></li>',
                 ['label' => 'Gerenciar Usuário', 'url' => ['/usuario/index']],
                 ],
                    ],
                    Yii::$app->user->isGuest ?
                        ['label' => 'Login', 'url' => ['/site/login']] :
                        ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                            'url' => ['/site/logout'],
                            'linkOptions' => ['data-method' => 'post']],
                ],
            ]);
            NavBar::end();
        ?>

        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; My Company <?= date('Y') ?></p>
            <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
