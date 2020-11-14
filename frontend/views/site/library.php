<?php

use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'PocketManga';
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<div class="background-color2 radi-tl-15 radi-b-15">
    <div class="container-fluid pb-4 px-4">
        <div class="row">
            <div class="col-md-3 mt-4">
                <?php echo $this->render('//layouts/list_library_lists',['List' => $List,'Lists' => $Lists, 'CountAM' => $CountAM,'UncatList' => $UncatList]); ?>
            </div>
            <div class="col">                
                <div class="mb-4">
                    <div class="col-12">
                        <h4 class="mt-4"><?=$List?></h4>
                    </div>
                </div>
                <div class="background-color3 radi-all-15 p-4">
                    <?php echo $this->render('partials/view_type3',['List' => $List,'Lists' => $Lists]); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var clone = $('.to-clone').clone();
    
    ReloadMangas(<?=Yii::$app->user->identity->leitor->PrimaryList_Id?>);
    
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
    function ReloadMangas(list_id){
        var leitor_id = <?=Yii::$app->user->identity->leitor->IdLeitor?>;
        $('.manga-list').html('');
        var list = null;
        if(list_id){
            list = list_id;
        }
        if(list_id == null){
            list = 'all';
        }

        var link = "http://localhost/PocketManga/backend/web/api/manga/library/" + leitor_id + '_' + list;
        
        $.ajax({
            method:"GET",
            url:link
        })
        .done(function(response){
            if(response.mangas){
                for (i=0; i<response.mangas.length; i++) {
                    var manga_clone = clone.clone();
                    $('#title', manga_clone).text(response.mangas[i].Title);
                    if(response.mangas[i].Status == true){
                        $('#status', manga_clone).text('Completed');
                        $('#status', manga_clone).attr('class', 'text-color3');
                    }
                    if(response.mangas[i].Readed == true){
                        $('#readed', manga_clone).text('Readed');
                        $('#readed', manga_clone).attr('class', 'text-color5');
                    }
                    $('#button-readed', manga_clone).attr('onclick', 'Readed_Unreaded($(this).closest(".to-clone"),'+response.mangas[i].IdManga+')');
                    $('#select-list', manga_clone).attr('onchange', 'ChangeList($(this).closest(".to-clone"),'+response.mangas[i].IdManga+',"'+response.mangas[i].List+'")');
                    $('#option-'+response.mangas[i].List, manga_clone).prop('selected', true);
                    $("#link", manga_clone).attr("href", "<?=Yii::$app->request->baseUrl.'/'.'manga/'?>"+response.mangas[i].IdManga);
                    $('.manga-list').append(manga_clone);
                }
            }
        })
    }
    function Readed_Unreaded(clone, manga_id){
        var leitor_id = <?=Yii::$app->user->identity->leitor->IdLeitor?>;
        var link = "http://localhost/PocketManga/backend/web/api/manga/readed/" + leitor_id + '_' + manga_id;
        var spanReaded = clone.find('#readed').first();
        $.ajax({
            method:"GET",
            url:link
        })
        .done(function(response){
            if(response.Readed != null){
                if(response.Readed == true){
                    spanReaded.text('Readed');
                    spanReaded.attr('class', 'text-color5');
                }else{
                    spanReaded.text('Uneaded');
                    spanReaded.attr('class', 'text-color4');
                }
            }
        })
    }
    function ChangeList(clone, manga_id){
        var leitor_id = <?=Yii::$app->user->identity->leitor->IdLeitor?>;
        var list_name = clone.find('.class-select-list').first().val();
        var link = "http://localhost/PocketManga/backend/web/api/manga/changelist/" + leitor_id + '__' + manga_id+'__'+ list_name;
        alert(link);
        $.ajax({
            method:"GET",
            url:link
        })
        .done(function(response){
            if(response.Changed != null){
                if(response.Changed == true){
                    clone.remove();
                }
            }
        })
    }
</script>