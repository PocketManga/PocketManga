<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Server */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="server-form mt-4 pt-4 border-t-2px-solid-color3">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col">
            <p class = "text-color2 m-0">Name</p>
            <?= $form->field($model, 'Name')->textInput(['class' => 'p-1 w-100 radi-all-15 border-color1 background-color1 text-color2 bold', 'autocomplete'=>"off",'maxlength' => true])->label(false) ?>
        </div>

        <div class="col">
            <p class = "text-color2 m-0">Code</p>
            <?= $form->field($model, 'Code')->textInput(['class' => 'p-1 w-100 radi-all-15 border-color1 background-color1 text-color2 bold', 'autocomplete'=>"off",'maxlength' => true])->label(false) ?>
        </div>

        <div class="col-12 text-center mt-4 pt-4 border-t-2px-solid-color3">
            <div class="form-group">
                <?= Html::submitButton('Save Server', ['class' => 'btn btn-success w-50 background-color5 text-color1 bold']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
