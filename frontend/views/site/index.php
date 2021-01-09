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
                    <select class="select-color1 mt-4" id="order-by" onchange="changePage('<?=Yii::$app->request->baseUrl.'/'?>','home',1)">
                        <option class="option-color1" value="latest-updates" <?php echo ('latest-updates' == $Option) ? 'selected="selected"' : ''?>>Latest Updates</option>
                        <option class="option-color1" value="ranking" <?php echo ('ranking' == $Option) ? 'selected="selected"' : ''?>>Ranking</option>
                        <option class="option-color1" value="popular" <?php echo ('popular' == $Option) ? 'selected="selected"' : ''?>>Popular</option>
                    </select>
                    <select class="float-right select-color1 mt-4" id="show-per-page" onchange="changePage('<?=Yii::$app->request->baseUrl.'/'?>','home',<?=$PageNumber?>)">
                        <option class="option-color1" value="25" <?php echo (25 == $NumberPerPage) ? 'selected="selected"' : ''?>>Show mangas: 25 per page</option>
                        <option class="option-color1" value="50" <?php echo (50 == $NumberPerPage) ? 'selected="selected"' : ''?>>Show mangas: 50 per page</option>
                        <option class="option-color1" value="100" <?php echo (100 == $NumberPerPage) ? 'selected="selected"' : ''?>>Show mangas: 100 per page</option>
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
