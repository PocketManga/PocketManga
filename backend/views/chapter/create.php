<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Chapter */

$this->title = 'Create Chapter';
?>
<div class="chapter-create row p-4">

    <div class="col-12">
        <h1 class="text-color2"><?= Html::encode($this->title) ?></h1>
    </div>

    <div class="col-12">
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>

</div>
