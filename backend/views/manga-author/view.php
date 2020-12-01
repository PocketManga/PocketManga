<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\MangaAuthor */

$this->title = $model->Author_Id;
$this->params['breadcrumbs'][] = ['label' => 'Manga Authors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="manga-author-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'Author_Id' => $model->Author_Id, 'Manga_Id' => $model->Manga_Id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'Author_Id' => $model->Author_Id, 'Manga_Id' => $model->Manga_Id], [
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
            'Author_Id',
            'Manga_Id',
        ],
    ]) ?>

</div>
