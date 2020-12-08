<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Manga */
/* @var $form yii\widgets\ActiveForm */
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<div class="manga-form mt-4 pt-4 border-t-2px-solid-color3">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">

        <div class="col-4">
            <p class = "text-color2 m-0 text-center">Image</p>
            <?= $form->field($model, 'SrcImage')->textInput(['maxlength' => true])->label(false) ?>
        </div>

        <div class="col-8">
            <p class = "text-color2 m-0">Title</p>
            <?= $form->field($model, 'Title')->textInput(['class' => 'p-1 w-100 radi-all-15 border-color1 background-color1 text-color2 bold', 'autocomplete'=>"off",'maxlength' => true])->label(false) ?>

            <p class = "text-color2 m-0">Alternative Title</p>
            <?= $form->field($model, 'AlternativeTitle')->textInput(['class' => 'p-1 w-100 radi-all-15 border-color1 background-color1 text-color2 bold', 'autocomplete'=>"off",'maxlength' => true])->label(false) ?>

            <p class = "text-color2 m-0">Original Title</p>
            <?= $form->field($model, 'OriginalTitle')->textInput(['class' => 'p-1 w-100 radi-all-15 border-color1 background-color1 text-color2 bold', 'autocomplete'=>"off",'maxlength' => true])->label(false) ?>
        </div>

        <div class="col">
            <p class = "text-color2 m-0 text-center">Status</p>
            <?= $form->field($model, 'Status')->dropDownList(['0' => 'Ongoing', '1' => 'Completed'],['class'=>'radi-all-15 p-1 background-color7 border-0 w-100 text-color1 align-center','id'=>'input-status','onChange' => 'PressStatusButton($(this).closest(".col"))'])->label(false) ?>
        </div>

        <div class="col">
            <p class = "text-color2 m-0 text-center">OneShot</p>
            <?= $form->field($model, 'OneShot')->dropDownList(['0' => 'No', '1' => 'Yes'],['class'=>'radi-all-15 p-1 background-color6 border-0 w-100 text-color1 align-center','id'=>'input-oneshot','onChange' => 'PressOneshotButton($(this).closest(".col"))'])->label(false) ?>
        </div>

        <div class="col">
            <p class = "text-color2 m-0 text-center">R18</p>
            <?= $form->field($model, 'R18')->dropDownList(['0' => 'No', '1' => 'Yes'],['class'=>'radi-all-15 p-1 background-color6 border-0 w-100 text-color1 align-center','id'=>'input-r18','onChange' => 'PressR18Button($(this).closest(".col"))'])->label(false) ?>
        </div>

        <div class="col">
            <p class = "text-color2 m-0 text-center">Server</p>
            <?= $form->field($model, 'Server')->dropDownList($Servers,['class'=>'radi-all-15 p-1 background-color1 border-0 w-100 text-color2 align-center'],['options' =>[$model->Server => ['selected' => true]]])->label(false) ?>
        </div>

        <div class="col">
            <p class = "text-color2 m-0 text-center">Release Date</p>
            <?= $form->field($model, 'ReleaseDate')->widget(DatePicker::classname(), ['dateFormat' => 'yyyy-MM-dd','options'=>['class'=>'radi-all-15 pb-1 background-color1 border-0 w-100 text-color2 align-center','type'=>'date','ShowDayCellToolTips'=>false],'clientOptions' => ['changeYear' => true]])->label(false) ?>
        </div>
        
        <div class="col-12 mt-2">
            <div class="row category-list">
                <div class="col-2">
                    <p class = "text-color2 m-0 text-center">Categories</p>
                </div>
                <?php $num=0; if($RouteType){ foreach($model->Category as $Cat){ ?>
                    <div class="col-2 category-div d-flex">
                        <?= $form->field($model, 'Category['.$num.']')->dropDownList($Categories,['class'=>'radi-tl-15 radi-bl-15 pl-1 py-1 w-100 background-color1 border-0 text-color2 align-center'],['options' =>[$Cat => ['selected' => true]]])->label(false) ?>
                    <button type='button' class="radi-tr-15 radi-br-15 pr-1 py-n2 mb-3 pl-0 background-color6 w-25 border-0 text-color1 bold align-center" onClick="Remove($(this).closest('.category-div'))">-</button>
                    </div>
                <?php $num++;}}?>
                <span id="num-category" style="display:none;"><?=$num?></span>
                <div class="col-2 category-div clone-category d-flex">
                    <?= $form->field($model, 'Category')->dropDownList($Categories,['class'=>'radi-tl-15 radi-bl-15 pl-1 py-1 w-100 background-color1 border-0 text-color2 align-center'])->label(false) ?>
                    <button type='button' class="radi-tr-15 radi-br-15 pr-1 py-n2 mb-3 pl-0 background-color6 w-25 border-0 text-color1 bold align-center" onClick="Remove($(this).closest('.category-div'))">-</button>
                </div>
                <div class="col-1 button-add-category">
                    <button type='button' class="radi-all-15 p-1 background-color1 border-0 w-100 text-color2 align-center" onClick="AddCategory()">+</button>
                </div>
            </div>
        </div>
        
        <div class="col-12 mt-2">
            <div class="row author-list">
                <div class="col-2">
                    <p class = "text-color2 m-0 text-center">Authors</p>
                </div>
                <?php $num=0; if($RouteType){ foreach($model->Author as $Auth){ ?>
                    <div class="col-2 author-div d-flex">
                        <?= $form->field($model, 'Author['.$num.']')->dropDownList($Authors,['class'=>'radi-tl-15 radi-bl-15 pl-1 py-1 w-100 background-color1 border-0 text-color2 align-center'],['options' =>[$Auth => ['selected' => true]]])->label(false) ?>
                    <button type='button' class="radi-tr-15 radi-br-15 pr-1 py-n2 mb-3 pl-0 background-color6 w-25 border-0 text-color1 bold align-center" onClick="Remove($(this).closest('.author-div'))">-</button>
                    </div>
                <?php $num++;}}?>
                <span id="num-author" style="display:none;"><?=$num?></span>
                <div class="col-2 author-div clone-author d-flex">
                    <?= $form->field($model, 'Author')->dropDownList($Authors,['class'=>'radi-tl-15 radi-bl-15 pl-1 py-1 w-100 background-color1 border-0 text-color2 align-center'])->label(false) ?>
                    <button type='button' class="radi-tr-15 radi-br-15 pr-1 py-n2 mb-3 pl-0 background-color6 w-25 border-0 text-color1 bold align-center" onClick="Remove($(this).closest('.author-div'))">-</button>
                </div>
                <div class="col-1 button-add-author">
                    <button type='button' class="radi-all-15 p-1 background-color1 border-0 w-100 text-color2 align-center" onClick="AddAuthor()">+</button>
                </div>
            </div>
        </div>

        <div class="col-12">
            <p class = "text-color2 m-0">Description</p>
            <?= $form->field($model, 'Description')->textarea(['class' => 'p-1 w-100 radi-all-15 border-color1 background-color1 text-color2 bold','rows' => 6])->label(false) ?>
        </div>

        <div class="col-12 text-center mt-4 pt-4 border-t-2px-solid-color3">
            <div class="form-group">
                <?= Html::submitButton('Save Manga', ['class' => 'btn btn-success w-50 background-color5 text-color1 bold']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script>
    var CategoryClone = $('.clone-category').clone();
    var AuthorClone = $('.clone-author').clone();
    $('.clone-category').remove();
    $('.clone-author').remove();

    function PressStatusButton(div){
        var div = document.getElementById("input-status");
        ChangeColor(div,7);
    }

    function PressOneshotButton(div){
        var div = document.getElementById("input-oneshot");
        ChangeColor(div,6);
    }

    function PressR18Button(div){
        var div = document.getElementById("input-r18");
        ChangeColor(div,6);
    }

    function ChangeColor(div,color){
        if(div.value == "0"){
            div.className = div.className.replace("background-color5", "background-color"+color);
        }else{
            div.className = div.className.replace("background-color"+color, "background-color5");
        }
    }
    
    function AddCategory(){
        var CategoryList = document.getElementsByClassName("category-list");
        var num = parseInt($("#num-category").text());
        
        var category_clone = CategoryClone.clone();
        var Name = category_clone.find('select').attr('name');
        
        $('select', category_clone).attr('name',Name+"["+num+"]");

        category_clone.insertBefore( ".button-add-category" );
        //$('.category-list').append(category_clone);

        $("#num-category").text(num+1);
    }
    
    function AddAuthor(){
        var AuthorList = document.getElementsByClassName("author-list");
        var num = parseInt($("#num-author").text());
        
        var author_clone = AuthorClone.clone();
        var Name = author_clone.find('select').attr('name');

        $('select', author_clone).attr('name',Name+"["+num+"]");

        author_clone.insertBefore( ".button-add-author" );
        //$('.category-list').append(author_clone);

        $("#num-author").text(num+1);
    }
    
    function Remove(div){
        div.remove();
    }
</script>