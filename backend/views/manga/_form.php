<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Manga */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="manga-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'AlternativeTitle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'OriginalTitle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Status')->textInput() ?>

    <?= $form->field($model, 'OneShot')->textInput() ?>

    <?= $form->field($model, 'R18')->textInput() ?>

    <?= $form->field($model, 'Language')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SrcImage')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ReleaseDate')->textInput() ?>

    <?= $form->field($model, 'Updated')->textInput() ?>

    <?= $form->field($model, 'Description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Slug')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Manager_Id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
