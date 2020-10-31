<div class="h-100 radi-all-15 background-color3">
    <div class="background-color1 radi-t-15">
        <p class="m-0 py-3 text-center text-color2">All Library Lists</p>
    </div>
    <div class="row">
        <svg class="col" width="100" height="50">
            <polygon points="50, 50, 100, 0, 0, 0" class="polygon-color1" />
        </svg>
    </div>
    <div class="py-3 float-right w-100"> 
        <a href="#"><p class="text-color1 mb-0 ml-4 mr-4 br-word bold"><?=Yii::$app->params['Dictionary']['uncategorized']?></p></a>
        <a href="#"><p class="text-color1 mb-0 ml-4 mr-4 br-word bold"><?=Yii::$app->params['Dictionary']['all_manga']?></p></a>
        <?php if($Lists) { foreach($Lists as $list) { ?>
            <a href="#"><p class="text-color1 mb-0 ml-4 mr-4 br-word bold"><?=$list->Name?> (<?=count($list->libraries)?>)</p></a>
        <?php }} ?>
    </div>
</div>