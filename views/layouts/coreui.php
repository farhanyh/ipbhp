<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\widgets\SideMenu;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="app sidebar-show sidebar-fixed">
<?php $this->beginBody() ?>
<!-- Header -->
<header class="app-header navbar">
    <a class="navbar-brand" href="#">Navbar</a>
    <ul class="nav navbar-nav ml-auto mr-3">
        <li class="nav-item px-3 active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item px-3">
            <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown px-3">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
            </div>
        </li>
        <li class="nav-item px-3">
            <a class="nav-link disabled" href="#">Disabled</a>
        </li>
    </ul>
</header>
<!-- End of Header -->

<!-- Body -->
<div class="app-body">
    <!-- Sidebar -->
    <div class="sidebar">
        <nav class="sidebar-nav">
            <ul class="nav">
                <?= SideMenu::widget(['menu' => Yii::$app->params['menu']]); ?>
            </ul>
        </nav>
    </div>
    <!-- End of Sidebar -->

    <!-- Main Section -->
    <main class="main">
        <!-- Breadcrumbs -->
        <nav aria-label="breadcrumb">
            <?= Breadcrumbs::widget([
                'itemTemplate' => '<li class="breadcrumb-item">{link}</li>',
                'activeItemTemplate' => '<li class="breadcrumb-item active" aria-current="page">{link}</li>',
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
        </nav>
        <!-- End of Breadcrumbs -->

        <!-- Content -->
        <div class="container-fluid">
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
        <!-- End of Content -->
    </main>
    <!-- End of Main Section -->

    <!-- Aside Menu -->
    <aside class="aside-menu">
        <?= isset($this->aside) ? $this->aside : '' ?>
    </aside>
    <!-- End of Aside Menu -->
</div>
<!-- End of Body -->

<!-- Footer -->
<footer class="app-footer">
    <?= isset($this->footer) ? $this->footer : '' ?>
</footer>
<!-- End of Footer -->
    
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
