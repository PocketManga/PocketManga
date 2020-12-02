<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Chapter Readeds';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chapter-readed-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Chapter Readed', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Leitor_Id',
            'Chapter_Id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
