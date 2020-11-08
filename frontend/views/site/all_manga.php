<?php

use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'PocketManga';
?>
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
                    <div>
                        <button class="background-color1 border-0 radi-all-15 px-4 py-2">
                            <p class="text-color2 m-0">Filter</p>
                        </button>
                        <div class="background-color1 radi-all-15 p-4 mb-4">

                        </div>
                    </div>
                    <div class="row manga-list">
                        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 to-clone">
                            <div class="d-flex justify-content-center">
                                <a class="text-center tag-a" href="<?=Url::to('manga/')?>">
                                    <img class="tag-img" src="<?php echo Yii::$app->request->baseUrl.'/img'?>" height="200" width="150">
                                    <p class="text-color2 tag-p"> Title </p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
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
    //var clones = $('.to-clone').clone();
    //$('.manga-list').html('');
    //document.getElementById("filtros").style.display = "none";
    //changeNumbButton();
    //ReloadMangas(0);

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
    }*//*

    function ReloadMangas(user_id){
        document.getElementById("filtros").style.display = "none";
        $('.anuncios').html('');
        var link = "http://localhost/PocketManga/backend/web/api/mangas/allmanga/" + GetFilters(user_id);
        $.ajax({
            method:"GET",
            url:link
        })
        .done(function(response){
            if(response.results){
                for (i=0; i<response.results.length; i++) {
                    var clonefilme = clones.clone();
                    var info =null;
                    if(response.source[i].Source != null){	
                        $('#imagem', clonefilme).attr('src',response.source[i].Source);
                    }else{
                        $('#imagem', clonefilme).attr('src','imagens/Sem_Imagem.png');
                    }
                    if(response.results[i].Titulo.length > 30){
                        $('#titulo', clonefilme).text(response.results[i].Titulo.substring(0, 30) + '...');
                    }else{
                        $('#titulo', clonefilme).text(response.results[i].Titulo);
                    }
                    info = response.results[i].Distrito + ", " + response.results[i].TipoApart;
                    if(response.results[i].NumQuartos==1){
                        info = info + ", " + response.results[i].NumQuartos + " Quarto";
                    }else{
                        info = info + ", " + response.results[i].NumQuartos + " Quartos";
                    }
                    if(response.results[i].Parking=='Sim'){
                        info = info + ", Estacionamento";
                    }
                    if(response.results[i].Internet=='Sim'){
                        info = info + ", Internet";
                    }
                    $('#info', clonefilme).text(info);
                    $('#preco', clonefilme).text(response.results[i].Preco+"€");
                    
                    if(response.results[i].Titulo.Descricao > 150){
                        $('#descricao', clonefilme).text(response.results[i].Descricao.substring(0, 150) + '...');
                    }else{
                        $('#descricao', clonefilme).text(response.results[i].Descricao);
                    }
                    $('#idmovie', clonefilme).text(response.results[i].IdApartamento);
                    $('#info', clonefilme).text(info);
                    $("#btninfo", clonefilme).attr("href", "http://localhost/cesa/frontend/web/site/infoapart?id="+response.results[i].IdApartamento);
                    $('.anuncios').append(clonefilme);
                }
            }
        })
    }
    
    function GetFilters(user_id){
        var filtroDDL = ["Order", "PreMin", "PreMax", "Distrito"];
        var filtroCB = ["Animais", "Casais", "Cozinha", "Genero", "Internet", "Fumador", "Mobilado", "Parking", "NumQuartos", "TipoApart", "NumWC"];
        var checkbox = new Array();
        var dropdown = new Array();
        $("input[type=checkbox]:checked").each(function () {
            checkbox.push(this.value);
        });
        $("select.toolbar-escolha").each(function () {
            dropdown.push(this.value);
        });
        var filtros = null;
        var i;
        for (i = 0; i < checkbox.length; i++) {
            filtros = filtros + filtroCB[i] + "_" + checkbox[i] + "__";
        }
        for (i = 0; i < dropdown.length; i++) {
            filtros = filtros + filtroDDL[i] + "_" + dropdown[i];
            if(i<dropdown.length-1){
            filtros = filtros + "__";
            }
        }
        return filtros;
    }*/
</script>
