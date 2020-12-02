<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MangaAuthor */

$this->title = 'Create Manga Author';
$this->params['breadcrumbs'][] = ['label' => 'Manga Authors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="manga-author-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
