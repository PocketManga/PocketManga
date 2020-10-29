<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Chapters';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chapter-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Chapter', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'IdChapter',
            'Number',
            'Name',
            'ReleaseDate',
            'Updated',
            //'Season',
            //'OneShot',
            //'SrcFolder',
            //'Slug',
            //'Manga_Id',
            //'Manager_Id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
