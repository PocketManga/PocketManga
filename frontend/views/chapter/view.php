<?php
    use yii\helpers\Url;
    $this->title = $Manga->Title.' - Chapter '.$Chapter->Number;
?>

<div class="background-color2 radi-all-15">
    <div class="container-fluid p-4">
        <div class="background-color3 radi-all-15 pt-4 px-4 pb-2">
            <ul class="remove-bullet pl-0">
                <div class="row">
                    <?php for($Page = 0; $Page < $Chapter->PagesNumber; $Page++){ ?>
                    <li class="col-12 d-flex justify-content-center">
                        <?php if (file_exists(Yii::getAlias('@webroot').'/img'.$Chapter->SrcFolder.'/'.str_pad($Page, 4, '0',false).'.jpg')){ ?>
                        <img class="chapter-image" src="<?php echo Yii::$app->request->baseUrl.'/img'.$Chapter->SrcFolder.'/'.str_pad($Page, 4, '0',false).'.jpg'?>">
                        <?php }else{ ?>
                        <img class="chapter-image" src="<?php echo Yii::$app->request->baseUrl.'/img/default/manga_alternative.jpg'?>">
                        <?php } ?>
                    <li>
                    <?php } ?>
                </div>
            </ul>
        </div>
    </div>
</div>
