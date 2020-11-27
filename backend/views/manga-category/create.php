<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MangaCategory */

$this->title = 'Create Manga Category';
$this->params['breadcrumbs'][] = ['label' => 'Manga Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="manga-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
