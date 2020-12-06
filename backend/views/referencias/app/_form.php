<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\App */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="app-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Theme')->textInput() ?>

    <?= $form->field($model, 'MangaShow')->textInput() ?>

    <?= $form->field($model, 'ChapterShow')->textInput() ?>

    <?= $form->field($model, 'Server')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Leitor_Id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
