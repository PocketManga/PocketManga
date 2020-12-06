<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Authors';
?>
<div class="author-index row">

    <div class="col-10">
        <h1 class="text-color2"><?= Html::encode($this->title) ?></h1>
    </div>
    <div class="col-2">
        <?= Html::a('Create Author', Yii::$app->request->baseUrl.'/'.'author/create', ['class' => 'btn btn-success w-100 background-color5']) ?>
    </div>
    <div class="col-12 mt-4 ts-25">
        <table class="table border-0 text-color2" id="table" width="100%">
            <thead>
                <tr>
                    <th class="border-b-2px-solid-color3 border-t-0">Name</th>
                    <th class="border-b-2px-solid-color3 border-t-0 text-center" style="max-width:100px; min-width:100px;">Options</th>
                </tr>
            </thead>
            <tbody>
                <?php if($Authors){ foreach($Authors as $Author){ ?>
                    <tr class="tr_list1">
                        <td class="border-b-2px-solid-color3 p-0"><a class="text-color2 w-100 h-100 no-hover" href="<?=Yii::$app->request->baseUrl.'/'.'author/'.$Author->IdAuthor?>"><div class="w-100 h-100 p-3"><?=$Author->FirstName.' '.$Author->LastName?></div></a></td>
                        <td class="border-b-2px-solid-color3 p-0 text-center align-middle">
                            <a href="<?=Yii::$app->request->baseUrl.'/'.'author/'.$Author->IdAuthor?>" class="btn btn-sm btn-outline-primary" title="Ficha completa"><i class="far fa-eye"></i></a>
                            <a href="<?=Yii::$app->request->baseUrl.'/'.'author/'.$Author->IdAuthor.'/edit'?>" class="btn btn-sm btn-outline-warning" title="Editar"><i class="fas fa-pencil-alt"></i></a>
                            <button data-toggle="modal" data-target="#deleteModal" data-slug="{{$client->slug}}" class="btn btn-sm btn-outline-danger" title="Eliminar"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                <?php }} ?>
            </tbody>
        </table>
    </div>

</div>
