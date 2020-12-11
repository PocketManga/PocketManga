<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\Manager */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="manager-form mt-4 pt-4 border-t-2px-solid-color3">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-6">
            <p class = "text-color2 font-weight-bold m-0">Username <span class="text-color6">*</span></p>
            <?= $form->field($model, 'Username')->textInput(['class' => 'form-control radi-all-15 border-color1 background-color1 text-color2', 'autocomplete'=>"off"])->label(false) ?>
        </div>

        <div class="col-6">
            <p class = "text-color2 bold m-0">Email <span class="text-color6">*</span></p>
            <?= $form->field($model, 'Email')->textInput(['class' => 'form-control radi-all-15 border-color1 background-color1 text-color2', 'autocomplete'=>"off"])->label(false) ?>
        </div>

        <div class="col-md-6">
            <p class = "text-color2 bold m-0">Genre</p>
            <?= $form->field($model, 'Genre')->dropDownList(['D' => 'Unknow', 'F' => 'Girl','M' => 'Boy'],['class'=>'radi-all-15 p-1 background-color1 border-0 w-100 text-color2 align-center'],['options' =>[$model->Genre => ['selected' => true]]])->label(false) ?>
        </div>

        <div class="col-md-6">
            <p class = "text-color2 bold m-0">Birth Date <span class="text-color6">*</span></p>
            <?= $form->field($model, 'BirthDate')->widget(DatePicker::classname(), ['dateFormat' => 'yyyy-MM-dd','options'=>['class'=>'radi-all-15 p-2 background-color1 border-0 text-color2','type'=>'date','ShowDayCellToolTips'=>false],'clientOptions' => ['changeYear' => true]])->label(false) ?>
        </div>
        <div class="col-12 text-center mt-4 pt-4 border-t-2px-solid-color3">
            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
