<?php
    use yii\helpers\Url;
?>
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

    <?php if ($NumOfPages > 1) { ?>
    <div class="col-12">
        <ul class="pagination justify-content-end mb-0">
            <li class="page-item <?php echo($PageNumber == 1)? 'disabled':''?>">
                <a class="page-link background-color1 border-0 <?php echo($PageNumber == 1)? 'text-color6':'text-color2'?>" 
                    href="<?php echo($PageNumber == 1) ? '#':Url::to('home_order-by='.$Option.'_manga-per-page='.$NumberPerPage.'_page='.($PageNumber-1))?>">Previous</a>
            </li>
            <li class="page-item <?php echo($PageNumber == 1)? 'active disabled':''?>">
                <a class="page-link border-0 <?php echo($PageNumber == 1)? 'background-color2 text-color1':'background-color1 text-color2'?>" 
                    href="<?php echo($PageNumber == 1) ? '#':(($PageNumber != $NumOfPages || $NumOfPages == 2)?
                    Url::to('home_order-by='.$Option.'_manga-per-page='.$NumberPerPage.'_page='.($PageNumber-1)):
                    Url::to('home_order-by='.$Option.'_manga-per-page='.$NumberPerPage.'_page='.($PageNumber-2)))?>">
                    <?php echo($PageNumber == 1) ? 1:(($PageNumber != $NumOfPages || $NumOfPages == 2)?($PageNumber-1):($PageNumber-2))?></a>
            </li>
            <li class="page-item <?php echo($PageNumber == 2 || ($PageNumber != 1 && $PageNumber != $NumOfPages))? 'active disabled':''?>">
                <a class="page-link border-0 <?php echo($PageNumber == 2 || ($PageNumber != 1 && $PageNumber != $NumOfPages))? 'background-color2 text-color1':'background-color1 text-color2'?>" 
                    href="<?php echo($PageNumber == 2 || ($PageNumber != 1 && $PageNumber != $NumOfPages)) ? '#':(($PageNumber == 1)?
                    Url::to('home_order-by='.$Option.'_manga-per-page='.$NumberPerPage.'_page='.($PageNumber+1)):
                    Url::to('home_order-by='.$Option.'_manga-per-page='.$NumberPerPage.'_page='.($PageNumber-1)))?>">
                    <?php echo($PageNumber == 1) ? 2:(($PageNumber != $NumOfPages) ? $PageNumber:($PageNumber-1))?></a>
            </li>
            <?php if ($NumOfPages >= 3) { ?>
            <li class="page-item <?php echo($PageNumber == $NumOfPages)? 'active disabled':''?>">
                <a class="page-link border-0 <?php echo($PageNumber == $NumOfPages)? 'background-color2 text-color1':'background-color1 text-color2'?>" 
                    href="<?php echo($PageNumber == $NumOfPages) ? '#':(($PageNumber == 1)?
                    Url::to('home_order-by='.$Option.'_manga-per-page='.$NumberPerPage.'_page='.($PageNumber+2)):
                    Url::to('home_order-by='.$Option.'_manga-per-page='.$NumberPerPage.'_page='.($PageNumber+1)))?>">
                    <?php echo($PageNumber == 1) ? 3:(($PageNumber == $NumOfPages) ? $PageNumber:($PageNumber+1))?></a>
            </li>
            <?php } ?>
            <li class="page-item <?php echo($PageNumber == $NumOfPages)? 'disabled':''?>">
                <a class="page-link background-color1 border-0 <?php echo($PageNumber == $NumOfPages)? 'text-color6':'text-color2'?>" 
                    href="<?php echo($PageNumber == $NumOfPages) ? '#':Url::to('home_order-by='.$Option.'_manga-per-page='.$NumberPerPage.'_page='.($PageNumber+1))?>">Next</a>
            </li>
        </ul>

        <?php /***********************************      Code Page Number Tipo 2      ************************************//* ?>

        <ul class="pagination justify-content-end mb-0">

            <?php if ($PageNumber == 1) { ?>
            <li class="page-item disabled"><a class="page-link background-color1 text-color6 border-0" href="#">Previous</a></li>
            <?php if ($NumOfPages > 3) { ?>
            <li class="page-item active disabled"><a class="page-link background-color2 text-color1 border-0" href="#"><?=$PageNumber?></a></li>
            <li class="page-item"><a class="page-link background-color1 text-color2 border-0" 
                href="<?=Url::to('home_order-by='.$Option.'_manga-per-page='.$NumberPerPage.'_page='.($PageNumber+1))?>"><?=$PageNumber+1?></a></li>
            <li class="page-item"><a class="page-link background-color1 text-color2 border-0" 
                href="<?=Url::to('home_order-by='.$Option.'_manga-per-page='.$NumberPerPage.'_page='.($PageNumber+2))?>"><?=$PageNumber+2?></a></li>
            <?php }}else{ ?>
            <li class="page-item"><a class="page-link background-color1 text-color2 border-0" 
                href="<?=Url::to('home_order-by='.$Option.'_manga-per-page='.$NumberPerPage.'_page='.($PageNumber-1))?>">Previous</a></li>
            <?php } ?>
            
            <?php if($NumOfPages <= 3 && ($PageNumber == 1 || $PageNumber == 2)){ for ($Pag = 1; $Pag <= $NumOfPages; $Pag++) { if($Pag == $PageNumber){ ?>
            <li class="page-item active disabled"><a class="page-link background-color2 text-color1 border-0" href="#"><?=$Pag?></a></li>
            <?php }else{ ?>
            <li class="page-item"><a class="page-link background-color1 text-color2 border-0" 
                href="<?=Url::to('home_order-by='.$Option.'_manga-per-page='.$NumberPerPage.'_page='.$Pag)?>"><?=$Pag?></a></li>
            <?php }}}else{ if($PageNumber != $NumOfPages && $PageNumber != 1){ ?>
            <li class="page-item"><a class="page-link background-color1 text-color2 border-0" 
                href="<?=Url::to('home_order-by='.$Option.'_manga-per-page='.$NumberPerPage.'_page='.($PageNumber-1))?>"><?=$PageNumber-1?></a></li>
            <li class="page-item active disabled"><a class="page-link background-color2 text-color1 border-0" href="#"><?=$PageNumber?></a></li>
            <li class="page-item"><a class="page-link background-color1 text-color2 border-0" 
                href="<?=Url::to('home_order-by='.$Option.'_manga-per-page='.$NumberPerPage.'_page='.($PageNumber+1))?>"><?=$PageNumber+1?></a></li>
            <?php }} ?>
            
            <?php if ($PageNumber == $NumOfPages) { if($NumOfPages >= 3){  ?>
            <li class="page-item"><a class="page-link background-color1 text-color2 border-0" 
                href="<?=Url::to('home_order-by='.$Option.'_manga-per-page='.$NumberPerPage.'_page='.($PageNumber-2))?>"><?=$PageNumber-2?></a></li>
            <li class="page-item"><a class="page-link background-color1 text-color2 border-0" 
                href="<?=Url::to('home_order-by='.$Option.'_manga-per-page='.$NumberPerPage.'_page='.($PageNumber-1))?>"><?=$PageNumber-1?></a></li>
            <li class="page-item active disabled"><a class="page-link background-color2 text-color1 border-0" href="#"><?=$PageNumber?></a></li>
            <?php } ?>
            <li class="page-item disabled"><a class="page-link background-color1 text-color6 border-0" href="#">Next</a></li>
            <?php }else{ ?>
            <li class="page-item"><a class="page-link background-color1 text-color2 border-0" 
                href="<?=Url::to('home_order-by='.$Option.'_manga-per-page='.$NumberPerPage.'_page='.($PageNumber+1))?>">Next</a></li>
            <?php } ?>

        </ul>
        
        <?php /**/ ?>
    </div>
    <?php }} else{ ?>
    <div class="col">
        <p class="text-color2"> There are no manga </p>
    </div>
    <?php } ?>
</div>