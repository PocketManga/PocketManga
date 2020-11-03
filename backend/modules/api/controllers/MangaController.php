<?php

namespace backend\modules\api\controllers;

use yii\rest\ActiveController;
use common\models\Manga;

class MangaController extends ActiveController
{
    public function actionMorada($id) //problemas a apanhar o id
    {
        $usersmodel = new $this->modelClass;
        $user = $usersmodel::find()->where("idutilizador=".$id)->one();
        if($user){
            if($user->Morada){
                return ['id' => $id, 'morada' => $user->Morada];
            }else{
                return ['id' => $id, 'morada' => 'null'];
            }
        }
        return ['id' => $id, 'user' => "não existente"];
    }
    public function GetManga($filters){
        $ExistingFilters = Category::find()->all();
        $Options = ['latest-updates', 'popular', 'ranking'];
        $where=null;
        $orderby=null;
        

    }
    public function Find($filtros)
    {
        $filtros_existentes = ['fumador','mobilado','internet','cozinha','parking','animais','casais','genero','numquartos','tipoapart','numwc','order','premin','premax','distrito'];
        $filtros_replace = str_replace("__","+",$filtros);
        $filtros_split = explode('+', strtolower($filtros_replace));
        $filtro=null;
        $apartmodel = new $this->modelClass;
        $apartamentos = null;
        $where=null;
        $orderby=null;
        foreach($filtros_split as $filtro_split){
            $split = explode('_', $filtro_split);
            $filtro[$split[0]] = $split[1];
        }
        foreach($filtros_existentes as $fil)
        {
            if (array_key_exists($fil,$filtro)){
                if($fil=='fumador'||$fil=='mobilado'||$fil=='internet'||$fil=='cozinha'||$fil=='parking'||$fil=='animais'||$fil=='casais'||$fil=='genero'||$fil=='distrito'){
                    if($filtro[$fil]!='indiferente'){
                        if($where!=null){
                            $where = $where." and ".$fil." LIKE '".$filtro[$fil]."'";
                        }else{
                            $where = $fil." LIKE '".$filtro[$fil]."'";
                        }
                    }
                }
                if($fil == 'numquartos' || $fil == 'numwc'){
                    if($filtro[$fil]!='1m'){
                        $wherenum = null;
                        if($filtro[$fil]=='2m'||$filtro[$fil]=='3m'||$filtro[$fil]=='4m'){
                            $filtro[$fil]= str_replace("m","",$filtro[$fil]);
                            $wherenum = $fil." >= ".$filtro[$fil];
                        }else{
                            $wherenum = $fil." = ".$filtro[$fil];
                        }
                        if($where!=null){
                            $where = $where." and ".$wherenum;
                        }else{
                            $where = $wherenum;
                        }
                    }
                }
                if($fil == 'tipoapart'){
                    if($filtro['tipoapart']!='t0m'){
                        $wheretipo=null;
                        if($filtro['tipoapart']=='t1m'||$filtro['tipoapart']=='t2m'||$filtro['tipoapart']=='t3m'){
                            switch($filtro['tipoapart']){
                                case 't1m':
                                    $wheretipo = "TipoApart NOT LIKE 'T0'";
                                    break;
                                case 't2m':
                                    $wheretipo = "TipoApart NOT LIKE 'T0' AND TipoApart NOT LIKE 'T1'";
                                    break;
                                case 't3m':
                                    $wheretipo = "TipoApart NOT LIKE 'T0' AND TipoApart NOT LIKE 'T1' AND TipoApart NOT LIKE 'T2'";
                                    break;
                            }
                        }else{
                            $wheretipo = "TipoApart LIKE '".$filtro['tipoapart']."'";
                        }
                        if($where!=null){
                            $where = $where." and ".$wheretipo;
                        }else{
                            $where = $wheretipo;
                        }
                    }
                }
                if($fil == 'premin'){
                    if($filtro['premin']!='null'){
                        $where = $where." and Preco >= ".$filtro['premin'];
                    }
                }
                if($fil == 'premax'){
                    if($filtro['premin']!='null'){
                        $where = $where." and Preco <= ".$filtro['premin'];
                    }
                }
                if($fil == 'order'){
                    if($filtro['order']!='null'){
                        switch($filtro['order']){
                            case 'recentes':
                                $orderby = "DataAnuncio ASC";
                                break;
                            case 'antigos':
                                $orderby = "DataAnuncio DESC";
                                break;
                            case 'asc':
                                $orderby = "Preco ASC";
                                break;
                            case 'desc':
                                $orderby = "Preco DESC";
                                break;
                        }
                    }
                }
            }
        }
        if($where){
            if($orderby){
                $apartamentos = $apartmodel::find()->where($where)->orderBy($orderby)->all();
            }else{
                $apartamentos = $apartmodel::find()->where($where)->all();
            }
        }
        else{
            if($orderby){
                $apartamentos = $apartmodel::find()->orderBy($orderby)->all();
            }else{
                $apartamentos = $apartmodel::find()->all();
            }
        }
        return $apartamentos;
    }
}
