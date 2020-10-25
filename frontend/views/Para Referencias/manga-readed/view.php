<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\MangaReaded */

$this->title = $model->Leitor_Id;
$this->params['breadcrumbs'][] = ['label' => 'Manga Readeds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="manga-readed-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'Leitor_Id' => $model->Leitor_Id, 'Manga_Id' => $model->Manga_Id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'Leitor_Id' => $model->Leitor_Id, 'Manga_Id' => $model->Manga_Id], [
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
            'Leitor_Id',
            'Manga_Id',
        ],
    ]) ?>

</div>
