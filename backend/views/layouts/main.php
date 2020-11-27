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

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::$app->request->baseUrl; ?>/css/pocketmanga.css" />

        <?php if(Yii::$app->user->isGuest){ ?>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::$app->request->baseUrl; ?>/css/dark_theme.css" />
        <?php }else{ if(Yii::$app->user->identity->leitor->Theme){ ?>
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
        
        
        <div class="wrapper">
            <!-- Sidebar -->
            <nav class="background-color2" id="sidebar">
                <div class="sidebar-header text-center">
                    <a class="navbar-brand text-color1 m-0" href="<?=Yii::$app->homeUrl?>"><h3><?=Yii::$app->name?></h3></a>
                </div>

                <ul class="list-unstyled components">
                    <li>
                        <a class="nav-item text-color6" href="#">Home</a>
                    </li>
                    <p>Manga Section</p>
                    <li>
                        <a class="nav-item text-color6" href="#">Mangas</a>
                    </li>
                    <li>
                        <a class="nav-item text-color6" href="#">Authors</a>
                    </li>
                    <li>
                        <a class="nav-item text-color6" href="#">Categories</a>
                    </li>
                    <li>
                        <a class="nav-item text-color6" href="#">Language</a>
                    </li>
                    <p>User Section</p>
                    <li class="active">
                        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="nav-item dropdown-toggle text-color6">Home</a>
                        <ul class="collapse list-unstyled" id="homeSubmenu">
                            <li>
                                <a class="nav-item text-color6" href="#">Mangas</a>
                            </li>
                            <li>
                                <a class="nav-item text-color6" href="#">Home 2</a>
                            </li>
                            <li>
                                <a class="nav-item text-color6" href="#">Home 3</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="nav-item text-color6" href="#">Portfolio</a>
                    </li>
                    <li>
                        <a class="nav-item text-color6" href="#">Contact</a>
                    </li>
                </ul>

            </nav>
        </div>


        <div class="main">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>

        <footer class="footer background-color3">
            <div class="container">
                <p class="text-color1 m-0 pb-2">Projet Developed By: <span class="text-color2">Edgar Oliveira Cordeiro => Nº2180640</span></p>
            </div>
        </footer>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>