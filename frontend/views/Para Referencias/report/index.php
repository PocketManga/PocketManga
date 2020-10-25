<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Reports';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="report-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Report', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'IdReport',
            'SubjectMatter:ntext',
            'Description',
            'SrcImage',
            'Resolved',
            //'Created',
            //'Slug',
            //'Manga_Id',
            //'Chapter_Id',
            //'Leitor_Id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
