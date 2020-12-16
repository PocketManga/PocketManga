<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error row p-4">

    <div class="col-8">
        <h1 class="text-color2"><?= Html::encode($this->title) ?></h1>
    </div>

    <div class="col-12 mt-2 pt-2">
        <div class="alert alert-danger text-color1">
            <?= nl2br(Html::encode($message)) ?>
        </div>
    </div>

    <div class="col-12">
        <p class="text-color2">The above error occurred while the Web server was processing your request.</p>
    </div>
    <div class="col-12">
        <p class="text-color2">Please contact us if you think this is a server error. Thank you.</p>
    </div>

</div>
