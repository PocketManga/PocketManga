<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Report */

$this->title = 'Update Report: ' . $model->IdReport;
$this->params['breadcrumbs'][] = ['label' => 'Reports', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IdReport, 'url' => ['view', 'id' => $model->IdReport]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="report-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
