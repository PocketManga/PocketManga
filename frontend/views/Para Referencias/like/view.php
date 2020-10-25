<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Like */

$this->title = $model->User_Id;
$this->params['breadcrumbs'][] = ['label' => 'Likes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="like-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'User_Id' => $model->User_Id, 'Comment_Id' => $model->Comment_Id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'User_Id' => $model->User_Id, 'Comment_Id' => $model->Comment_Id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'User_Id',
            'Comment_Id',
        ],
    ]) ?>

</div>
