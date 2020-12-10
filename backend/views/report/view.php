<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Report */

$this->title = $model->SubjectMatter;
\yii\web\YiiAsset::register($this);
?>
<div class="report-view row p-4">

    <div class="col-8">
        <h1 class="text-color2"><?= Html::encode($this->title) ?></h1>
    </div>

    <div class="col-2">
        <?php if ($model->Resolved) { ?>
        <?= Html::a('Unresolved', Yii::$app->request->baseUrl.'/'.'report/'.$model->IdReport.'/'.'unresolved', [
            'class' => 'btn btn-warning w-100 background-color4 text-color1 bold',
            'data' => [
                'confirm' => 'Are you sure the problem is not resolved?',
                'method' => 'post',
            ],
        ]) ?>
        <?php }else{ ?>
        <?= Html::a('Resolved', Yii::$app->request->baseUrl.'/'.'report/'.$model->IdReport.'/'.'resolved', [
            'class' => 'btn btn-success w-100 background-color5 text-color1 bold',
            'data' => [
                'confirm' => 'Is the problem resolved?',
                'method' => 'post',
            ],
        ]) ?>
        <?php } ?>
    </div>
    <div class="col-2">
        <?= Html::a('Delete', Yii::$app->request->baseUrl.'/'.'report/'.$model->IdReport.'/'.'delete', [
            'class' => 'btn btn-danger w-100 background-color6',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </div>
    <div class="col-12 mt-4 pt-4 border-t-2px-solid-color3">
        <div class="row">
            <div class="col-6">
                <p class="text-color1">Reader: <span class="text-color2 no-bold"><?=$model->leitor->user->Username?></span></p>
            </div>
            <div class="col-6">
                <p class="text-color1">Created: <span class="text-color2 no-bold"><?=$model->Created?></span></p>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="row">
            <div class="col-6">
                <?php if($model->Chapter_Id || $model->Manga_Id){ if($model->Chapter_Id){ ?>
                <p class="text-color1">Report on <span class="text-color2 no-bold">Chapter <?=$model->chapter->Number?></span> from manga <span class="text-color2 no-bold"><?=$model->chapter->manga->Title?></span></p>
                <?php } else { ?>
                <p class="text-color1">Report on manga <span class="text-color2 no-bold"><?=$model->chapter->manga->Title?></span></p>
                <?php }} ?>
            </div>
            <div class="col-6">
                <p class="text-color1">Resolved: <span class="text-color2 no-bold"><?=($model->Resolved)?'Yes':'No'?></span></p>
            </div>
        </div>
    </div>
    <div class="col-12">
        <p class="text-color1">Subject Matter: <span class="text-color2 no-bold"><?=$model->SubjectMatter?></span></p>
    </div>
    <div class="col-12">
        <p class="text-color1">Description:</p>
        <p class="text-color2 no-bold"><?=$model->Description?></p>
    </div>
    <?php if($model->SrcImage){?>
    <div class="col-12">
        <p class="text-color1 no-bold p-0 text-center">Reported Image</p>
        <?php if (file_exists(Yii::getAlias('@webroot').'/img'.$model->SrcImage)){ ?>
        <div class="text-center w-100">
            <img class="chapter-image" style="min-width:200px;" src="<?php echo Yii::$app->request->baseUrl.'/img'.$model->SrcImage?>">
        </div>
        <?php }else{ ?>
        <div class="text-center w-100">
            <img class="chapter-image" src="<?php echo Yii::$app->request->baseUrl.'/img/default/manga_alternative.jpg'?>">
        <div>
    </div>
        <?php } ?>
    </div>
    <?php }?>

</div>
