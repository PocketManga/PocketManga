<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Manga */

$this->title = 'Update Manga: ' . $model->Title;
?>
<div class="manga-update row">

    <div class="col-12">
        <h1 class="text-color2"><?= Html::encode($this->title) ?></h1>
    </div>

    <div class="col-12">
        <?= $this->render('_form', [
            'model' => $model,
            'Authors' => $Authors,
            'Categories' => $Categories,
            'Servers' => $Servers,
            'RouteType' => $RouteType,
        ]) ?>
    </div>

</div>
