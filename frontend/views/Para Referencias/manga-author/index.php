<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Manga Authors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="manga-author-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Manga Author', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Author_Id',
            'Manga_Id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
