<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Manga */

$this->title = 'Update Manga: ' . $model->Title;
$this->params['breadcrumbs'][] = ['label' => 'Mangas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Title, 'url' => ['view', 'id' => $model->IdManga]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="manga-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
