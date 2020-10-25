<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Apps';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create App', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'IdApp',
            'Theme',
            'MangaShow',
            'ChapterShow',
            'Language',
            //'MangaLanguage',
            //'Leitor_Id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
