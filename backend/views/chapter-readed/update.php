<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ChapterReaded */

$this->title = 'Update Chapter Readed: ' . $model->Leitor_Id;
$this->params['breadcrumbs'][] = ['label' => 'Chapter Readeds', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Leitor_Id, 'url' => ['view', 'Leitor_Id' => $model->Leitor_Id, 'Chapter_Id' => $model->Chapter_Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="chapter-readed-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
