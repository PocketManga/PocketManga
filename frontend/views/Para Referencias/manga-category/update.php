<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\MangaCategory */

$this->title = 'Update Manga Category: ' . $model->Category_Id;
$this->params['breadcrumbs'][] = ['label' => 'Manga Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Category_Id, 'url' => ['view', 'Category_Id' => $model->Category_Id, 'Manga_Id' => $model->Manga_Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="manga-category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
