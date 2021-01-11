<?php

use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = $Manga->Title;
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="background-color2 radi-all-15">
    <div class="container-fluid pb-4 pr-4 pl-4">
        <div class="row">
            <div class="col">
                <div class="background-color3 radi-all-15 pt-4 px-4 pb-2 mt-4">
                    <div class="row">
                        <div class="<?=(Yii::$app->user->isGuest)?'col-12':'col-8'?> mb-4">
                            <h4 class="text-color2"><?=$Manga->OriginalTitle?></h4>
                        </div>
                        <?php if(!Yii::$app->user->isGuest){ ?>
                        <div class="col-3 mb-4">
                            <?php if($Library){ ?>
                            <a id="library-tag-a" style="cursor: pointer;" onClick="removeLibrary(<?=$Manga->IdManga?>)" class="btn btn-error px-1 w-100 background-color6"><span class="text">Remove from Library</span></a>
                            <?php }else{ ?>
                            <a id="library-tag-a" style="cursor: pointer;" onClick="addLibrary(<?=$Manga->IdManga?>)" class="btn btn-success px-1 w-100 background-color5"><span id="library-span" class="text">Add to Library</span></a>
                            <?php } ?>
                        </div>
                        <div class="col-1 mb-4">
                            <?php if($Favorite){ ?>
                            <a id="img-tag-a" style="cursor: pointer;" onClick="removeFavorite(<?=$Manga->IdManga?>)">
                                <img id="img-fav" src="<?= Yii::$app->urlManagerBackend->baseUrl.'/img/default/favorite.png'?>" width="38">
                            </a>
                            <?php }else{ ?>
                            <a id="img-tag-a" style="cursor: pointer;" onClick="addFavorite(<?=$Manga->IdManga?>)">
                                <img id="img-fav" src="<?= Yii::$app->urlManagerBackend->baseUrl.'/img/default/unfavorite.png'?>" width="38">
                            </a>
                            <?php } ?>
                        </div>
                        <?php } ?>
                        <div class="col-sm-12 col-md-12 col-lg-4">
                            <div class="d-flex justify-content-center">
                                <?php if($Manga->SrcImage){ if (file_exists(Yii::getAlias('@backend').'/web/img'.$Manga->SrcImage)){ ?>
                                <img src="<?= Yii::$app->urlManagerBackend->baseUrl.'/img'.$Manga->SrcImage?>" height="300" width="225">
                                <?php }else{ ?>
                                <img src="<?= Yii::$app->urlManagerBackend->baseUrl.'/img/default/manga_alternative.jpg'?>" height="300" width="225">
                                <?php }}else{ ?>
                                <img src="<?= Yii::$app->urlManagerBackend->baseUrl.'/img/default/manga_alternative.jpg'?>" height="300" width="225">
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <p class="text-color1">Original Title: <span class="text-color2"><?=$Manga->OriginalTitle?></span></p>
                            <p class="text-color1">Alternative Title: <span class="text-color2"><?=$Manga->AlternativeTitle?></span></p>
                            <p class="text-color1">Authors: 
                                <?php if($Authors) { foreach($Authors as $Author) { ?>
                                <a href="#"><span class="text-color2"><?=$Author->FirstName?><?php echo ($Author->LastName) ? ' '.$Author->LastName:''?></span></a>
                                <?php }} ?>
                            </p>
                            <p class="text-color1">OneShot: <span class="text-color2"><?php echo ($Manga->OneShot) ? 'Yes':'No'?></span></p>
                            <p class="text-color1">ReleaseDate: <span class="text-color2"><?=date_format(date_create($Manga->ReleaseDate),"d/m/Y")?></span></p>
                            <p class="text-color1">Status: <span class="text-color2"><?php echo ($Manga->Status) ? 'Completed':'Ongoing'?></span></p>
                            <div class="row">
                                <div class="col-auto">
                                    <p class="text-color1 mb-0">Genres: </p>
                                </div>
                                
                                <?php if($Genres) { foreach($Genres as $Genre) { ?>
                                <div class="col-auto background-color2 radi-all-15 my-n1 py-1 mr-2"><span class="text-color1"><?=$Genre->Name?></span></div>
                                <?php }} ?>
                            </div>
                        </div>
                        <div class="col-12 mt-4">
                            <p class="text-color1">Description:  <span class="text-color2"><?=$Manga->Description?></span></p>
                        </div>
                    </div>
                    <div class="background-color1 radi-all-15">
                        <?php if($Chapters) { ?>
                        <div class="ml-4 mr-1 mb-3 pb-3">
                            <div class="border-b-1px-solid-color1 mr-4">
                                <p class="text-color4 mb-1 pt-1 ml-2 pl-1">Chapter Name<span class="float-right mr-2 pr-1">Updated</span></p>
                            </div>
                            <ul class="p-0 mt-2 remove-bullet chapter-list scroll-type1">
                                <?php foreach($Chapters as $Chapter) { 
                                    $exist = false;
                                    if($ChapterReadeds){
                                        foreach($ChapterReadeds as $ChapRead) { 
                                            if($ChapRead->chapter == $Chapter){
                                                $exist = true;
                                            }
                                        }
                                    }
                                ?>
                                <a href="<?=Yii::$app->request->baseUrl.'/'.'manga/'.$Manga->IdManga.'/'.'chapter/'.$Chapter->IdChapter?>">
                                    <li class="pb-2 mr-3">
                                        <span class="<?=($exist)?'text-color5':'text-color2'?>">Chapter <?=$Chapter->Number?><?php echo ($Chapter->Name) ? ' - '.$Chapter->Name:''?></span>
                                        <span class="float-right <?=($exist)?'text-color5':'text-color2'?>"><?=date_format(date_create($Chapter->ReleaseDate),"d/m/Y")?></span>
                                    </li>
                                </a>
                                <?php } ?>
                            </ul>
                        </div>
                        <?php }else{ ?>
                            <p>No Chapters Available</p>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mt-4">
                <?php echo $this->render('//layouts/genre_list', ['Categories' => $Categories]); ?>
            </div>
        </div>
    </div>
</div>

<script>
    var urlBackend = "<?= Yii::$app->urlManagerBackend->baseUrl?>/";
    var user_id = "<?=(!Yii::$app->user->isGuest)?Yii::$app->user->identity->IdUser:null?>";

    function addFavorite(manga_id){
        var link = urlBackend+"api/favorite/create";
        $.post(link,
        {
            IdUser: user_id,
            IdManga: manga_id,
        },
        function(response){
            if(response != null){
                var img = $("#img-fav");
                var tag_a = $("#img-tag-a");
                var src = img.attr('src');
                var onclick = tag_a.attr('onClick');
                if(response == "Added to Favorites" || response == "Already in Favorites"){
                    img.attr('src', src.replace("unfavorite", "favorite"));
                    tag_a.attr('onClick', onclick.replace("add", "remove"));
                }
            }
        });
    }

    function removeFavorite(manga_id){
        var link = urlBackend+"api/favorite/delete/user/"+user_id+"/manga/"+manga_id;
        $.ajax({
            method:"DELETE",
            url:link
        })
        .done(function(response){
            if(response != null){
                var img = $("#img-fav");
                var tag_a = $("#img-tag-a");
                var src = img.attr('src');
                var onclick = tag_a.attr('onClick');
                if(response == "Removed from Favorites" || response == "It Wasn´t on Favorites"){
                    img.attr('src', src.replace("favorite", "unfavorite"));
                    tag_a.attr('onClick', onclick.replace("remove", "add"));
                }
            }
        })
    }
    function addLibrary(manga_id){
        var link = urlBackend+"api/library/create";
        $.post(link,
        {
            IdUser: user_id,
            IdManga: manga_id,
        },
        function(response){
            if(response != null){
                var span = $("#library-span");
                var tag_a = $("#library-tag-a");
                var text = span.text();
                var onclick = tag_a.attr('onClick');
                var className = tag_a.attr('class');
                if(response == "Added to Library" || response == "Already in Library"){
                    tag_a.attr('onClick', onclick.replace("add", "remove"));
                    tag_a.attr('class', className.replace("background-color5", "background-color6").replace("success", "error"));
                    span.text(text.replace("Add to", "Remove from"));
                }
            }
        });
    }

    function removeLibrary(manga_id){
        var link = urlBackend+"api/library/delete/user/"+user_id+"/manga/"+manga_id;
        $.ajax({
            method:"DELETE",
            url:link
        })
        .done(function(response){
            if(response != null){
                var span = $("#library-span");
                var tag_a = $("#library-tag-a");
                var text = span.text();
                var onclick = tag_a.attr('onClick');
                var className = tag_a.attr('class');
                if(response == "Removed from Library" || response == "It Wasn´t on Library"){
                    tag_a.attr('onClick', onclick.replace("remove", "add"));
                    tag_a.attr('class', className.replace("background-color6", "background-color5").replace("error", "success"));
                    span.text(text.replace("Remove from", "Add to"));
                }
            }
        })
    }
</script>
