<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Leitor */

$this->title = $model->user->Username;
\yii\web\YiiAsset::register($this);
?>
<div class="leitor-view row p-4">

    <div class="col-10">
        <h1 class="text-color2"><?= Html::encode($this->title) ?></h1>
    </div>
    <?php /*
    <div class="col-2">
        <a href="" data-toggle="modal" data-target="#updateRole" class="btn btn-primary w-100"><span class="text">Update</span></a>
    </div>
    */ ?>
    <div class="col-2">
        <?= Html::a('Delete', Yii::$app->request->baseUrl.'/'.'manager/'.$model->IdLeitor.'/'.'delete', [
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
                <p class="text-color1">Gender: <span class="text-color2 no-bold"><?php if($model->user->Gender == 'M'){ echo 'Man';}else{if($model->user->Gender == 'F'){echo 'Woman';}else{echo 'Unknow';}}?></span></p>
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
                <p class="text-color1">Chapters Readed: <span class="text-color2 no-bold"><?='Has read '.count($model->chapterReadeds).' in total'?></span></p>
            </div>
            <div class="col-6 mb-4">
                <p class="text-color1">Favorites: <span class="text-color2 no-bold"><?='Has '.count($model->favorites).' mangas in total'?></span></p>
            </div>
            <div class="col-6 mb-4">
                <p class="text-color1">Library Lists: <span class="text-color2 no-bold"><?='Has '.count($Lists).' lists in total'?></span></p>
            </div>
            <div class="col-6 mb-4">
                <p class="text-color1">Library Mangas: <span class="text-color2 no-bold"><?='Has '.count($model->libraries).' mangas in total'?></span></p>
            </div>
        </div>
    </div>

</div>
