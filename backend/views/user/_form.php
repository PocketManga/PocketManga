<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Genre')->dropDownList([ 'F' => 'F', 'M' => 'M', 'D' => 'D', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'BirthDate')->textInput() ?>

    <?= $form->field($model, 'SrcPhoto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Created')->textInput() ?>

    <?= $form->field($model, 'Updated')->textInput() ?>

    <?= $form->field($model, 'Slug')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SoftDelete')->textInput() ?>

    <?= $form->field($model, 'auth_key')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password_hash')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password_reset_token')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'verification_token')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
