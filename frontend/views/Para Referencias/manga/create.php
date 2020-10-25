<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Manga */

$this->title = 'Create Manga';
$this->params['breadcrumbs'][] = ['label' => 'Mangas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="manga-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
