<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Chapter */

$this->title = 'Update Chapter: ' . $model->Name;
$this->params['breadcrumbs'][] = ['label' => 'Chapters', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Name, 'url' => ['view', 'id' => $model->IdChapter]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="chapter-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
