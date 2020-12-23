<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Login';
?>
<div class="site-login align-center">
    <div class="row p-4 background-color3 mt-5 mr-5 float-right radi-all-15" style="width: 400px;">

        <div class="col-12">
            <h1 class="text-color2 bold"><?= Html::encode($this->title) ?></h1>
        </div>

        <div class="col-12">
            <p class="text-color2">Please fill out the following fields to login:</p>

            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                <p class = "text-color2 bold m-0">Username</p>
                <?= $form->field($model, 'username')->textInput(['class' => 'form-control radi-all-15 border-color1 background-color1 text-color2 bold'])->label(false) ?>

                <p class = "text-color2 bold m-0">Password</p>
                <?= $form->field($model, 'password')->passwordInput(['class' => 'form-control radi-all-15 border-color1 background-color1 text-color2 bold'])->label(false) ?>

                <?= $form->field($model, 'rememberMe', ['options' =>  ['class' => 'text-color2 bold text-right']])->checkbox() ?>

                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-block radi-all-15 background-color2 text-color1 border-0 bold', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>