<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Library */

$this->title = 'Update Library: ' . $model->Leitor_Id;
$this->params['breadcrumbs'][] = ['label' => 'Libraries', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Leitor_Id, 'url' => ['view', 'Leitor_Id' => $model->Leitor_Id, 'Manga_Id' => $model->Manga_Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="library-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
