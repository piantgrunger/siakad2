s
<?php
/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\widgets\Alert;
use app\assets\AppAsset;

AppAsset::register($this);
use hscstudio\mimin\components\Mimin;

$menuItems =
    [
    [
        'visible' => !Yii::$app->user->isGuest,
        'label' => 'Manajemen User / Group',
        'icon' => 'fa fa-share',
        'url' => '#',
        'items' => [
            ['label' => 'App. Route', 'icon' => 'fa fa-circle-o', 'url' => ['/mimin/route/'], 'visible' => !Yii::$app->user->isGuest],
            ['label' => 'Role', 'icon' => 'fa fa-circle-o', 'url' => ['/mimin/role/'], 'visible' => !Yii::$app->user->isGuest],
            ['label' => 'User', 'icon' => ' fa fa-circle-o', 'url' => ['/mimin/user'], 'visible' => !Yii::$app->user->isGuest],
        ],
    ],
];

if (!Yii::$app->user->isGuest) {
    if (Yii::$app->user->identity->username !== 'admin') {
        $menuItems = Mimin::filterMenu($menuItems);
    }
}
$this->title = 'SIAKAD';
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language; ?>">
<head>
    <meta charset="<?= Yii::$app->charset; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags(); ?>
    <title><?= Html::encode($this->title); ?></title>
    <?php $this->head(); ?>
</head>
<body>
<?php $this->beginBody(); ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'SIAKAD',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-default navbar-fixed-top',
        ],
    ]);

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            [
                'label' => 'Logout',
                'url' => ['/site/logout'],
                'linkOptions' => ['data-method' => 'post'],
                'visible' => !Yii::$app->user->isGuest,
            ],
        ],
    ]);

    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]); ?>
		<?= Alert::widget(); ?>
        <?= $content; ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy;&nbsp;Sistem Informasi Akademik <?= date('Y'); ?></p>

    </div>
</footer>

<?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage(); ?>