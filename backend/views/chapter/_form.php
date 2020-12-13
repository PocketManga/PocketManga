<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Chapter */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="chapter-form mt-4 pt-4 border-t-2px-solid-color3">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-2">
            <p class = "text-color2 m-0 text-center">Season</p>
            <?= $form->field($model, 'Season')->textInput(['class' => 'p-1 w-100 text-center radi-all-15 border-color1 background-color1 text-color2 bold', 'autocomplete'=>"off",'maxlength' => true, 'type'=>'number'])->label(false) ?>
        </div>

        <div class="col-2">
            <p class = "text-color2 m-0 text-center">Chapter Number</p>
            <?= $form->field($model, 'Number')->textInput(['class' => 'p-1 w-100 text-center radi-all-15 border-color1 background-color1 text-color2 bold', 'autocomplete'=>"off",'maxlength' => true, 'type'=>'number'])->label(false) ?>
        </div>

        <div class="col-6">
            <p class = "text-color2 m-0 text-center">Name</p>
            <?= $form->field($model, 'Name')->textInput(['class' => 'p-1 w-100 radi-all-15 border-color1 background-color1 text-color2 bold', 'autocomplete'=>"off",'maxlength' => true])->label(false) ?>
        </div>

        <div class="col-2">
            <p class = "text-color2 m-0 text-center">Oneshot</p>
            <?= $form->field($model, 'OneShot')->dropDownList(['0' => 'No', '1' => 'Yes'],['class'=>'radi-all-15 p-1 background-color6 border-0 w-100 text-color1 align-center','id'=>'input-oneshot','onChange' => 'PressOneshotButton($(this).closest(".col"))'])->label(false) ?>
        </div>

        <div class="col-12 text-center mt-4 pt-4 border-t-2px-solid-color3">
            <div class="form-group">
                <?= Html::submitButton('Save Chapter', ['class' => 'btn btn-success w-50 background-color5 text-color1 bold']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script>
    function PressOneshotButton(div){
        var div = document.getElementById("input-oneshot");
        ChangeColor(div,6);
    }
    
    function ChangeColor(div,color){
        if(div.value == "0"){
            div.className = div.className.replace("background-color5", "background-color"+color);
        }else{
            div.className = div.className.replace("background-color"+color, "background-color5");
        }
    }
</script>