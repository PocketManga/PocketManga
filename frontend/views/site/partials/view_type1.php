<?php
    use yii\helpers\Url;
?>
<div class="row">
    <?php if($Mangas){ foreach($Mangas as $Manga){ ?>
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
    <?php }} else{ ?>
    <div class="col">
        <p class="text-color2"> There are no manga </p>
    </div>
    <?php } ?>

    <div class="col-12">
        <ul class="pagination justify-content-end mb-0">

            <?php if ($PaginaAtual == 1) { ?>
            <li class="page-item disabled"><a class="page-link background-color1 text-color6 border-0" href="#">Previous</a></li>
            <?php if ($NumPaginas > 3) { ?>
            <li class="page-item active"><a class="page-link background-color2 text-color1 border-0" href="#"><?=$PaginaAtual?></a></li>
            <li class="page-item"><a class="page-link background-color1 text-color2 border-0" href="#"><?=$PaginaAtual+1?></a></li>
            <li class="page-item"><a class="page-link background-color1 text-color2 border-0" href="#"><?=$PaginaAtual+2?></a></li>
            <?php }}else{ ?>
            <li class="page-item"><a class="page-link background-color1 text-color2 border-0" href="#">Previous</a></li>
            <?php } ?>
            
            <?php if($NumPaginas < 3 && ($PaginaAtual == 1 || $PaginaAtual == 2)){ for ($Pag = 1; $Pag <= $NumPaginas; $Pag++) { if($Pag == $PaginaAtual){ ?>
            <li class="page-item active"><a class="page-link background-color2 text-color1 border-0" href="#"><?=$Pag?></a></li>
            <?php }else{ ?>
            <li class="page-item"><a class="page-link background-color1 text-color2 border-0" href="#"><?=$Pag?></a></li>
            <?php }}}else{ if($PaginaAtual != $NumPaginas && $PaginaAtual != 1){ ?>
            <li class="page-item"><a class="page-link background-color1 text-color2 border-0" href="#"><?=$PaginaAtual-1?></a></li>
            <li class="page-item active"><a class="page-link background-color2 text-color1 border-0" href="#"><?=$PaginaAtual?></a></li>
            <li class="page-item"><a class="page-link background-color1 text-color2 border-0" href="#"><?=$PaginaAtual+1?></a></li>
            <?php }} ?>
            
            <?php if ($PaginaAtual == $NumPaginas) { if($NumPaginas >= 3){  ?>
            <li class="page-item"><a class="page-link background-color1 text-color2 border-0" href="#"><?=$PaginaAtual-2?></a></li>
            <li class="page-item"><a class="page-link background-color1 text-color2 border-0" href="#"><?=$PaginaAtual-1?></a></li>
            <li class="page-item active"><a class="page-link background-color2 text-color1 border-0" href="#"><?=$PaginaAtual?></a></li>
            <?php } ?>
            <li class="page-item disabled"><a class="page-link background-color1 text-color6 border-0" href="#">Next</a></li>
            <?php }else{ ?>
            <li class="page-item"><a class="page-link background-color1 text-color2 border-0" href="#">Next</a></li>
            <?php } ?>

        </ul>
    </div>
</div>