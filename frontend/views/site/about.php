<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About';
?>
<div class="background-color2 p-4 radi-all-15">
    <div class="container-fluid pb-4 px-4">
        <div class="row">
            <div class="col-8">
                <h1 class="text-color1"><?= Html::encode($this->title) ?></h1>
            </div>
            <div class="col-12 align-center my-4 pt-4 border-t-2px-solid-color3">
                <img width="100%" src="<?=Yii::$app->request->baseUrl.'/img/default/PocketManga2.png'?>" placeholder="PocketManga" />
            </div>
            <div class="col-12 ts-25">
                <h2 class="text-color6 text-center">Projet Developed by: <span class="text-color1">Edgar Oliveira Cordeiro => Nº2180640</span></h2>
            </div>
        </div>
    </div>
</div>
