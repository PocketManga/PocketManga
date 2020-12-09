<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form mt-4 pt-4 border-t-2px-solid-color3">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col">
            <p class = "text-color2 m-0">Name</p>
            <?= $form->field($model, 'Name')->textInput(['class' => 'p-1 w-100 radi-all-15 border-color1 background-color1 text-color2 bold', 'autocomplete'=>"off",'maxlength' => true])->label(false) ?>
        </div>

        <div class="col">
            <p class = "text-color2 m-0">Server</p>
            <?= $form->field($model, 'Server')->dropDownList($Servers,['class'=>'radi-all-15 p-1 background-color1 border-0 w-100 text-color2 align-center'],['options' =>[$model->Server => ['selected' => true]]])->label(false) ?>
        </div>

        <div class="col-12 text-center mt-4 pt-4 border-t-2px-solid-color3">
            <div class="form-group">
                <?= Html::submitButton('Save Category', ['class' => 'btn btn-success w-50 background-color5 text-color1 bold']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
