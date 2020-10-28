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
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
            integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::$app->request->baseUrl; ?>/css/pocketmanga2.css" />

        <?php if(Yii::$app->user->isGuest){ ?>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::$app->request->baseUrl; ?>/css/dark_theme.css" />
        <?php }else{ if(Yii::$app->user->leitor->Theme){ ?>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::$app->request->baseUrl; ?>/css/dark_theme.css" />
        <?php }else{ ?>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::$app->request->baseUrl; ?>/css/light_theme.css" />
        <?php }} ?>
        

        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body class="background-color3">
        <?php $this->beginBody() ?>

        <div class="wrap">
            <nav class="fixed-top navbar navbar-expand-lg navbar-dark background-color3">
                <div class="container">
                    <!-- Brand -->
                    <a class="navbar-brand text-color2" href="<?=Yii::$app->homeUrl?>"><?=Yii::$app->name?></a>

                    <!-- Links -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <form class="form-inline my-2 my-lg-0">
                                <div class="input-group input-group-sm">
                                    <input class="form-control border-secondary py-2" type="search" placeholder="<?=Yii::$app->params['Dictionary']['search']?>">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown"><?=Yii::$app->params['Dictionary']['more']?></a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="<?=Url::to('about')?>"><?=Yii::$app->params['Dictionary']['about']?></a>
                                <a class="dropdown-item" href="<?=Url::to('contact')?>"><?=Yii::$app->params['Dictionary']['contact']?></a>
                            </div>
                        </li>
                        <?php if (Yii::$app->user->isGuest) { ?>
                        <li class="nav-item">
                            <a class="nav-link <?php if(Yii::$app->controller->route == 'site/signup') echo 'active'?>" href="<?=Url::to('signup')?>"><?=Yii::$app->params['Dictionary']['signup']?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if(Yii::$app->controller->route == 'site/index') echo 'login'?>" href="<?=Url::to('login')?>"><?=Yii::$app->params['Dictionary']['login']?></a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </nav>
            <div class="container">
                <ul class="nav nav-pills nav-justified">
                    <li class="nav-item">
                        <a class="nav-link <?php echo (Yii::$app->controller->route == 'site/index' || Yii::$app->controller->route == 'site/index2') ? 'active background-color2 text-color3' : 'text-color2'?>" href="<?=Url::to('home')?>" href="<?=Url::to('home')?>"><?=Yii::$app->params['Dictionary']['home']?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo (Yii::$app->controller->route == 'site/about') ? 'active background-color2 text-color3' : 'text-color2'?>" href="<?=Url::to('about')?>"><?=Yii::$app->params['Dictionary']['all_manga']?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo (Yii::$app->controller->route == 'site/contact') ? 'active background-color2 text-color3' : 'text-color2'?>" href="<?=Url::to('contact')?>"><?=Yii::$app->params['Dictionary']['ongoing']?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo (Yii::$app->controller->route == 'site/contact') ? 'active background-color2 text-color3' : 'text-color2'?>" href="<?=Url::to('contact')?>"><?=Yii::$app->params['Dictionary']['completed']?></a>
                    </li>
                    <?php if (Yii::$app->user->isGuest) { ?>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="<?=Url::to('signup')?>"><?=Yii::$app->params['Dictionary']['library']?></a>
                    </li>
                    <?php } else { ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo (Yii::$app->controller->route == 'site/signup') ? 'active background-color2 text-color3' : 'text-color2'?>" href="<?=Url::to('signup')?>"><?=Yii::$app->params['Dictionary']['library']?></a>
                    </li>
                    <?php } ?>
                </ul>
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
                <?= Alert::widget() ?>
                <?= $content ?>
            </div>
        </div>

        <footer class="footer background-color3">
            <div class="container">
                <p class="text-color1 m-0">Projet Developed By: <span class="text-color2">Edgar Oliveira Cordeiro => Nº2180640</span></p>
            </div>
        </footer>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>