<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\MangaAuthor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="manga-author-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Author_Id')->textInput() ?>

    <?= $form->field($model, 'Manga_Id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
