<?php
    use yii\helpers\Url;
    use yii\widgets\ActiveForm;
    use yii\helpers\Html;
?>
<div class="row">
    <div class="col-12 my-n3 pr-0 background-color1 radi-all-15">
        <div class="border-b-1px-solid-color1 py-2 mr-0 row">
            <div class="col-sm-6 col-md-6 col-lg-5 col-xl-5"><span class="text-color4 mb-1 pt-1">Manga Title</span></div>
            <div class="col-sm-6 col-md-6 col-lg-2 col-xl-2 text-center"><span class="text-color4 mb-1 pt-1">Status</span></div>
            <div class="col-sm-6 col-md-6 col-lg-2 col-xl-2 text-center"><span class="text-color4 mb-1 pt-1">Readed</span></div>
            <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3 text-center"><span class="text-color4 mb-1 pt-1">List</span></div>
        </div>
        <ul class="p-0 mr-0 mt-2 remove-bullet manga-list">
            <li class="pt-2 mr-0 row to-clone">
                
                <div class="col-sm-6 col-md-6 col-lg-5 col-xl-5 br-word"><a id="link" href=""><span class="text-color2" id="title">Manga Title</span></a></div>
                
                <div class="col-sm-6 col-md-6 col-lg-2 col-xl-2 text-center"><span class="text-color2" id="status">Ongoing</span></div>
                <div class="col-sm-6 col-md-6 col-lg-2 col-xl-2 text-center">
                
                    <button class="border-0 background-color1" id="button-readed">
                        <span class="text-color4" id="readed">Unreaded</span>
                    </button>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3 text-center">
                    <select class="select-color2 text-color2 class-select-list" id="select-list">
                        <option class="option-color1 text-color2" id="option-Uncategorized" value="Uncategorized">Uncategorized</option>
                        <?php if($Lists){ foreach($Lists as $list){ ?>
                        <option class="option-color1 text-color2" id="option-<?=$list->Name?>" value="<?=$list->Name?>"><?=$list->Name?></option>
                        <?php }} ?>
                        <option class="option-color1 text-color2" value="new_list">+ New List</option>
                    </select>
                </div>
            </li>
        </ul>
    </div>
    <div class="col-12" style="display:none;">
        <p class="text-color2"> There are no manga </p>
    </div>
</div>