<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\MangaReaded */

$this->title = 'Create Manga Readed';
$this->params['breadcrumbs'][] = ['label' => 'Manga Readeds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="manga-readed-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
