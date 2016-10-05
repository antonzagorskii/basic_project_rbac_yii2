<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

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
        'brandLabel' => 'Mycompany',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Главная', 'url' => ['/site/index']],

            (!Yii::$app->user->isGuest && ( Yii::$app->user->can('settings/access') || Yii::$app->user->can('settings/users'))) ?
            [
                'label' => 'Настройки системы',
                'items' => [
                    '<li class="divider"></li>',
                    '<li class="dropdown-header">Управление Пользователями</li>',
                    [
                        'label' => 'Пользователи',
                        'url' => '/settings/users'
                    ],
                    '<li class="divider"></li>',
                    '<li class="dropdown-header">Настройки доступа</li>',
                    [
                        'label' => 'Управление ролями',
                        'url' => '/settings/access/role'
                    ],
                    [
                        'label' => 'Управление правилами',
                        'url' => '/settings/access/permission'
                    ],
                ],
            ]
            : '',

            Yii::$app->user->isGuest ? (
                ['label' => 'Войти', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Выйти (' . Yii::$app->user->identity->username . ')',
                    [
                        'class' => 'btn btn-link',
                        'style' => 'padding-top: 15px;padding-bottom: 15px;',
                    ]
                )
                . Html::endForm()
                . '</li>'
            )
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
