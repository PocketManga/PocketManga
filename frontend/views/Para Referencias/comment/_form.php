<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Comment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Comment')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Updated')->textInput() ?>

    <?= $form->field($model, 'Created')->textInput() ?>

    <?= $form->field($model, 'User_Id')->textInput() ?>

    <?= $form->field($model, 'Chapter_Id')->textInput() ?>

    <?= $form->field($model, 'Manga_Id')->textInput() ?>

    <?= $form->field($model, 'CommentDad_Id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
