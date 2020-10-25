<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\ChapterReaded */

$this->title = 'Create Chapter Readed';
$this->params['breadcrumbs'][] = ['label' => 'Chapter Readeds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chapter-readed-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
