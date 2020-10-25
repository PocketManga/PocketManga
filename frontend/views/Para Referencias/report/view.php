<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Report */

$this->title = $model->IdReport;
$this->params['breadcrumbs'][] = ['label' => 'Reports', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="report-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->IdReport], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->IdReport], [
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
            'IdReport',
            'SubjectMatter:ntext',
            'Description',
            'SrcImage',
            'Resolved',
            'Created',
            'Slug',
            'Manga_Id',
            'Chapter_Id',
            'Leitor_Id',
        ],
    ]) ?>

</div>
