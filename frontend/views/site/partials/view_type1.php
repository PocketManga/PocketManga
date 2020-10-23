<div class="row">
    <?php if($Mangas){ foreach($Mangas as $Manga){ ?>
    <div class="col-md-2">
        <div class="d-flex justify-content-center">
            <a class="text-center" href="#">
                <?php if($Manga->Image_src){ if (file_exists(Yii::$app->request->baseUrl.'/img'.$Manga->Image_src)){ ?>
                <img class="" src="<?php echo Yii::$app->request->baseUrl.'/img'.$Manga->Image_src?>" height="200" width="150">
                <?php }else{ ?>
                <img class="" src="<?php echo Yii::$app->request->baseUrl.'/img/manga_alternative.jpg'?>" height="200" width="150">
                <?php }}else{ ?>
                <img class="" src="<?php echo Yii::$app->request->baseUrl.'/img/manga_alternative.jpg'?>" height="200" width="150">
                <?php } ?>
                <p class="text-color2"> <?=$Manga->Title?> </p>
            </a>
        </div>
    </div>
    <?php }} else{ ?>
    <div class="col">
        <p class="text-color2"> There are no manga </p>
    </div>
    <div class="col-md-12">
        <ul class="pagination justify-content-end mb-0">
            <li class="page-item disabled"><a class="page-link background-color1 text-color6 border-0" href="#">Previous</a></li>
            <li class="page-item active"><a class="page-link background-color2 text-color1 border-0" href="#">1</a></li>
            <li class="page-item"><a class="page-link background-color1 text-color2 border-0" href="#">2</a></li>
            <li class="page-item"><a class="page-link background-color1 text-color2 border-0" href="#">3</a></li>
            <li class="page-item"><a class="page-link background-color1 text-color2 border-0" href="#">Next</a></li>
        </ul>
    </div>
    <?php } ?>
</div>