<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\MangaCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="manga-category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Category_Id')->textInput() ?>

    <?= $form->field($model, 'Manga_Id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
