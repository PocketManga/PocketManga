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
                <div class="mb-4 row">
                    <div class="col">
                        <h4 class="mt-4">All Manga</h4>
                    </div>
                </div>
                <!-- Approach -->
                <div class="background-color3 radi-all-15 p-4">
                    <div class="row manga-list">
                        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 to-clone">
                            <div class="d-flex justify-content-center">
                                <a class="text-center tag-a" href="<?=Url::to('manga/')?>">
                                    <img class="tag-img" src="<?php echo Yii::$app->request->baseUrl.'/img'?>" height="200" width="150">
                                    <p class="text-color2 tag-p"> Title </p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p class="text-color2"> There are no manga </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
