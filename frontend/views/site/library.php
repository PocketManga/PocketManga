<?php

use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'PocketManga';
?>

<div class="background-color2 radi-tl-15 radi-b-15">
    <div class="container-fluid pb-4 px-4">
        <div class="row">
            <div class="col-md-3 mt-4">
                <?php echo $this->render('//layouts/list_library_lists',['List' => $List,'Lists' => $Lists]); ?>
            </div>
            <div class="col">                
                <div class="mb-4">
                    <div class="col-12">
                        <h4 class="mt-4"><?=$List?></h4>
                    </div>
                </div>
                <div class="background-color3 radi-all-15 p-4">
                    <?php echo $this->render('partials/view_type3',['List' => $List,'Lists' => $Lists]); ?>
                </div>
            </div>
        </div>
    </div>
</div>
