<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Manager */

$this->title = 'Update Manager: ' . $model->IdManager;
$this->params['breadcrumbs'][] = ['label' => 'Managers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IdManager, 'url' => ['view', 'id' => $model->IdManager]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="manager-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
