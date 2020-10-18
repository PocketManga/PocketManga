<?php

use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'PocketManga';
?>
<ul class="nav nav-pills nav-justified">
    <li class="nav-item">
        <a class="nav-link <?php if(Yii::$app->controller->route == 'site/index') echo 'active'?>" href="<?=Url::to('home')?>" href="<?=Url::to('home')?>"><?=Yii::$app->params['Dictionary']['latest']?></a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php if(Yii::$app->controller->route == 'site/about') echo 'active'?>" href="<?=Url::to('about')?>"><?=Yii::$app->params['Dictionary']['all_manga']?></a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php if(Yii::$app->controller->route == 'site/contact') echo 'active'?>" href="<?=Url::to('contact')?>"><?=Yii::$app->params['Dictionary']['ongoing']?></a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php if(Yii::$app->controller->route == 'site/contact') echo 'active'?>" href="<?=Url::to('contact')?>"><?=Yii::$app->params['Dictionary']['completed']?></a>
    </li>
    <?php if (Yii::$app->user->isGuest) { ?>
    <li class="nav-item">
        <a class="nav-link disabled" href="<?=Url::to('signup')?>"><?=Yii::$app->params['Dictionary']['library']?></a>
    </li>
    <?php } else { ?>
    <li class="nav-item">
        <a class="nav-link <?php if(Yii::$app->controller->route == 'site/signup') echo 'active'?>" href="<?=Url::to('signup')?>"><?=Yii::$app->params['Dictionary']['library']?></a>
    </li>
    <?php } ?>
</ul><br>

<div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
