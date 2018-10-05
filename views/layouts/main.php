
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

if (class_exists('ramosisw\CImaterial\web\MaterialAsset')) {
    ramosisw\CImaterial\web\MaterialAsset::register($this);
}
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
    <div class="sidebar" data-color="purple" data-image="../assets/img/sidebar-1.jpg">
			<!--
		        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"
		        Tip 2: you can also add an image using data-image tag
		    -->

			<div class="logo">
				<a href="http://www.creative-tim.com" class="simple-text">
					Creative Tim
				</a>
			</div>

	    	<div class="sidebar-wrapper">
	            <ul class="nav">
	                <li class="active">
	                    <a href="dashboard.html">
	                        <i class="material-icons">dashboard</i>
	                        <p>Dashboard</p>
	                    </a>
	                </li>
	                <li>
	                    <a href="user.html">
	                        <i class="material-icons">person</i>
	                        <p>User Profile</p>
	                    </a>
	                </li>
	                <li>
	                    <a href="table.html">
	                        <i class="material-icons">content_paste</i>
	                        <p>Table List</p>
	                    </a>
	                </li>
	                <li>
	                    <a href="typography.html">
	                        <i class="material-icons">library_books</i>
	                        <p>Typography</p>
	                    </a>
	                </li>
	                <li>
	                    <a href="icons.html">
	                        <i class="material-icons">bubble_chart</i>
	                        <p>Icons</p>
	                    </a>
	                </li>
	                <li>
	                    <a href="maps.html">
	                        <i class="material-icons">location_on</i>
	                        <p>Maps</p>
	                    </a>
	                </li>
	                <li>
	                    <a href="notifications.html">
	                        <i class="material-icons text-gray">notifications</i>
	                        <p>Notifications</p>
	                    </a>
	                </li>
					<li class="active-pro">
	                    <a href="upgrade.html">
	                        <i class="material-icons">unarchive</i>
	                        <p>Upgrade to PRO</p>
	                    </a>
	                </li>
	            </ul>
	    	</div>
	    </div>

	    <div class="main-panel">
    <?php
    NavBar::begin([
        'brandLabel' => 'SIAKAD',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-transparent navbar-absolute',
        ],
    ]);
    ?>
		<div class="container-fluid">
	<?php
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
    ?>
    </div>
    <?php

    NavBar::end();
    ?>
<div class="content">
    <div class="container-fluid">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]); ?>
		<?= Alert::widget(); ?>
        <?= $content; ?>
    </div>
</div>
</div>

</div>

<?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage(); ?>