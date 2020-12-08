<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $Manga common\models\Manga */

$this->title = $Manga->Title;
\yii\web\YiiAsset::register($this);
?>
<div class="manga-view row p-4">
    <div class="col-8">
        <h1 class="text-color2"><?= Html::encode($this->title) ?></h1>
    </div>

    <div class="col-2">
        <?= Html::a('Update', Yii::$app->request->baseUrl.'/'.'manga/'.$Manga->IdManga.'/'.'update', ['class' => 'btn btn-primary w-100']) ?>
    </div>
    <div class="col-2">
        <?= Html::a('Delete', Yii::$app->request->baseUrl.'/'.'manga/'.$Manga->IdManga.'/'.'delete', [
            'class' => 'btn btn-danger w-100 background-color6',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </div>
    <div class="col-12 mt-4 ts-25">
        <div class="row bold">
            <div class="col-12 mb-4">
                <div class="d-flex justify-content-center">
                    <?php if($Manga->SrcImage){ if (file_exists(Yii::getAlias('@webroot').'/img'.$Manga->SrcImage)){ ?>
                    <img src="<?php echo Yii::$app->request->baseUrl.'/img'.$Manga->SrcImage?>" height="300" width="225">
                    <?php }else{ ?>
                    <img src="<?php echo Yii::$app->request->baseUrl.'/img/default/manga_alternative.jpg'?>" height="300" width="225">
                    <?php }}else{ ?>
                    <img src="<?php echo Yii::$app->request->baseUrl.'/img/default/manga_alternative.jpg'?>" height="300" width="225">
                    <?php } ?>
                </div>
            </div>
            <div class="col-8">
                <p class="text-color1">Original Title: <span class="text-color2 no-bold"><?=$Manga->OriginalTitle?></span></p>
            
                <p class="text-color1">Alternative Title: <span class="text-color2 no-bold"><?=$Manga->AlternativeTitle?></span></p>

                <p class="text-color1">Authors: 
                    <?php if($Authors) { foreach($Authors as $Author) { ?>
                    <span class="text-color2 no-bold"><?=($Authors[0] != $Author)?', ':''?></span>
                    <a href="#"><span class="text-color2 no-bold"><?=$Author->FirstName?><?php echo ($Author->LastName) ? ' '.$Author->LastName:''?></span></a>
                    <?php }} ?>
                </p>
                <div class="row">
                    <div class="col-auto">
                        <p class="text-color1 mb-0">Genres: </p>
                    </div>
                    
                    <?php if($Genres) { foreach($Genres as $Genre) { ?>
                    <div class="col-auto background-color2 radi-all-15 my-n1 py-1 mr-2"><span class="text-color1 no-bold"><?=$Genre->Name?></span></div>
                    <?php }} ?>
                </div>
            </div>
            <div class="col-4">
                <p class="text-color1">ReleaseDate: <span class="text-color2 no-bold"><?=date_format(date_create($Manga->ReleaseDate),"d/m/Y")?></span></p>
                <p class="text-color1">Status: <span class="text-color2 no-bold"><?php echo ($Manga->Status) ? 'Completed':'Ongoing'?></span></p>
                <p class="text-color1">R18: <span class="text-color2 no-bold"><?php echo ($Manga->OneShot) ? 'Yes':'No'?></span></p>
                <p class="text-color1">OneShot: <span class="text-color2 no-bold"><?php echo ($Manga->OneShot) ? 'Yes':'No'?></span></p>

            </div>
            <div class="col-12 mt-2">
                <p class="text-color1">Description:  <span class="text-color2 no-bold"><?=$Manga->Description?></span></p>
            </div>
        </div>
        <div class="background-color1 radi-all-15 pb-1">
            <table class="table border-0 text-color2" id="table" width="100%">
                <colgroup>
                <col span="1" style="width: 13%;">
                <col span="1" style="width: 20%;">
                <col span="1" style="width: 50%;">
                <col span="1" style="width: 17%;">
                </colgroup>
                <thead>
                    <tr>
                        <th class="border-b-2px-solid-color4 border-t-0 text-center">Season</th>
                        <th class="border-b-2px-solid-color4 border-t-0 text-center">Chapter</th>
                        <th class="border-b-2px-solid-color4 border-t-0 text-center">Title</th>
                        <th class="border-b-2px-solid-color4 border-t-0 text-center" style="max-width:100px; min-width:100px;">Options</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($Chapters){ foreach($Chapters as $Chapter){ ?>
                        <tr class="tr_list2">
                            <td class="border-b-2px-solid-color4 p-0 text-center"><a class="text-color2 w-100 h-100 no-hover" href="<?=Yii::$app->request->baseUrl.'/'.'manga/'.$Manga->IdManga.'/'.'chapter/'.$Chapter->IdChapter?>"><div class="w-100 h-100 p-3"><?='S'.$Chapter->Season?></div></a></td>
                            <td class="border-b-2px-solid-color4 p-0 text-center"><a class="text-color2 no-hover" href="<?=Yii::$app->request->baseUrl.'/'.'manga/'.$Manga->IdManga.'/'.'chapter/'.$Chapter->IdChapter?>"><div class="w-100 h-100 p-3"><?='Chapter '.$Chapter->Number?></div></a></td>
                            <td class="border-b-2px-solid-color4 p-0 text-center"><a class="text-color2 no-hover" href="<?=Yii::$app->request->baseUrl.'/'.'manga/'.$Manga->IdManga.'/'.'chapter/'.$Chapter->IdChapter?>"><div class="w-100 h-100 p-3"><?=$Chapter->Name?></div></a></td>
                            <td class="border-b-2px-solid-color4 p-0 text-center align-middle">
                                <a href="<?=Yii::$app->request->baseUrl.'/'.'manga/'.$Manga->IdManga.'/'.'chapter/'.$Chapter->IdChapter?>" class="btn btn-sm btn-outline-primary"><i class="far fa-eye"></i></a>
                                <a href="<?=Yii::$app->request->baseUrl.'/'.'manga/'.$Manga->IdManga.'/'.'chapter/'.$Chapter->IdChapter.'/edit'?>" class="btn btn-sm btn-outline-warning"><i class="fas fa-pencil-alt"></i></a>
                                <button data-toggle="modal" data-target="#deleteModal" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                    <?php }} ?>
                </tbody>
            </table>
            <div class="m-3 text-center">
                <?= Html::a('Create New Chapter', Yii::$app->request->baseUrl.'/'.'manga/'.$Manga->IdManga.'/'.'chapter/create', ['class' => 'btn btn-success w-100 background-color5']) ?>
            </div>
        </div>
    </div>
</div>
