<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Leitors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="leitor-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Leitor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'IdLeitor',
            'Theme',
            'MangaShow',
            'ChapterShow',
            'LibraryShow',
            //'LastVisit',
            //'Language',
            //'MangaLanguage',
            //'PrimaryList_Id',
            //'User_Id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
