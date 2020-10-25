<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\LibraryList */

$this->title = 'Create Library List';
$this->params['breadcrumbs'][] = ['label' => 'Library Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="library-list-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
