<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Chapter */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="chapter-form mt-4 pt-4 border-t-2px-solid-color3">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Number')->textInput() ?>

    <?= $form->field($model, 'PagesNumber')->textInput() ?>

    <?= $form->field($model, 'Name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ReleaseDate')->textInput() ?>

    <?= $form->field($model, 'Updated')->textInput() ?>

    <?= $form->field($model, 'Season')->textInput() ?>

    <?= $form->field($model, 'OneShot')->textInput() ?>

    <?= $form->field($model, 'SrcFolder')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Manga_Id')->textInput() ?>

    <?= $form->field($model, 'Manager_Id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
