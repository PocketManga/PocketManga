<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mangas';
?>
<div class="manga-index">

    <h1 class="text-color2"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Manga', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <table class="table border-0 text-color2" id="table" width="100%">
        <thead>
            <tr>
                <th class="border-b-2px-solid-color3 border-t-0">Title</th>
                <th class="border-b-2px-solid-color3 border-t-0 text-center">Language</th>
                <th class="border-b-2px-solid-color3 border-t-0 text-center">Released</th>
                <th class="border-b-2px-solid-color3 border-t-0 text-center" style="max-width:100px; min-width:100px;">Options</th>
            </tr>
        </thead>
        <tbody>
            <?php if($Mangas){ foreach($Mangas as $Manga){ ?>
                <tr>
                    <td class="border-b-2px-solid-color3"><?=$Manga->Title?></td>
                    <td class="border-b-2px-solid-color3 text-center"><?=$Manga->Language?></td>
                    <td class="border-b-2px-solid-color3 text-center"><?=$Manga->ReleaseDate?></td>
                    <td class="border-b-2px-solid-color3 text-center align-middle">
                        <a href="<?=Yii::$app->request->baseUrl.'/'.'manga/'.$Manga->IdManga?>" class="btn btn-sm btn-outline-primary" title="Ficha completa"><i class="far fa-eye"></i></a>
                        <a href="<?=Yii::$app->request->baseUrl.'/'.'manga/'.$Manga->IdManga.'/edit'?>" class="btn btn-sm btn-outline-warning" title="Editar"><i class="fas fa-pencil-alt"></i></a>
                        <button data-toggle="modal" data-target="#deleteModal" data-slug="{{$client->slug}}" class="btn btn-sm btn-outline-danger" title="Eliminar"><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>
            <?php }} ?>
        </tbody>
    </table>
</div>
