<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Like */

$this->title = 'Update Like: ' . $model->User_Id;
$this->params['breadcrumbs'][] = ['label' => 'Likes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->User_Id, 'url' => ['view', 'User_Id' => $model->User_Id, 'Comment_Id' => $model->Comment_Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="like-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
