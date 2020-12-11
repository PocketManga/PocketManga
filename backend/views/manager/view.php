<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Manager */

$this->title = $model->user->Username;
\yii\web\YiiAsset::register($this);
?>
<div class="manager-view row p-4">

    <div class="col-8">
        <h1 class="text-color2"><?= Html::encode($this->title) ?></h1>
    </div>

    <div class="col-2">
        <?= Html::a('Update', Yii::$app->request->baseUrl.'/'.'manager/'.$model->IdManager.'/'.'update', ['class' => 'btn btn-primary w-100']) ?>
    </div>
    <div class="col-2">
        <?= Html::a('Delete', Yii::$app->request->baseUrl.'/'.'manager/'.$model->IdManager.'/'.'delete', [
            'class' => 'btn btn-danger w-100 background-color6',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </div>
    <div class="col-12 ts-25 mt-4 pt-4 border-t-2px-solid-color3">
        <div class="row bold">
            <div class="col-6 mb-4">
                <p class="text-color1">Username: <span class="text-color2 no-bold"><?=$model->user->Username?></span></p>
            </div>
            <div class="col-6 mb-4">
                <p class="text-color1">Email: <span class="text-color2 no-bold"><?=$model->user->Email?></span></p>
            </div>
            <div class="col-6 mb-4">
                <p class="text-color1">Genre: <span class="text-color2 no-bold"><?php if($model->user->Genre == 'M'){ echo 'Man';}else{if($model->user->Genre == 'F'){echo 'Woman';}else{echo 'Unknow';}}?></span></p>
            </div>
            <div class="col-6 mb-4">
                <p class="text-color1">Birth Date: <span class="text-color2 no-bold"><?=(new DateTime($model->user->BirthDate))->format('d/m/Y')?></span></p>
            </div>
            <div class="col-6 mb-4">
                <p class="text-color1">Status: <span class="text-color2 no-bold"><?=($model->user->status == 10)?'Active':'Inactive'?></span></p>
            </div>
            <div class="col-6 mb-4">
                <p class="text-color1">Theme: <span class="text-color2 no-bold"><?=($model->Theme)?'Dark':'Light'?></span></p>
            </div>
            <div class="col-6 mb-4">
                <p class="text-color1">Manager Type: <span class="text-color2 no-bold"><?=?></span></p>
            </div>
        </div>
    </div>
</div>
