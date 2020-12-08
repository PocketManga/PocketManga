<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Category */

$this->title = $model->Name;
\yii\web\YiiAsset::register($this);
?>
<div class="category-view row p-4">

    <div class="col-8">
        <h1 class="text-color2"><?= Html::encode($this->title) ?></h1>
    </div>

    <div class="col-2">
        <?= Html::a('Update', Yii::$app->request->baseUrl.'/'.'category/'.$model->IdCategory.'/'.'update', ['class' => 'btn btn-primary w-100']) ?>
    </div>
    <div class="col-2">
        <?= Html::a('Delete', Yii::$app->request->baseUrl.'/'.'category/'.$model->IdCategory.'/'.'delete', [
            'class' => 'btn btn-danger w-100 background-color6',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </div>
    <div class="col-12 mt-4 mb-4 ts-25 bold">
        <p class="text-color1">Name: <span class="text-color2 no-bold"><?=$model->Name?></span></p>
    </div>
    
    <div class="col-12">
        <p class="text-color2">Category's Mangas</p>
    </div>
    <div class="col-12 background-color1 radi-all-15 pb-1">
        <table class="table border-0 text-color2" id="table" width="100%">
            <thead>
                <tr>
                    <th class="border-b-2px-solid-color4 border-t-0">Title</th>
                    <th class="border-b-2px-solid-color4 border-t-0 text-center">Server</th>
                    <th class="border-b-2px-solid-color4 border-t-0 text-center">Released</th>
                    <th class="border-b-2px-solid-color4 border-t-0 text-center" style="max-width:100px; min-width:100px;">Options</th>
                </tr>
            </thead>
            <tbody>
                <?php if($model->mangas){ foreach($model->mangas as $Manga){ ?>
                    <tr class="tr_list3">
                        <td class="border-b-2px-solid-color4 p-0"><a class="text-color2 w-100 h-100 no-hover" href="<?=Yii::$app->request->baseUrl.'/'.'manga/'.$Manga->IdManga?>"><div class="w-100 h-100 p-3"><?=$Manga->Title?></div></a></td>
                        <td class="border-b-2px-solid-color4 p-0 text-center"><a class="text-color2 no-hover" href="<?=Yii::$app->request->baseUrl.'/'.'manga/'.$Manga->IdManga?>"><div class="w-100 h-100 p-3"><?=$Manga->Server?></div></a></td>
                        <td class="border-b-2px-solid-color4 p-0 text-center"><a class="text-color2 no-hover" href="<?=Yii::$app->request->baseUrl.'/'.'manga/'.$Manga->IdManga?>"><div class="w-100 h-100 p-3"><?=$Manga->ReleaseDate?></div></a></td>
                        <td class="border-b-2px-solid-color4 p-0 text-center align-middle">
                            <a href="<?=Yii::$app->request->baseUrl.'/'.'manga/'.$Manga->IdManga?>" class="btn btn-sm btn-outline-primary"><i class="far fa-eye"></i></a>
                            <a href="<?=Yii::$app->request->baseUrl.'/'.'manga/'.$Manga->IdManga.'/update'?>" class="btn btn-sm btn-outline-warning"><i class="fas fa-pencil-alt"></i></a>
                            <button data-toggle="modal" data-target="#deleteModal" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                <?php }} ?>
            </tbody>
        </table>
    </div>

</div>
