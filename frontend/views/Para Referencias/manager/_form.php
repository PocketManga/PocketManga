<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Manager */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="manager-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Permission')->dropDownList([ 1 => '1', 2 => '2', 3 => '3', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'Language')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Theme')->textInput() ?>

    <?= $form->field($model, 'User_Id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
