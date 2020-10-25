<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Rating */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rating-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'User_Id')->textInput() ?>

    <?= $form->field($model, 'Manga_Id')->textInput() ?>

    <?= $form->field($model, 'Stars')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
