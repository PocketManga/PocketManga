<?php

use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'PocketManga';
?>

<div class="background-color2 radi-tr-15 radi-b-15">
    <div class="container-fluid pb-4 px-4">
        <div class="row">
            <div class="col">
                <!-- Page Heading -->
                <div class="mb-4">
                    <h4 class="pt-4">Latest Updates</h4>
                    <select id="replyNumber" onchange="changePage('<?=Yii::$app->request->baseUrl.'/'.Url::to('about')?>')">
                        <option <?php echo ('latest-updates' == $Option) ? 'selected="selected"' : ''?>><?=Yii::$app->params['Dictionary']['latest-updates']?></option>
                        <option <?php echo ('ranking' == $Option) ? 'selected="selected"' : ''?>><?=Yii::$app->params['Dictionary']['ranking']?></option>
                        <option <?php echo ('popular' == $Option) ? 'selected="selected"' : ''?>><?=Yii::$app->params['Dictionary']['popular']?></option>
                    </select>
                </div>
                <!-- Approach -->
                <div class="background-color3 radi-all-15 p-4">
                    <?php echo $this->render('partials/view_type1', ['Mangas' => $Mangas,'PaginaAtual' => $PaginaAtual,'NumPaginas' => $NumPaginas,]); ?>
                </div>
            </div>
            <div class="col-md-3 mt-4">
                <?php echo $this->render('//layouts/genre_list', ['Categories' => $Categories]); ?>
            </div>
        </div>
    </div>
</div>
<script>
    function changePage(url) {
        var val = document.getElementById("replyNumber").value;
        document.location.href=url;
    }
</script>
