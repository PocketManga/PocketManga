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
                <div class="col-6">
                    <p class = "text-color2 m-0 text-center">Only jpg files!!</p>
                </div>
                <div class="col-6">
                    <button class="uploadPreview" onclick="return ClickChange()" type="button">Upload</button>
                    <input type="file" id='uploadImage' name="Images[]" style="display:none;" onchange="PreviewImages()" multiple><br>
                </div>
            </div>
            <div class="row mb-n3" id="list-images">
                <div class="col-auto to-clone">
                    <img style="max-width:200px;" src=""/>
                </div>
                <!--
                <div class="col-auto">
                <form method='post' action='' enctype="multipart/form-data">
                    <input type="file" id='files' name="Images[]" multiple><br>
                    <input type="button" id="submit" value='Upload'>
                </form>
                    <a href="#" onclick="return ClickChange(0)">
                        <img class="uploadPreview" style="max-width:200px;" src="<?=Yii::$app->request->baseUrl.'/img/default/manga_alternative.jpg'?>"/>
                    </a>
                </div>-->
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

    function ClickChange(){
        var inputUpload = document.getElementById("uploadImage");
        inputUpload.click();
    };
    function PreviewImages() {

        var divListImages = document.querySelector('#list-images');
        var Images = document.querySelector('#uploadImage').files;
        $('.to-clone').remove();

        function readAndPreview(img) {

            var reader = new FileReader();
            reader.addEventListener("load", function () {
            var div = document.createElement('div'); 
            var image = new Image();

            div.className="col-auto p-3";

            image.style="max-width:250px;";
            image.title = img.name;
            image.src = this.result;

            div.appendChild(image);

            divListImages.appendChild(div);
            }, false);

            reader.readAsDataURL(img);

        }

        if (Images) {
            [].forEach.call(Images, readAndPreview);
        }

    }
    
</script>