<?php
    use yii\helpers\Url;
    $this->title = $Manga->Title.' - Chapter '.$Chapter->Number;
?>

<div class="background-color2 radi-all-15">
    <div class="container-fluid p-4">
        <div class="background-color3 radi-all-15 pt-4 px-4 pb-2">
            <ul class="remove-bullet pl-0">
                <div class="row">
                    <li class="col-12">
                        <div class="row">
                            <div class="col-3 pr-0">
                                <div class="mb-4 radi-tl-15 radi-bl-15 border-y-1px-solid-color2">
                                    <div class="<?=($Previous)?'background-color1':'background-color3'?> padd-y-7 radi-all-15">
                                        <a class="text-center <?=(!$Previous)?'disabled':''?>" href="<?=($Previous)?Yii::$app->request->baseUrl.'/'.'manga/'.$Manga->IdManga.'/'.'chapter/'.$Previous:''?>">
                                            <p class="<?=($Previous)?'text-color2':'text-color2'?> m-0 bold"> Previous Chapter </p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 px-0">
                                <div class="border-y-1px-solid-color2">
                                    <div class="background-color1 radi-all-15">
                                        <p class="text-color2 br-word w-100 bold px-4 padd-y-7 m-0"> <?= "S".$Chapter->Season." - Chapter ".$Chapter->Number.(($Chapter->Name)?" - ".$Chapter->Name:"") ?> </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 pl-0">
                                <div class="mb-4 radi-tr-15 radi-br-15 border-y-1px-solid-color2">
                                    <div class="<?=($Next)?'background-color1':'background-color3'?> padd-y-7 radi-all-15">
                                        <a class="text-center <?=(!$Next)?'disabled':''?>" href="<?=($Next)?Yii::$app->request->baseUrl.'/'.'manga/'.$Manga->IdManga.'/'.'chapter/'.$Next:''?>">
                                            <p class="<?=($Next)?'text-color2':'text-color2'?> m-0 bold"> Next Chapter </p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php for($Page = 0; $Page < $Chapter->PagesNumber; $Page++){ ?>
                    <li class="col-12 d-flex justify-content-center">
                        <?php if (file_exists(Yii::getAlias('@backend').'/web/img'.$Chapter->SrcFolder.'/'.str_pad($Page, 4, '0',false).'.jpg')){ ?>
                        <img class="chapter-image" src="<?= Yii::$app->urlManagerBackend->baseUrl.'/img'.$Chapter->SrcFolder.'/'.str_pad($Page, 4, '0',false).'.jpg'?>">
                        <?php }else{ ?>
                        <img class="chapter-image" src="<?= Yii::$app->urlManagerBackend->baseUrl.'/img/default/error_no_image.jpg'?>">
                        <?php } ?>
                    </li>
                    <?php } ?>
                    <li class="col-12">
                        <div class="row">
                            <div class="col-3 pr-0">
                                <div class="mb-4 radi-tl-15 radi-bl-15 border-y-1px-solid-color2 mt-4">
                                    <div class="<?=($Previous)?'background-color1':'background-color3'?> padd-y-7 radi-all-15">
                                        <a class="text-center <?=(!$Previous)?'disabled':''?>" href="<?=($Previous)?Yii::$app->request->baseUrl.'/'.'manga/'.$Manga->IdManga.'/'.'chapter/'.$Previous:''?>">
                                            <p class="<?=($Previous)?'text-color2':'text-color2'?> m-0 bold"> Previous Chapter </p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 px-0">
                                <div class="border-y-1px-solid-color2 mt-4">
                                    <div class="background-color1 radi-all-15">
                                        <p class="text-color2 br-word w-100 bold px-4 padd-y-7 m-0"> <?= "S".$Chapter->Season." - Chapter ".$Chapter->Number.(($Chapter->Name)?" - ".$Chapter->Name:"") ?> </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 pl-0">
                                <div class="mb-4 radi-tr-15 radi-br-15 border-y-1px-solid-color2 mt-4">
                                    <div class="<?=($Next)?'background-color1':'background-color3'?> padd-y-7 radi-all-15">
                                        <a class="text-center <?=(!$Next)?'disabled':''?>" href="<?=($Next)?Yii::$app->request->baseUrl.'/'.'manga/'.$Manga->IdManga.'/'.'chapter/'.$Next:''?>">
                                            <p class="<?=($Next)?'text-color2':'text-color2'?> m-0 bold"> Next Chapter </p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </div>
            </ul>
        </div>
    </div>
</div>
