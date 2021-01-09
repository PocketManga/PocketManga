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
                                        <button class="background-color2 border-0 w-100 mt-2 radi-all-15 py-1 mx-n2 text-center" 
                                            onclick="PressGenreButton($(this).closest('.div-genre-button'),<?=(Yii::$app->user->isGuest)?0:Yii::$app->user->identity->IdUser?>);">
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
                                                <select class="select-color1 radi-all-15 w-100 p-2 ml-n2" id="filter_order" 
                                                    onchange="(ChangeButtonSearch(<?=(Yii::$app->user->isGuest)?0:Yii::$app->user->identity->IdUser?>))">
                                                    <option class="option-color1" value="latestUpdates" selected="selected">Latest Updates</option>
                                                    <option class="option-color1" value="ranking">Ranking</option>
                                                    <option class="option-color1" value="popular">Popular</option>
                                                    <option class="option-color1" value="asc">Alfabetic Asc</option>
                                                    <option class="option-color1" value="desc">Alfabetic Desc</option>
                                                </select>
                                            </div>
                                            <div class="col-4">
                                                <select class="select-color1 radi-all-15 w-100 p-2" id="filter_status"
                                                    onchange="(ChangeButtonSearch(<?=(Yii::$app->user->isGuest)?0:Yii::$app->user->identity->IdUser?>))">
                                                    <option class="option-color1" value="1">Completed</option>
                                                    <option class="option-color1" value="0">Ongoing</option>
                                                    <option class="option-color1" value="all" selected="selected">Completed and Ongoing</option>
                                                </select>
                                            </div>
                                            <div class="col-4">
                                                <button class="text-color2 background-color3 border-0 radi-all-15 w-100 py-2 ml-2" id="button-search"
                                                    onclick="(ReloadMangas(<?=(Yii::$app->user->isGuest)?0:Yii::$app->user->identity->IdUser?>))">Search</button>
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
                                <a class="text-center tag-a" id="link" href="">
                                    <img class="tag-img" id="image" src="<?= Yii::$app->urlManagerBackend->baseUrl.'/img/default/manga_alternative.jpg'?>" height="200" width="150">
                                    <p class="text-color2 tag-p br-word width-150" id="title"> Title </p>
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
    var urlBackend = "<?= Yii::$app->urlManagerBackend->baseUrl?>/";
    var clone = $('.to-clone').clone();
    document.getElementById("filters").style.display = "none";
    var btnClass = document.getElementById('button-filter');
    var btnClassName = btnClass.className;
    btnClass.className = btnClassName.replace("radi-t-15", "radi-all-15");
    
    ChangeButtonSearch();
    ReloadMangas(0);
    
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
    
    function PressGenreButton(GenreDiv, user_id){
        var GenreButton = GenreDiv.find('button').first();
        var GenreAddInput = GenreDiv.find('.add-genres').first();
        var GenreRemoveInput = GenreDiv.find('.remove-genres').first();

        var btnClassName = GenreButton.className;
        if(GenreAddInput.is(':checked') == false && GenreRemoveInput.is(':checked') == false){
            var classButton = GenreButton.attr("class").replace( "background-color2", "background-color5").replace( "background-color6", "background-color5");
            GenreAddInput.prop('checked', true);
            GenreRemoveInput.prop('checked', false);
            GenreButton.attr('class', classButton);
        }else{
            if(GenreAddInput.is(':checked') == true && GenreRemoveInput.is(':checked') == false){
                var classButton = GenreButton.attr("class").replace( "background-color2", "background-color6").replace( "background-color5", "background-color6");
                GenreAddInput.prop('checked', false);
                GenreRemoveInput.prop('checked', true);
                GenreButton.attr('class', classButton);
            }else{
                var classButton = GenreButton.attr("class").replace( "background-color6", "background-color2").replace( "background-color5", "background-color2");
                GenreAddInput.prop('checked', false);
                GenreRemoveInput.prop('checked', false);
                GenreButton.attr('class', classButton);
            }
        }
        ChangeButtonSearch(user_id);
    }

    function ChangeButtonSearch(user_id){
        var link = urlBackend+"api/manga/allmanga/total/" + GetFilters(user_id);
        
        $.ajax({
            method:"GET",
            url:link
        })
        .done(function(response){
            if(response.total){
                $('#button-search').text('Search ('+response.total+')');
            }else{
                $('#button-search').text('Search (0)');
            }
        })
    }
    

    function ReloadMangas(user_id){
        $('.manga-list').html('');

        var link = urlBackend+"api/manga/allmanga/" + GetFilters(user_id);
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
                        $('#image', manga_clone).attr('src',urlBackend+'/img'+response.mangas[i].SrcImage);
                    }
                    $('#title', manga_clone).text(response.mangas[i].Title);
                    $("#link", manga_clone).attr("href", '<?=Yii::$app->request->baseUrl.'/'.'manga/'?>'+response.mangas[i].IdManga);
                    $('.manga-list').append(manga_clone);
                }
            }else{
                document.getElementById("no-manga").style.display = "block";
            }
        })
    }
    
    function GetFilters(user_id){
        var SelectOption = document.getElementById("filter_order");
        var SelectStatus = document.getElementById("filter_status");
        var Option = SelectOption.options[SelectOption.selectedIndex].value;
        var Status = SelectStatus.options[SelectStatus.selectedIndex].value;
        var Filters = user_id+'__'+Option+'__'+Status;
        var AddFilters = null;
        var RemoveFilters = null;
        
        var AddGenres = new Array();
        var RemoveGenres = new Array();
        var AddGenres = document.getElementsByClassName("add-genres");
        var RemoveGenres = document.getElementsByClassName("remove-genres");
        if(AddGenres.length != 0){
            var num = 0;
            for (i = 0; i < AddGenres.length; i++) {
                if(AddGenres[i].checked){
                    if(num != 0 && i < (AddGenres.length-1)){
                        AddFilters = AddFilters+"_";
                    }
                    if(num == 0){
                        AddFilters = AddGenres[i].value;
                        num++;
                    }else{
                        AddFilters = AddFilters+AddGenres[i].value;
                    }
                }
            }
        }
        if(AddFilters == null){
            AddFilters = 'all';
        }

        if(RemoveGenres.length != 0){
            var num = 0;
            for (i = 0; i < RemoveGenres.length; i++) {
                if(RemoveGenres[i].checked){
                    if(num != 0 && i < (RemoveGenres.length-1)){
                        RemoveFilters = RemoveFilters+"_";
                    }
                    if(num == 0){
                        RemoveFilters = RemoveGenres[i].value;
                        num++;
                    }else{
                        RemoveFilters = RemoveFilters+RemoveGenres[i].value;
                    }
                }
            }
        }
        if(RemoveFilters == null){
            RemoveFilters = 'none';
        }
        
        Filters = Filters+'__'+AddFilters+'__'+RemoveFilters;
        return Filters;
    }
</script>