<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Category */

$this->title = 'Update Category: ' . $model->Name;
?>
<div class="category-update row p-4">

    <div class="col-12">
        <h1 class="text-color2"><?= Html::encode($this->title) ?></h1>
    </div>

    <div class="col-12">
        <?= $this->render('_form', [
            'model' => $model,
            'Servers' => $Servers,
        ]) ?>
    </div>

</div>
