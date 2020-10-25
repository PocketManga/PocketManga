<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Rating */

$this->title = 'Update Rating: ' . $model->User_Id;
$this->params['breadcrumbs'][] = ['label' => 'Ratings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->User_Id, 'url' => ['view', 'User_Id' => $model->User_Id, 'Manga_Id' => $model->Manga_Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="rating-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
