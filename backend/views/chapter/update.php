<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Chapter */

$this->title = 'Update Chapter: ' . $model->Name;
?>
<div class="chapter-update p-4">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
