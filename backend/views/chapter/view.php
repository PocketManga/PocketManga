<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Chapter */

$this->title = 'Chapter '.$model->Number;
\yii\web\YiiAsset::register($this);
?>
<div class="chapter-view row p-4">

    <div class="col-8">
        <h1 class="text-color2"><?= Html::encode($this->title) ?></h1>
    </div>

    <div class="col-2">
        <?= Html::a('Update', Yii::$app->request->baseUrl.'/'.'manga/'.$IdManga.'/'.'chapter/'.$model->IdChapter.'/'.'update', ['class' => 'btn btn-primary w-100']) ?>
    </div>
    <div class="col-2">
        <?= Html::a('Delete', Yii::$app->request->baseUrl.'/'.'manga/'.$IdManga.'/'.'chapter/'.$model->IdChapter.'/'.'delete', [
            'class' => 'btn btn-danger w-100 background-color6',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </div>
    <div class="col-12 mt-4 pt-4 border-t-2px-solid-color3">
        <div class="row">
            <div class="col">
                <p class="text-color1">Season: <span class="text-color2 no-bold"><?=$model->Season?></span></p>
            </div>
            <div class="col">
                <p class="text-color1">Chapter: <span class="text-color2 no-bold"><?=$model->Number?></span></p>
            </div>
            <div class="col-6">
                <p class="text-color1">Title: <span class="text-color2 no-bold"><?=$model->Name?></span></p>
            </div>
        </div>
        <div class="row">
            <div class="col-2">
                <p class="text-color1">Oneshot: <span class="text-color2 no-bold"><?=$model->OneShot?></span></p>
            </div>
            <div class="col">
                <p class="text-color1">Release Date: <span class="text-color2 no-bold"><?=$model->ReleaseDate?></span></p>
            </div>
            <div class="col">
                <p class="text-color1">Updated: <span class="text-color2 no-bold"><?=$model->Updated?></span></p>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="row justify-content-start">
            <?php for($Page = 0; $Page < $model->PagesNumber; $Page++){ ?>
            <div class="col p-1">
                <p class="text-color1 no-bold p-0 m-0 text-center">Image <?=$Page?></p>
                <?php if (file_exists(Yii::getAlias('@webroot').'/img'.$model->SrcFolder.'/'.str_pad($Page, 4, '0',false).'.jpg')){ ?>
                <img class="chapter-image" style="min-width:200px;" src="<?php echo Yii::$app->request->baseUrl.'/img'.$model->SrcFolder.'/'.str_pad($Page, 4, '0',false).'.jpg'?>">
                <?php }else{ ?>
                <img class="chapter-image" src="<?php echo Yii::$app->request->baseUrl.'/img/default/error_no_image.jpg'?>">
                <?php } ?>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
