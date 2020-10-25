<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'App Libraries';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-library-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create App Library', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'App_Id',
            'Manga_Id',
            'List',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
