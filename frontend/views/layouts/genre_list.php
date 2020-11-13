<?php
    use yii\helpers\Url;
?>
<div class="h-100 radi-all-15 background-color3">
    <div class="background-color1 radi-t-15">
        <p class="m-0 py-3 text-center text-color2">More Manga</p>
    </div>
    <div class="row">
        <svg class="col" width="100" height="50">
            <polygon points="50, 50, 100, 0, 0, 0" class="polygon-color1" />
        </svg>
        <div class="col pt-2">
            <span class="m-0 py-3 font-italic text-color2">Genres</span>
        </div>
    </div>
    <div class="py-3"> 
        <?php if($Categories) { foreach($Categories as $Category) { ?>
            <a href="<?=Yii::$app->request->baseUrl.'/search-for='.$Category->IdCategory.'_manga-per-page=50_page=1'?>"><p class="text-color1 mb-0 ml-4 mr-4 br-word bold"><?=$Category->Name?> (<?=count($Category->getMangas()->all())?>)</p></a>
        <?php }} ?>
    </div>
</div>