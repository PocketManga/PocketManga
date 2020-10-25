<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\MangaCategory */

$this->title = $model->Category_Id;
$this->params['breadcrumbs'][] = ['label' => 'Manga Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="manga-category-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'Category_Id' => $model->Category_Id, 'Manga_Id' => $model->Manga_Id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'Category_Id' => $model->Category_Id, 'Manga_Id' => $model->Manga_Id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Category_Id',
            'Manga_Id',
        ],
    ]) ?>

</div>
