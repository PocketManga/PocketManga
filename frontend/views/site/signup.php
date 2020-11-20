<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Signup';
?>
<div class="background-color2 p-4 radi-all-15">
    <div class="container-fluid">
        <h4 class="mb-4 text-center bold text-color1"><?= Html::encode($this->title) ?></h4>
        <div class="d-flex justify-content-center">
            <div class="background-color3 radi-all-15 p-4 row w-50">
                <div class="col-12 p-0">
                    <p class = "text-color2">Please fill out the following fields to signup:</p>
                </div>

                <div class="col-12 p-0">
                    <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                        <p class = "text-color2 font-weight-bold m-0">Username</p>
                        <?= $form->field($model, 'username')->textInput(['class' => 'form-control background-color1 text-color2 bold', 'autocomplete'=>"off"])->label(false) ?>

                        <p class = "text-color2 bold m-0">Email</p>
                        <?= $form->field($model, 'email')->textInput(['class' => 'form-control background-color1 text-color2 bold', 'autocomplete'=>"off"])->label(false) ?>

                        <p class = "text-color2 bold m-0">Password</p>
                        <?= $form->field($model, 'password')->passwordInput(['class' => 'form-control background-color1 text-color2 bold', 'autocomplete'=>"off"])->label(false) ?>

                        <div class="form-group m-0 float-right">
                            <?= Html::submitButton('Signup', ['class' => 'btn btn-primary background-color2 text-color1 border-0 bold', 'name' => 'signup-button']) ?>
                        </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
