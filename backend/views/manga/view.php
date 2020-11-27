<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Manga */

$this->title = $model->Title;
$this->params['breadcrumbs'][] = ['label' => 'Mangas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="manga-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->IdManga], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->IdManga], [
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
            'IdManga',
            'Title',
            'AlternativeTitle',
            'OriginalTitle',
            'Status',
            'OneShot',
            'R18',
            'Language',
            'SrcImage',
            'ReleaseDate',
            'Updated',
            'Description:ntext',
            'Slug',
            'Manager_Id',
        ],
    ]) ?>

</div>
