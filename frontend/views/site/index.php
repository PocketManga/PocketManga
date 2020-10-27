<?php

use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'PocketManga';
?>

<div class="background-color2 radi-tr-15 radi-b-15">
    <div class="container-fluid pb-4 px-4">
        <div class="row">
            <div class="col">
                <!-- Page Heading -->
                <div class="mb-4">
                    <select class="select-color1 mt-4" id="order-by" onchange="changePage('<?=Yii::$app->request->baseUrl.'/'.Url::to('latest-updates_numero-paginas=50_pagina=2')?>')">
                        <option class="option-color1" <?php echo ('latest-updates' == $Option) ? 'selected="selected"' : ''?>><?=Yii::$app->params['Dictionary']['latest-updates']?></option>
                        <option class="option-color1" <?php echo ('ranking' == $Option) ? 'selected="selected"' : ''?>><?=Yii::$app->params['Dictionary']['ranking']?></option>
                        <option class="option-color1" <?php echo ('popular' == $Option) ? 'selected="selected"' : ''?>><?=Yii::$app->params['Dictionary']['popular']?></option>
                    </select>
                    <select class="float-right select-color1 mt-4" id="order-by" onchange="changePage('<?=Yii::$app->request->baseUrl.'/'.Url::to('latest-updates_numero-paginas=50_pagina=2')?>')">
                        <option class="option-color1" <?php echo (25 == $NumberPerPage) ? 'selected="selected"' : ''?>><?=Yii::$app->params['Dictionary']['show-25']?></option>
                        <option class="option-color1" <?php echo (50 == $NumberPerPage) ? 'selected="selected"' : ''?>><?=Yii::$app->params['Dictionary']['show-50']?></option>
                        <option class="option-color1" <?php echo (100 == $NumberPerPage) ? 'selected="selected"' : ''?>><?=Yii::$app->params['Dictionary']['show-100']?></option>
                    </select>
                </div>
                <!-- Approach -->
                <div class="background-color3 radi-all-15 p-4">
                    <?php echo $this->render('partials/view_type1', ['Mangas' => $Mangas,'PageNumber' => $PageNumber,'NumOfPages' => $NumOfPages,]); ?>
                </div>
            </div>
            <div class="col-md-3 mt-4">
                <?php echo $this->render('//layouts/genre_list', ['Categories' => $Categories]); ?>
            </div>
        </div>
    </div>
</div>
