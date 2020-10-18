<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\bootstrap4\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <nav class="fixed-top navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container">
            <!-- Brand -->
            <a class="navbar-brand" href="<?=Yii::$app->homeUrl?>"><?=Yii::$app->name?></a>

            <!-- Links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?php if(Yii::$app->controller->route == 'site/index') echo 'active'?>" href="<?=Url::to('home')?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if(Yii::$app->controller->route == 'site/about') echo 'active'?>" href="<?=Url::to('about')?>">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if(Yii::$app->controller->route == 'site/contact') echo 'active'?>" href="<?=Url::to('contact')?>">Contact</a>
                </li>
                <?php if (Yii::$app->user->isGuest) { ?>
                <li class="nav-item">
                    <a class="nav-link <?php if(Yii::$app->controller->route == 'site/signup') echo 'active'?>" href="<?=Url::to('signup')?>">Signup</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if(Yii::$app->controller->route == 'site/index') echo 'login'?>" href="<?=Url::to('login')?>">Login</a>
                </li>
                <?php } ?>

                <!-- Dropdown -->
                <!--<li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    Dropdown link
                </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Link 1</a>
                        <a class="dropdown-item" href="#">Link 2</a>
                        <a class="dropdown-item" href="#">Link 3</a>
                    </div>
                </li>-->
            </ul>
        </div>
    </nav>
    <div class="container">
        <ul class="nav nav-pills nav-justified">
            <li class="nav-item">
                <a class="nav-link <?php if(Yii::$app->controller->route == 'site/index') echo 'active'?>" href="<?=Url::to('home')?>" href="<?=Url::to('home')?>">Latest</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if(Yii::$app->controller->route == 'site/about') echo 'active'?>" href="<?=Url::to('about')?>">All Manga</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if(Yii::$app->controller->route == 'site/contact') echo 'active'?>" href="<?=Url::to('contact')?>">Completed</a>
            </li>
            <?php if (Yii::$app->user->isGuest) { ?>
            <li class="nav-item">
                <a class="nav-link disabled" href="<?=Url::to('signup')?>">Library</a>
            </li>
            <?php } else { ?>
            <li class="nav-item">
                <a class="nav-link <?php if(Yii::$app->controller->route == 'site/signup') echo 'active'?>" href="<?=Url::to('signup')?>">Library</a>
            </li>
            <?php } ?>
        </ul><br>

        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
