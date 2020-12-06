<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Server */

$this->title = 'Update Server: ' . $model->Name;
$this->params['breadcrumbs'][] = ['label' => 'Servers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Name, 'url' => ['view', 'id' => $model->IdServer]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="server-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
