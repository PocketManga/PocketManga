<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\App */

$this->title = 'Update App: ' . $model->IdApp;
$this->params['breadcrumbs'][] = ['label' => 'Apps', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IdApp, 'url' => ['view', 'id' => $model->IdApp]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="app-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
