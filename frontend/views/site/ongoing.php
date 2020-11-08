<?php

use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'PocketManga';
?>

<div class="background-color2 radi-all-15">
    <div class="container-fluid pb-4 px-4">
        <div class="row">
            <div class="col">
                <!-- Page Heading -->
                <div class="mb-4">
                    <select class="select-color1 mt-4" id="order-by" onchange="changePage('<?=Yii::$app->request->baseUrl.'/'?>','ongoing',1)">
                        <option class="option-color1" value="latest-updates" <?php echo ('latest-updates' == $Option) ? 'selected="selected"' : ''?>><?=Yii::$app->params['Dictionary']['latest-updates']?></option>
                        <option class="option-color1" value="ranking" <?php echo ('ranking' == $Option) ? 'selected="selected"' : ''?>><?=Yii::$app->params['Dictionary']['ranking']?></option>
                        <option class="option-color1" value="popular" <?php echo ('popular' == $Option) ? 'selected="selected"' : ''?>><?=Yii::$app->params['Dictionary']['popular']?></option>
                    </select>
                    <select class="float-right select-color1 mt-4" id="show-per-page" onchange="changePage('<?=Yii::$app->request->baseUrl.'/'?>','ongoing',<?=$PageNumber?>)">
                        <option class="option-color1" value="25" <?php echo (25 == $NumberPerPage) ? 'selected="selected"' : ''?>><?=Yii::$app->params['Dictionary']['show-25']?></option>
                        <option class="option-color1" value="50" <?php echo (50 == $NumberPerPage) ? 'selected="selected"' : ''?>><?=Yii::$app->params['Dictionary']['show-50']?></option>
                        <option class="option-color1" value="100" <?php echo (100 == $NumberPerPage) ? 'selected="selected"' : ''?>><?=Yii::$app->params['Dictionary']['show-100']?></option>
                    </select>
                </div>
                <!-- Approach -->
                <div class="background-color3 radi-all-15 p-4">
                    <?php echo $this->render('partials/view_type1', ['Option' => $Option, 'Mangas' => $Mangas,'PageNumber' => $PageNumber,'NumOfPages' => $NumOfPages,'NumberPerPage' => $NumberPerPage]); ?>
                </div>
            </div>
            <div class="col-md-3 mt-4">
                <?php echo $this->render('//layouts/genre_list', ['Categories' => $Categories]); ?>
            </div>
        </div>
    </div>
</div>
