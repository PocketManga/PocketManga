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
        <button class="background-color3 mx-4 border-0 mb-1" onclick="ReloadMangas(1);">
            <p class="text-color1 mb-0 br-word bold"><?=Yii::$app->params['Dictionary']['uncategorized']?> (<?=$CountUM?>)</p>
        </button>
        <button class="background-color3 mx-4 border-0 mb-1" onclick="ReloadMangas(null);">
            <p class="text-color1 mb-0 br-word bold"><?=Yii::$app->params['Dictionary']['all_manga']?> (<?=$CountAM?>)</p>
        </button>
        <?php if($Lists) { foreach($Lists as $list) { ?>
        <button class="background-color3 mx-4 border-0 mb-1" onclick="ReloadMangas(<?=$list->IdList?>);">
            <p class="text-color1 mb-0 br-word bold"><?=$list->Name?> (<?=count($list->GetLibraries()->where('Leitor_Id = '.Yii::$app->user->identity->leitor->IdLeitor)->all())?>)</p>
        </button>
        <?php }} ?>
    </div>
</div>