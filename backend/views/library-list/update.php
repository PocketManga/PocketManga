<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\LibraryList */

$this->title = 'Update Library List: ' . $model->Name;
$this->params['breadcrumbs'][] = ['label' => 'Library Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Name, 'url' => ['view', 'id' => $model->IdList]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="library-list-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
