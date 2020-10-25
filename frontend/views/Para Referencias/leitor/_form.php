<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Leitor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="leitor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Theme')->textInput() ?>

    <?= $form->field($model, 'MangaShow')->dropDownList([ 1 => '1', 2 => '2', 3 => '3', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'ChapterShow')->textInput() ?>

    <?= $form->field($model, 'LibraryShow')->dropDownList([ 1 => '1', 2 => '2', 3 => '3', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'LastVisit')->textInput() ?>

    <?= $form->field($model, 'Language')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MangaLanguage')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PrimaryList_Id')->textInput() ?>

    <?= $form->field($model, 'User_Id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
