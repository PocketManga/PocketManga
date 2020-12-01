<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mangas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="manga-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Manga', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'IdManga',
            'Title',
            'AlternativeTitle',
            'OriginalTitle',
            'Status',
            //'OneShot',
            //'R18',
            //'Language',
            //'SrcImage',
            //'ReleaseDate',
            //'Updated',
            //'Description:ntext',
            //'Slug',
            //'Manager_Id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
