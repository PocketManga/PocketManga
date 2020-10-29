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
                    <h4 class="mt-4" width="75%">Search for: <?=$Search?></h4>
                    <select class="float-right select-color1 mt-4" id="show-per-page" onchange="changePage('<?=Yii::$app->request->baseUrl.'/'?>',<?=$PageNumber?>)">
                        <option class="option-color1" value="25" <?php echo (25 == $NumberPerPage) ? 'selected="selected"' : ''?>><?=Yii::$app->params['Dictionary']['show-25']?></option>
                        <option class="option-color1" value="50" <?php echo (50 == $NumberPerPage) ? 'selected="selected"' : ''?>><?=Yii::$app->params['Dictionary']['show-50']?></option>
                        <option class="option-color1" value="100" <?php echo (100 == $NumberPerPage) ? 'selected="selected"' : ''?>><?=Yii::$app->params['Dictionary']['show-100']?></option>
                    </select>
                </div>
                <!-- Approach -->
                <div class="background-color3 radi-all-15 p-4">
                    <div class="row">
                        <?php if($Mangas){ 
                            $numberOnPage = 1; 
                            $numberOfManga = 1; 
                            foreach($Mangas as $Manga){ 
                                if($numberOnPage <= $NumberPerPage){
                                    if($numberOfManga>($NumberPerPage*($PageNumber-1)) && $numberOfManga<=($NumberPerPage*$PageNumber)){?>
                                        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                            <div class="d-flex justify-content-center">
                                                <a class="text-center" href="<?=Url::to('manga/'.$Manga->IdManga)?>">
                                                    <?php if($Manga->SrcImage){ if (file_exists(Yii::getAlias('@webroot').'/img'.$Manga->SrcImage)){ ?>
                                                    <img src="<?php echo Yii::$app->request->baseUrl.'/img'.$Manga->SrcImage?>" height="200" width="150">
                                                    <?php }else{ ?>
                                                    <img src="<?php echo Yii::$app->request->baseUrl.'/img/default/manga_alternative.jpg'?>" height="200" width="150">
                                                    <?php }}else{ ?>
                                                    <img src="<?php echo Yii::$app->request->baseUrl.'/img/default/manga_alternative.jpg'?>" height="200" width="150">
                                                    <?php } ?>
                                                    <p class="text-color2"> <?=$Manga->Title?> </p>
                                                </a>
                                            </div>
                                        </div>
                        <?php $numberOnPage++; } $numberOfManga++;}} ?>

                        <div class="col-12">
                            <ul class="pagination justify-content-end mb-0">

                                <?php if ($PageNumber == 1) { ?>
                                <li class="page-item disabled"><a class="page-link background-color1 text-color6 border-0" href="#">Previous</a></li>
                                <?php if ($NumOfPages > 3) { ?>
                                <li class="page-item active disabled"><a class="page-link background-color2 text-color1 border-0" href="#"><?=$PageNumber?></a></li>
                                <li class="page-item"><a class="page-link background-color1 text-color2 border-0" 
                                    href="<?=Url::to('search='.$Search.'_manga-per-page='.$NumberPerPage.'_page='.($PageNumber+1))?>"><?=$PageNumber+1?></a></li>
                                <li class="page-item"><a class="page-link background-color1 text-color2 border-0" 
                                    href="<?=Url::to('search='.$Search.'_manga-per-page='.$NumberPerPage.'_page='.($PageNumber+2))?>"><?=$PageNumber+2?></a></li>
                                <?php }}else{ ?>
                                <li class="page-item"><a class="page-link background-color1 text-color2 border-0" 
                                    href="<?=Url::to('search='.$Search.'_manga-per-page='.$NumberPerPage.'_page='.($PageNumber-1))?>">Previous</a></li>
                                <?php } ?>
                                
                                <?php if($NumOfPages <= 3 && ($PageNumber == 1 || $PageNumber == 2)){ for ($Pag = 1; $Pag <= $NumOfPages; $Pag++) { if($Pag == $PageNumber){ ?>
                                <li class="page-item active disabled"><a class="page-link background-color2 text-color1 border-0" href="#"><?=$Pag?></a></li>
                                <?php }else{ ?>
                                <li class="page-item"><a class="page-link background-color1 text-color2 border-0" 
                                    href="<?=Url::to('search='.$Search.'_manga-per-page='.$NumberPerPage.'_page='.$Pag)?>"><?=$Pag?></a></li>
                                <?php }}}else{ if($PageNumber != $NumOfPages && $PageNumber != 1){ ?>
                                <li class="page-item"><a class="page-link background-color1 text-color2 border-0" 
                                    href="<?=Url::to('search='.$Search.'_manga-per-page='.$NumberPerPage.'_page='.($PageNumber-1))?>"><?=$PageNumber-1?></a></li>
                                <li class="page-item active disabled"><a class="page-link background-color2 text-color1 border-0" href="#"><?=$PageNumber?></a></li>
                                <li class="page-item"><a class="page-link background-color1 text-color2 border-0" 
                                    href="<?=Url::to('search='.$Search.'_manga-per-page='.$NumberPerPage.'_page='.($PageNumber+1))?>"><?=$PageNumber+1?></a></li>
                                <?php }} ?>
                                
                                <?php if ($PageNumber == $NumOfPages) { if($NumOfPages >= 3){  ?>
                                <li class="page-item"><a class="page-link background-color1 text-color2 border-0" 
                                    href="<?=Url::to('search='.$Search.'_manga-per-page='.$NumberPerPage.'_page='.($PageNumber-2))?>"><?=$PageNumber-2?></a></li>
                                <li class="page-item"><a class="page-link background-color1 text-color2 border-0" 
                                    href="<?=Url::to('search='.$Search.'_manga-per-page='.$NumberPerPage.'_page='.($PageNumber-1))?>"><?=$PageNumber-1?></a></li>
                                <li class="page-item active disabled"><a class="page-link background-color2 text-color1 border-0" href="#"><?=$PageNumber?></a></li>
                                <?php } ?>
                                <li class="page-item disabled"><a class="page-link background-color1 text-color6 border-0" href="#">Next</a></li>
                                <?php }else{ ?>
                                <li class="page-item"><a class="page-link background-color1 text-color2 border-0" 
                                    href="<?=Url::to('search='.$Search.'_manga-per-page='.$NumberPerPage.'_page='.($PageNumber+1))?>">Next</a></li>
                                <?php } ?>

                            </ul>
                        </div>
                        <?php } else{ ?>
                        <div class="col">
                            <p class="text-color2"> There are no manga </p>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mt-4">
                <?php echo $this->render('//layouts/genre_list', ['Categories' => $Categories]); ?>
            </div>
        </div>
    </div>
</div>
