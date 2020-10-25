<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\AppLibrary */

$this->title = 'Create App Library';
$this->params['breadcrumbs'][] = ['label' => 'App Libraries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-library-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
