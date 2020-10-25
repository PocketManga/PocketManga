<?php
    use yii\helpers\Url;
?>

<div class="background-color2 radi-b-15">
    <div class="container-fluid pb-4 pr-4 pl-4">
        <div class="row">
            <div class="col">
                <div class="background-color3 radi-all-15 pt-4 px-4 pb-2 mt-4">
                    <div class="row">
                        <div class="col-12 mb-4">
                            <h4 class="text-color2"><?=$Manga->OriginalTitle?></h4>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-4">
                            <div class="d-flex justify-content-center">
                                <?php if($Manga->SrcImage){ if (file_exists(Yii::getAlias('@webroot').'/img'.$Manga->SrcImage)){ ?>
                                <img src="<?php echo Yii::$app->request->baseUrl.'/img'.$Manga->SrcImage?>" height="300" width="225">
                                <?php }else{ ?>
                                <img src="<?php echo Yii::$app->request->baseUrl.'/img/default/manga_alternative.jpg'?>" height="200" width="150">
                                <?php }}else{ ?>
                                <img src="<?php echo Yii::$app->request->baseUrl.'/img/default/manga_alternative.jpg'?>" height="200" width="150">
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <p class="text-color1">Original Title: <span class="text-color2"><?=$Manga->OriginalTitle?></span></p>
                            <p class="text-color1">Alternative Title: <span class="text-color2"><?=$Manga->AlternativeTitle?></span></p>
                            <p class="text-color1">Authors: 
                                <?php if($Authors) { foreach($Authors as $Author) { ?>
                                <a href="#"><span class="text-color2"><?=$Author->FirstName?><?php echo ($Author->LastName) ? ' '.$Author->LastName:''?></span></a>
                                <?php }} ?>
                            </p>
                            <p class="text-color1">OneShot: <span class="text-color2"><?php echo ($Manga->OneShot) ? 'Yes':'No'?></span></p>
                            <p class="text-color1">ReleaseDate: <span class="text-color2"><?=date_format(date_create($Manga->ReleaseDate),"d/m/Y")?></span></p>
                            <p class="text-color1">Status: <span class="text-color2"><?php echo ($Manga->Status) ? 'Completed':'Ongoing'?></span></p>
                            <p class="text-color1">Genres: 
                                <?php if($Genres) { foreach($Genres as $Genre) { ?>
                                <div class="background-color2 "><span class="text-color1"><?=$Genre->Name?></span></div>
                                <?php }} ?>
                            </p>
                        </div>
                        <div class="col-12 mt-4">
                            <p class="text-color1">Description:  <span class="text-color2"><?=$Manga->Description?></span></p>
                        </div>
                    </div>
                    <div class="background-color1 radi-all-15">
                        <?php if($Chapters) { ?>
                        <div class="ml-4 mr-1 mb-3 pb-3">
                            <div class="border-b-1px-solid-color1 mr-4">
                                <p class="text-color4 mb-1 pt-1 ml-2 pl-1">Chapter Name<span class="float-right mr-2 pr-1">Updated</span></p>
                            </div>
                            <ul class="p-0 mt-2 remove-bullet chapter-list scroll-type1">
                                <?php foreach($Chapters as $Chapter) { ?>
                                <a href="<?=Url::to('chapter/'.$Chapter->IdChapter)?>">
                                    <li class="pb-2 mr-3">
                                        <span class="text-color2">Chapter <?=$Chapter->Number?><?php echo ($Chapter->Name) ? ' - '.$Chapter->Name:''?></span>
                                        <span class="float-right text-color2"><?=date_format(date_create($Chapter->ReleaseDate),"d/m/Y")?></span>
                                    </li>
                                </a>
                                <?php } ?>
                            </ul>
                        </div>
                        <?php }else{ ?>
                            <p>No Chapters Available</p>
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
