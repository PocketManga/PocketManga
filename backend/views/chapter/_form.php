<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Chapter */
/* @var $form yii\widgets\ActiveForm */
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<div class="chapter-form mt-4 pt-4 border-t-2px-solid-color3">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-2">
            <p class = "text-color2 m-0 text-center">Season</p>
            <?= $form->field($model, 'Season')->textInput(['class' => 'p-1 w-100 text-center radi-all-15 border-color1 background-color1 text-color2 bold', 'autocomplete'=>"off",'maxlength' => true, 'type'=>'number'])->label(false) ?>
        </div>

        <div class="col-2">
            <p class = "text-color2 m-0 text-center">Chapter Number</p>
            <?= $form->field($model, 'Number')->textInput(['class' => 'p-1 w-100 text-center radi-all-15 border-color1 background-color1 text-color2 bold', 'autocomplete'=>"off",'maxlength' => true, 'type'=>'number'])->label(false) ?>
        </div>

        <div class="col-6">
            <p class = "text-color2 m-0 text-center">Name</p>
            <?= $form->field($model, 'Name')->textInput(['class' => 'p-1 w-100 radi-all-15 border-color1 background-color1 text-color2 bold', 'autocomplete'=>"off",'maxlength' => true])->label(false) ?>
        </div>

        <div class="col-2">
            <p class = "text-color2 m-0 text-center">Oneshot</p>
            <?= $form->field($model, 'OneShot')->dropDownList(['0' => 'No', '1' => 'Yes'],['class'=>'radi-all-15 p-1 background-color6 border-0 w-100 text-color1 align-center','id'=>'input-oneshot','onChange' => 'PressOneshotButton($(this).closest(".col"))'])->label(false) ?>
        </div>
        
        <div class="col-12 background-color1 p-4 radi-all-15">
            <div class="row">
                <div class="col-12">
                    <p class = "text-color2 m-0 text-center">Only jpg files!!</p>
                </div>
            </div>
            <div class="row mb-n3" id="list-images">
                <?php $num = 1; if($Imgs){ foreach($Imgs as $Img) { ?>
                <div class="col-auto" id="div-clone-<?=$num?>">
                    <a id="tag-a-prev-<?=$num?>" style="cursor: pointer;" onclick="return ClickChange(<?=$num?>)">
                        <img id="uploadPreview-<?=$num?>" class="border-all-1px-solid-color2" style="max-width:200px;" src="<?=$Img?>"/>
                    </a>
                    <?= $form->field($model, 'Images[]')->fileInput(['id' => 'uploadImage-'.$num, 'onchange'=>'PreviewImage('.$num.',"'.$Img.'");', 'style'=>'display:none;'])->label(false);?>
                    
                    <!-- Removido para evitar problemas desnecessários, e por não ter tido tempo para arranjar uma forma de evitar esses problemas-->
                    <!--<a id="tag-a-delete-<?=$num?>" style="cursor: pointer;" onClick="removeImage(<?=$num?>)" class="no-hover text-color3 radi-all-50p background-color6 btn-on-img"><span class="m-2">X</span></a>-->
                </div>
                <?php $num++;}} ?>
                <div class="col-auto" id="div-clone-<?=$num?>">
                    <a id="tag-a-prev-<?=$num?>" style="cursor: pointer;" onclick="return ClickChange(<?=$num?>)">
                        <img id="uploadPreview-<?=$num?>" class="border-all-1px-solid-color2" style="max-width:200px;" src="<?=Yii::$app->request->baseUrl.'/img/default/addImg2.png'?>"/>
                    </a>
                    <?= $form->field($model, 'Images[]')->fileInput(['id' => 'uploadImage-'.$num, 'onchange'=>'PreviewImage('.$num.',"'.Yii::$app->request->baseUrl.'/img/default/addImg2.png'.'");', 'style'=>'display:none;'])->label(false);?>
                    
                    <a id="tag-a-delete-<?=$num?>" style="cursor: pointer; display:none;" onClick="removeImage(<?=$num?>)" class="no-hover text-color3 radi-all-50p background-color6 btn-on-img"><span class="m-2">X</span></a>
                </div>
                <div class="col-auto to-clone" id="div-clone-0">
                    <a id="tag-a-prev-0" style="cursor: pointer;" onclick="return ClickChange(0)">
                        <img id="uploadPreview-0" class="border-all-1px-solid-color2" style="max-width:200px;" src="<?=Yii::$app->request->baseUrl.'/img/default/addImg2.png'?>"/>
                    </a>
                    <?= $form->field($model, 'Images[]')->fileInput(['id' => 'uploadImage-0', 'onchange'=>'PreviewImage(0,"'.Yii::$app->request->baseUrl.'/img/default/addImg2.png'.'");', 'style'=>'display:none;'])->label(false);?>
                    
                    <a id="tag-a-delete-0" style="cursor: pointer; display:none;" onClick="removeImage(0)" class="no-hover text-color3 radi-all-50p background-color6 btn-on-img"><span class="m-2">X</span></a>
                </div>
            </div>
        </div>

        <div class="col-12 text-center mt-4 pt-4 border-t-2px-solid-color3">
            <div class="form-group">
                <?= Html::submitButton('Save Chapter', ['class' => 'btn btn-success w-50 background-color5 text-color1 bold']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script type="text/javascript">
    var clone = $('.to-clone').clone();
    $('.to-clone').remove();

    function PressOneshotButton(div){
        var div = document.getElementById("input-oneshot");
        ChangeColor(div,6);
    }
    
    function ChangeColor(div,color){
        if(div.value == "0"){
            div.className = div.className.replace("background-color5", "background-color"+color);
        }else{
            div.className = div.className.replace("background-color"+color, "background-color5");
        }
    }
    
    function removeImage(thisNum){
        $("#div-clone-"+thisNum).remove();
    };
    function ClickChange(thisNum){
        var inputUpload = document.getElementById("uploadImage-"+thisNum);
        inputUpload.click();
    };
    function PreviewImage(thisNum,SrcImage) {
        var oFReader = new FileReader();

        var Butt = document.getElementById("uploadImage-"+thisNum);
        var Img = document.getElementById("uploadPreview-"+thisNum);

        try{
            oFReader.readAsDataURL(Butt.files[0]);
            
            oFReader.onload = function (oFREvent) {
                Img.src = oFREvent.target.result;
            };
            $("#tag-a-delete-"+thisNum).show();
        }catch(NullPointerException){
            Img.src = SrcImage;
            $("#tag-a-delete-"+thisNum).hide();
        }

        var newNum = thisNum+1;
        var divClone = document.getElementById("div-clone-"+newNum);

        if(typeof(divClone) == 'undefined' || divClone == null){
            var newClone = clone.clone();

            var idUplImg = "uploadImage-"+newNum;
            var idIplPrev = "uploadPreview-"+newNum;
            var idTagAPrev = "tag-a-prev-"+newNum;
            var idTagADel = "tag-a-delete-"+newNum;
            var idDiv = "div-clone-"+newNum;

            var onclick_TagAPrev = $("#tag-a-prev-0",newClone).attr('onclick').replace("0",newNum);
            var onchange_UplImg = $("#uploadImage-0",newClone).attr('onchange').replace("0",newNum);
            var onclick_TagADel = $("#tag-a-delete-0",newClone).attr('onclick').replace("0",newNum);

            $("#uploadImage-0",newClone).attr('onchange', onchange_UplImg);
            $("#uploadImage-0",newClone).attr('id', idUplImg);

            $("#uploadPreview-0",newClone).attr('id', idIplPrev);

            $("#tag-a-prev-0",newClone).attr('onclick', onclick_TagAPrev);
            $("#tag-a-prev-0",newClone).attr('id', idTagAPrev);

            $("#tag-a-delete-0",newClone).attr('onclick', onclick_TagADel);
            $("#tag-a-delete-0",newClone).attr('id', idTagADel);

            newClone.attr('id', idDiv);
            
            $('#list-images').append(newClone);
        }
    };
</script>