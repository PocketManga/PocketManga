<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\MangaAuthor */

$this->title = 'Update Manga Author: ' . $model->Author_Id;
$this->params['breadcrumbs'][] = ['label' => 'Manga Authors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Author_Id, 'url' => ['view', 'Author_Id' => $model->Author_Id, 'Manga_Id' => $model->Manga_Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="manga-author-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
