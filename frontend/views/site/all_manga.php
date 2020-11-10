<?php

use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'PocketManga';
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<div class="background-color2 radi-all-15">
    <div class="container-fluid pb-4 px-4">
        <div class="row">
            <div class="col">
                <!-- Page Heading -->
                <div class="mb-4 row">
                    <div class="col">
                        <h4 class="mt-4">All Manga</h4>
                    </div>
                </div>
                <!-- Approach -->
                <div class="background-color3 radi-all-15 p-4">
                    <div class="row">
                        <div class="col-3">
                            <button class="background-color1 border-0 radi-t-15 w-100 px-4 py-2" id="button-filter" onclick="PressFilterButton();">
                                <p class="text-color2 m-0">Filter</p>
                            </button>
                        </div>
                        <div class="col-12">
                            <div class="background-color1 radi-b-15 radi-tr-15" id="filters">
                                <div class="row p-3 mx-0" id="filters_genres">
                                    <?php foreach($Categories as $Category){ ?>
                                    <div class="col-3 pb-2 div-genre-button">
                                        <button class="background-color2 border-0 w-100 mt-2 radi-all-15 py-1 mx-n2 text-center" onclick="PressGenreButton($(this).closest('.div-genre-button'));">
                                            <span class="text-color1"><?=$Category->Name?></span>
                                            <input type="checkbox" class="radio add-genres" value="<?=$Category->Name?>" name="<?='check-'.$Category->Name?>">
                                            <input type="checkbox" class="radio remove-genres" value="<?=$Category->Name?>" name="<?='check-'.$Category->Name?>">
                                        </button>
                                    </div>
                                    <?php } ?>
                                </div>
                                <div class="row px-3 mx-0 pt-3 pb-4">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-4">
                                                <select class="select-color1 radi-all-15 w-100 p-2 ml-n2" id="filter_order">
                                                    <option class="option-color1" value="latestUpdates" selected="selected"><?=Yii::$app->params['Dictionary']['latest-updates']?></option>
                                                    <option class="option-color1" value="ranking"><?=Yii::$app->params['Dictionary']['ranking']?></option>
                                                    <option class="option-color1" value="popular"><?=Yii::$app->params['Dictionary']['popular']?></option>
                                                    <option class="option-color1" value="asc"><?=Yii::$app->params['Dictionary']['asc']?></option>
                                                    <option class="option-color1" value="desc"><?=Yii::$app->params['Dictionary']['desc']?></option>
                                                </select>
                                            </div>
                                            <div class="col-4">
                                                <select class="select-color1 radi-all-15 w-100 p-2" id="filter_status">
                                                    <option class="option-color1" value="1"><?=Yii::$app->params['Dictionary']['completed']?></option>
                                                    <option class="option-color1" value="0"><?=Yii::$app->params['Dictionary']['ongoing']?></option>
                                                    <option class="option-color1" value="all" selected="selected"><?=Yii::$app->params['Dictionary']['both_c_o']?></option>
                                                </select>
                                            </div>
                                            <div class="col-4">
                                                <button class="text-color2 background-color3 border-0 radi-all-15 w-100 py-2 ml-2"><?=Yii::$app->params['Dictionary']['search']?></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row manga-list mt-4">
                        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 to-clone">
                            <div class="d-flex justify-content-center">
                                <a class="text-center tag-a" id="link" href="<?=Url::to('manga/')?>">
                                    <img class="tag-img" id="image" src="<?php echo Yii::$app->request->baseUrl.'/img/default/manga_alternative.jpg'?>" height="200" width="150">
                                    <p class="text-color2 tag-p" id="title"> Title </p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="no-manga">
                        <div class="col">
                            <p class="text-color2"> There are no manga </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var clone = $('.to-clone').clone();
    document.getElementById("filters").style.display = "none";
    var btnClass = document.getElementById('button-filter');
    var btnClassName = btnClass.className;
    btnClass.className = btnClassName.replace("radi-t-15", "radi-all-15");
    
    //changeNumbButton();
    ReloadMangas(0);

    /*$(".checkfiltro").on('click', function() {
        changeNumbButton();
    });/**/

    /*function changeNumbButton(){
        var filtros = "http://localhost/cesa/backend/web/v1/apart/totalfils/" + GetFiltros();
        $.ajax({
            method:"GET",
            url:filtros
        })
        .done(function(response){
            document.getElementById("aplicafiltros").value = "Aplicar Filtros ("+response['total']+")";
        })
    }*/
    
    function PressFilterButton(){
        var div = document.getElementById("filters");
        var btnClass = document.getElementById('button-filter');
        var btnClassName = btnClass.className;
        if(div.style.display == "none"){
            document.getElementById("filters").style.display = "block";
            btnClass.className = btnClassName.replace("radi-all-15", "radi-t-15");
        }else{
            document.getElementById("filters").style.display = "none";
            btnClass.className = btnClassName.replace("radi-t-15", "radi-all-15");
        }
    }
    
    function PressGenreButton(GenreDiv){
        var GenreButton = GenreDiv.find('button').first();
        var GenreAddInput = GenreDiv.find('.add-genres').first();
        var GenreRemoveInput = GenreDiv.find('.add-genres').first();

        var btnClassName = GenreButton.className;
        if(!GenreAddInput.checked && !GenreRemoveInput.checked){
            GenreAddInput.checked = true;
            GenreRemoveInput.checked = false;
            GenreButton.className = btnClassName.replace("background-color2", "background-color5");
            GenreButton.className = btnClassName.replace("background-color4", "background-color5");
        }else{
            if(GenreAddInput.checked && !GenreRemoveInput.checked){
                GenreAddInput.checked = false;
                GenreRemoveInput.checked = true;
                GenreButton.className = btnClassName.replace("background-color2", "background-color4");
                GenreButton.className = btnClassName.replace("background-color5", "background-color4");
            }else{
                GenreAddInput.checked = false;
                GenreRemoveInput.checked = false;
                GenreButton.className = btnClassName.replace("background-color4", "background-color2");
                GenreButton.className = btnClassName.replace("background-color5", "background-color2");
            }
        }
    }


    function ReloadMangas(user_id){
        $('.manga-list').html('');

        var link = "http://localhost/PocketManga/backend/web/api/manga/allmanga/" + GetFilters(user_id);
        $.ajax({
            method:"GET",
            url:link
        })
        .done(function(response){
            if(response.mangas){
                document.getElementById("no-manga").style.display = "none";
                for (i=0; i<response.mangas.length; i++) {
                    var manga_clone = clone.clone();
                    if(response.mangas[i].SrcImage != null){	
                        $('#image', manga_clone).attr('src','http://localhost/PocketManga/frontend/web/img/'+response.mangas[i].SrcImage);
                    }
                    $('#title', manga_clone).text(response.mangas[i].Title);
                    $("#link", manga_clone).attr("href", 'http://localhost/PocketManga/frontend/web/manga/'+response.mangas[i].IdManga);
                    $('.manga-list').append(manga_clone);
                }
            }else{
                document.getElementById("no-manga").style.display = "block";
            }
        })/**/
    }
    
    function GetFilters(user_id){
        var SelectOption = document.getElementById("filter_order");
        var SelectStatus = document.getElementById("filter_status");
        var Option = SelectOption.options[SelectOption.selectedIndex].value;
        var Status = SelectStatus.options[SelectStatus.selectedIndex].value;
        var Filters = user_id+'__'+Option+'__'+Status;
        
        var AddGenres = new Array();
        var RemoveGenres = new Array();
        var AddGenres = document.querySelectorAll('input[class="add-genres"]:checked');
        var RemoveGenres = document.querySelectorAll('input[class="remove-genres"]:checked');

        if(AddGenres.length != 0){
            for (i = 0; i < AddGenres.length; i++) {
                if(i == 0){
                    Filters = Filters+'__'+AddGenres[i].value + "_";
                }else{
                    Filters = Filters+AddGenres[i].value;
                    if(i < (AddGenres.length-1)){
                        Filters = Filters+"_";
                    }
                }
            }
        }else{
            Filters = Filters+"__all";
        }

        if(RemoveGenres.length != 0){
            for (i = 0; i < RemoveGenres.length; i++) {
                if(i == 0){
                    Filters = Filters+'__'+RemoveGenres[i].value+"_";
                }else{
                    Filters = Filters+RemoveGenres[i].value;
                    if(i < (RemoveGenres.length-1)){
                        Filters = Filters+"_";
                    }
                }
            }
        }else{
            Filters = Filters+"__none";
        }
        return Filters;
    }
</script>