<?php

namespace backend\modules\api\controllers;

use yii\rest\ActiveController;
//use common\models\Manga;
use common\models\User;
use DateTime;

class MangaController extends ActiveController
{
    public $modelClass = 'common\models\Manga';

    public function actionAllmanga($filters)
    {
        $filters_split = explode('__', strtolower(preg_replace('~([a-z])([A-Z])~', '\\1 \\2',  $filters)));
        
        if(count($filters_split)>=5){
            $User_Id = $filters_split[0];
            $Otpion = str_replace(' ','-',$filters_split[1]);
            $Status = ($filters_split[2] == '0' || $filters_split[2] == '1')?$filters_split[2]:null;
            $Genres = ($filters_split[3] != 'all' && $filters_split[3] != 'none')?$filters_split[3]:null;
            $NotGenres = ($filters_split[4] != 'all' && $filters_split[4] != 'none')?$filters_split[4]:null;
            $R18 = false;

            if($User_Id != '0'){
                $User = User::find($User_Id)->one();

                $BirthDate = new DateTime($User->BirthDate);
                $TodayDate = new DateTime(date('Y-m-d', strtotime('now')));
                $diff = date_diff($BirthDate, $TodayDate);
                
                $R18 = ($diff->y >= 18) ? true:false;
            }

            $Mangas = $this->GetManga($Otpion, $Status, $R18, $Genres, $NotGenres);
            return ['Mangas' => $Mangas];
        }
        return ['Erro' => 'There are missing parameters', 'Count' => count($filters_split), 'Filters' => $filters_split];
    }

    public function actionLibrary($filters)
    {
        $filters_split = explode('__', strtolower(preg_replace('~([a-z])([A-Z])~', '\\1 \\2',  $filters)));
        
        if(count($filters_split)>=2){
            $User_Id = $filters_split[0];
            $List = $filters_split[1];
            $MangaModel = new $this->modelClass;

            $User = User::find($User_Id)->one();
            $where = 'l.Leitor_Id = '.$User->leitor->IdLeitor;

            if($List == 'null'){
                $where = $where.' and l.List_Id is null';
            }

            if($List != 'null' && $List != 'all'){
                $where = $where.' and l.List_Id ='.$List;
            }
            
            $Mangas = $MangaModel::find()
                        ->leftJoin('library l', $on='manga.IdManga = l.Manga_Id')
                        ->leftJoin('manga_readed mr', $on='manga.IdManga = mr.Manga_Id')
                        ->where($where)
                        ->orderBy('mr.Leitor_Id, manga.Title asc')
                        ->all();
            
            return ['Mangas' => $Mangas];
        }
        return ['Erro' => 'There are missing parameters', 'Count' => count($filters_split), 'Filters' => $filters_split];
    }

    public function GetManga($Otpion, $Status, $R18, $Genres, $NotGenres){
        $MangaModel = new $this->modelClass;
        $where=null;
        $orderby=null;
        $Mangas = null;


        if($Status != null){
            $where = "manga.Status = ".$Status;
        }

        if(!$R18){
            if($where){
                $where = $where." and manga.R18 = 0";
            }else{
                $where = "manga.R18 = 0";
            }
        }
        if($Genres){
            $SplitGenres = explode('_', strtolower($Genres));
            foreach($SplitGenres as $Genre){
                if($where){
                    $where = $where." and ca.Name like '".$Genre."'";
                }else{
                    $where = "ca.Name like '".$Genre."'";
                }
            }
        }

        if($NotGenres){
            $SplitNotGenres = explode('_', strtolower($NotGenres));
            foreach($SplitNotGenres as $Genre){
                if($where){
                    $where = $where." and ca.Name not like '".$Genre."'";
                }else{
                    $where = "ca.Name not like '".$Genre."'";
                }
            }
        }

        switch ($Otpion){
            case 'latest-updates':
                $orderby="max(ch.ReleaseDate) desc, manga.Title asc";
                if($where){
                    $Mangas = $MangaModel::find()
                        ->innerJoin('chapter ch', $on='manga.IdManga = ch.Manga_Id')
                        ->innerJoin('manga_category mc', $on='manga.IdManga = mc.Manga_Id')
                        ->innerJoin('category ca', $on='ca.IdCategory = mc.Category_Id')
                        ->where($where)
                        ->groupBy('manga.IdManga')
                        ->orderBy($orderby)
                        ->all();
                }else{
                    $Mangas = $MangaModel::find()
                        ->innerJoin('chapter ch', $on='manga.IdManga = ch.Manga_Id')
                        ->innerJoin('manga_category mc', $on='manga.IdManga = mc.Manga_Id')
                        ->innerJoin('category ca', $on='ca.IdCategory = mc.Category_Id')
                        ->groupBy('manga.IdManga')
                        ->orderBy($orderby)
                        ->all();
                }
            break;
            case 'popular':
                $orderby="count(f.Manga_Id) desc, manga.Title asc";
                if($where){
                    $Mangas = $MangaModel::find()
                        ->leftJoin('favorite f', $on='manga.IdManga = f.Manga_Id')
                        ->innerJoin('manga_category mc', $on='manga.IdManga = mc.Manga_Id')
                        ->innerJoin('category ca', $on='ca.IdCategory = mc.Category_Id')
                        ->where($where)
                        ->groupBy('manga.IdManga')
                        ->orderBy($orderby)
                        ->all();
                }else{
                    $Mangas = $MangaModel::find()
                        ->leftJoin('favorite f', $on='manga.IdManga = f.Manga_Id')
                        ->innerJoin('manga_category mc', $on='manga.IdManga = mc.Manga_Id')
                        ->innerJoin('category ca', $on='ca.IdCategory = mc.Category_Id')
                        ->groupBy('manga.IdManga')
                        ->orderBy($orderby)
                        ->all();
                }
            break;
            case 'ranking':
                $orderby="avg(r.Stars) desc, manga.Title asc";
                if($where){
                    $Mangas = $MangaModel::find()
                        ->leftJoin('rating r', $on='manga.IdManga = r.Manga_Id')
                        ->innerJoin('manga_category mc', $on='manga.IdManga = mc.Manga_Id')
                        ->innerJoin('category ca', $on='ca.IdCategory = mc.Category_Id')
                        ->where($where)
                        ->groupBy('manga.IdManga')
                        ->orderBy($orderby)
                        ->all();
                }else{
                    $Mangas = $MangaModel::find()
                        ->leftJoin('rating r', $on='manga.IdManga = r.Manga_Id')
                        ->innerJoin('manga_category mc', $on='manga.IdManga = mc.Manga_Id')
                        ->innerJoin('category ca', $on='ca.IdCategory = mc.Category_Id')
                        ->groupBy('manga.IdManga')
                        ->orderBy($orderby)
                        ->all();
                }
            break;
            case 'asc':
            case 'desc':
                $orderby="Title ".$Otpion;
                if($where){
                    $Mangas = $MangaModel::find()->where($where)->orderBy($orderby)->all();
                }else{
                    $Mangas = $MangaModel::find()->orderBy($orderby)->all();
                }
            break;
        }
        return $Mangas;
    }
}
