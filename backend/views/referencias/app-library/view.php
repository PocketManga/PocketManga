<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\AppLibrary */

$this->title = $model->App_Id;
$this->params['breadcrumbs'][] = ['label' => 'App Libraries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="app-library-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'App_Id' => $model->App_Id, 'Manga_Id' => $model->Manga_Id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'App_Id' => $model->App_Id, 'Manga_Id' => $model->Manga_Id], [
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
            'App_Id',
            'Manga_Id',
            'List',
        ],
    ]) ?>

</div>
