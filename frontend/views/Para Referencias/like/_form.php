<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Like */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="like-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'User_Id')->textInput() ?>

    <?= $form->field($model, 'Comment_Id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
