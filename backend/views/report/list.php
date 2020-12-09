<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Reports';
?>
<div class="report-index row p-4">
    <div class="col-10">
        <h1 class="text-color2"><?= Html::encode($this->title) ?></h1>
    </div>
    <div class="col-2">
        <?= Html::a('Create Report', Yii::$app->request->baseUrl.'/'.'report/create', ['class' => 'btn btn-success w-100 background-color5']) ?>
    </div>
    <div class="col-12 mt-4 ts-25">
        <table class="table border-0 text-color2" id="table" width="100%">
            <thead>
                <tr>
                    <th class="border-b-2px-solid-color3 border-t-0">Subject Matter</th>
                    <th class="border-b-2px-solid-color3 border-t-0 text-center">Created</th>
                    <th class="border-b-2px-solid-color3 border-t-0 text-center">Resolved</th>
                    <th class="border-b-2px-solid-color3 border-t-0 text-center" style="max-width:100px; min-width:100px;">Options</th>
                </tr>
            </thead>
            <tbody>
                <?php if($Reports){ foreach($Reports as $Report){ ?>
                    <tr class="tr_list1">
                        <td class="border-b-2px-solid-color3 p-0"><a class="text-color2 w-100 h-100 no-hover" href="<?=Yii::$app->request->baseUrl.'/'.'report/'.$Report->IdReport?>"><div class="w-100 h-100 p-3"><?=$Report->SubjectMatter?></div></a></td>
                        <td class="border-b-2px-solid-color3 p-0 text-center"><a class="text-color2 no-hover" href="<?=Yii::$app->request->baseUrl.'/'.'report/'.$Report->IdReport?>"><div class="w-100 h-100 p-3"><?=$Report->Created?></div></a></td>
                        <td class="border-b-2px-solid-color3 p-0 text-center"><a class="text-color2 no-hover" href="<?=Yii::$app->request->baseUrl.'/'.'report/'.$Report->IdReport?>"><div class="w-100 h-100 p-3"><?=$Report->Resolved?></div></a></td>
                        <td class="border-b-2px-solid-color3 p-0 text-center align-middle">
                            <a href="<?=Yii::$app->request->baseUrl.'/'.'report/'.$Report->IdReport?>" class="btn btn-sm btn-outline-primary"><i class="far fa-eye"></i></a>
                            <a href="<?=Yii::$app->request->baseUrl.'/'.'report/'.$Report->IdReport.'/update'?>" class="btn btn-sm btn-outline-warning"><i class="fas fa-pencil-alt"></i></a>
                            <a href="<?=Yii::$app->request->baseUrl.'/'.'report/'.$Report->IdReport.'/delete'?>" class="btn btn-sm btn-outline-danger" data-confirm="Are you sure you want to delete this item?" data-method="post"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                <?php }} ?>
            </tbody>
        </table>
    </div>
</div>
