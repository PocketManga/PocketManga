<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\AppLibrary */

$this->title = 'Update App Library: ' . $model->App_Id;
$this->params['breadcrumbs'][] = ['label' => 'App Libraries', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->App_Id, 'url' => ['view', 'App_Id' => $model->App_Id, 'Manga_Id' => $model->Manga_Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="app-library-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
