<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Manager */

$this->title = 'Create Manager';
?>
<div class="manager-create row p-4">

    <div class="col-12">
        <h1 class="text-color2"><?= Html::encode($this->title) ?></h1>
    </div>

    <div class="col-12">
        <div class="manager-form mt-4 pt-4 border-t-2px-solid-color3">

            <?php $form = ActiveForm::begin(); ?>

            <div class="row">
                <div class="col-md-6">
                    <p class = "text-color2 bold m-0">Chose the new Manager</p>
                    <?= $form->field($model, 'User_Id')->dropDownList($Users,['class'=>'radi-all-15 p-1 background-color1 border-0 w-100 text-color2'])->label(false) ?>
                </div>
                <div class="col-12 text-center mt-4 pt-4 border-t-2px-solid-color3">
                    <div class="form-group">
                        <?= Html::submitButton('Create Manager', ['class' => 'btn btn-success w-50 background-color5 text-color1 bold']) ?>
                    </div>
                </div>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>

</div>
