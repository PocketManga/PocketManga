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

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::$app->request->baseUrl; ?>/css/<?=(Yii::$app->user->identity->manager->Theme)?'dark_theme':'light_theme'?>.css" />
        

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
                        <a class="nav-item text-color6" href="<?=Yii::$app->request->baseUrl?>">Home</a>
                    </li>
                    <p class="m-0 text-center bold">Manga Section</p>
                    <li>
                        <a class="nav-item text-color6" href="<?=Yii::$app->request->baseUrl.'/manga_list'?>">Manga</a>
                    </li>
                    <li>
                        <a class="nav-item text-color6" href="<?=Yii::$app->request->baseUrl.'/author_list'?>">Author</a>
                    </li>
                    <li>
                        <a class="nav-item text-color6" href="<?=Yii::$app->request->baseUrl.'/category_list'?>">Category</a>
                    </li>
                    <li>
                        <a class="nav-item text-color6" href="<?=Yii::$app->request->baseUrl.'/server_list'?>">Server</a>
                    </li>
                    <p class="m-0 text-center bold">User Section</p>
                    <li>
                        <a class="nav-item text-color6" href="<?=Yii::$app->request->baseUrl.'/manager_list'?>">Manager</a>
                    </li>
                    <li>
                        <a class="nav-item text-color6" href="<?=Yii::$app->request->baseUrl.'/reader_list'?>">Reader</a>
                    </li>
                    <p class="m-0 text-center bold">Report Section</p>
                    <li>
                        <a class="nav-item text-color6" href="<?=Yii::$app->request->baseUrl.'/report_list'?>">Report</a>
                    </li>

                    <p class="mx-0 text-center bold">My Account</p>
                    <li class="align-center">
                        <a class="nav-item pl-2 text-color6" href="<?=Yii::$app->request->baseUrl.'/my_account'?>">
                            <div class="row">
                                <div class="col-12">
                                    <?php if(Yii::$app->user->identity->SrcPhoto){ if (file_exists(Yii::getAlias('@webroot').'/img'.Yii::$app->user->identity->SrcPhoto)){ ?>
                                    <img class="radi-all-50p" src="<?=Yii::$app->request->baseUrl.'/img'.Yii::$app->user->identity->SrcPhoto?>" height="150" width="150">
                                    <?php }else{ ?>
                                    <img class="radi-all-50p" src="<?=Yii::$app->request->baseUrl.'/img/default/'.((Yii::$app->user->identity->Gender == "F")?'F':'M').'.jpg'?>" height="150" width="150">
                                    <?php }}else{ ?>
                                    <img class="radi-all-50p" src="<?=Yii::$app->request->baseUrl.'/img/default/'.((Yii::$app->user->identity->Gender == "F")?'F':'M').'.jpg'?>" height="150" width="150">
                                    <?php } ?>
                                </div>
                                <div class="col-12">
                                    <?=Yii::$app->user->identity->Username?>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>

            </nav>
        </div>


        <div class="main pb-4">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>

        <div style="height:50px;"></div>

        <footer class="footer background-color3 pt-2">
            <div class="container">
                <p class="text-color1 m-0 pb-2">Projet Developed By: <span class="text-color2">Edgar Oliveira Cordeiro => Nº2180640</span></p>
            </div>
        </footer>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>