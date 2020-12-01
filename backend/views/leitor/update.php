<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Leitor */

$this->title = 'Update Leitor: ' . $model->IdLeitor;
$this->params['breadcrumbs'][] = ['label' => 'Leitors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IdLeitor, 'url' => ['view', 'id' => $model->IdLeitor]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="leitor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
