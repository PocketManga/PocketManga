<?php

namespace backend\modules\api\controllers;

use yii\rest\ActiveController;
//use common\models\Manga;
use common\models\User;
use common\models\MangaReaded;
use common\models\LibraryList;
use common\models\Library;
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
            return ['mangas' => ($Mangas)?$Mangas:null];
        }
        return ['Erro' => 'There are missing parameters', 'Count' => count($filters_split), 'Filters' => $filters_split];
    }

    public function actionTotalmanga($filters)
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
            return ['total' => count($Mangas)];
        }
        return ['Erro' => 'There are missing parameters', 'Count' => count($filters_split), 'Filters' => $filters_split];
    }
    

    public function actionLibrary($filters)
    {
        $filters_split = explode('_', $filters);
        
        if(count($filters_split)>=2){
            $User_Id = $filters_split[0];
            $List = $filters_split[1];
            $MangaModel = new $this->modelClass;
            $mangas = null;

            $User = User::find($User_Id)->one();
            $Leitor = $User->leitor;
            $where = 'l.Leitor_Id = '.$Leitor->IdLeitor;

            if($List != 'null' && $List != 'all'){
                $where = $where.' and l.List_Id ='.$List;
            }
            
            $Mangas = $MangaModel::find()
                        ->leftJoin('library l', $on='manga.IdManga = l.Manga_Id')
                        ->leftJoin('manga_readed mr', $on='manga.IdManga = mr.Manga_Id')
                        ->where($where)
                        ->orderBy('mr.Leitor_Id asc, manga.Title asc')
                        ->all();
            
            foreach($Mangas as $Manga){
                $MangaReaded = $Manga->getMangaReadeds()->where('Leitor_Id = '.$Leitor->IdLeitor)->one();
                $Library = $Manga->getLibraries()->where('Leitor_Id = '.$Leitor->IdLeitor)->one();
                $manga = [
                    'IdManga' => $Manga->IdManga,
                    'Title' => $Manga->Title,
                    'Status' => ($Manga->Status)?true:false,
                    'List' => ($Library->list)?$Library->list->Name:'Uncategorized',
                    'Readed' => ($MangaReaded)?true:false,
                ];
                $mangas[] = $manga;
            }
            
            return ['mangas' => $mangas];
        }
        return ['Erro' => 'There are missing parameters', 'Count' => count($filters_split), 'Filters' => $filters_split];
    }

    public function actionReaded($filters)
    {
        $filters_split = explode('_', $filters);
        
        if(count($filters_split)>=2){
            $Leitor_Id = $filters_split[0];
            $Manga_Id = $filters_split[1];
            $MangaModel = new $this->modelClass;

            $Manga = $MangaModel->find()->where('IdManga = '.$Manga_Id)->one();
            $Readed = $Manga->getMangaReadeds()->where('Leitor_Id = '.$Leitor_Id)->one();
            
            if($Readed){
                $Readed->delete();
                return ['Readed' => false];
            }else{
                $Readed = new MangaReaded;
                $Readed->Leitor_Id = $Leitor_Id;
                $Readed->Manga_Id = $Manga_Id;
                $Readed->save();
                return ['Readed' => true];
            }

        }
        return ['Erro' => 'There are missing parameters', 'Count' => count($filters_split), 'Filters' => $filters_split];
    }

    public function actionChangelist($filters)
    {
        $filters_split = explode('__', $filters);
        
        if(count($filters_split)>=3){
            $Leitor_Id = $filters_split[0];
            $Manga_Id = $filters_split[1];
            $ListName = $filters_split[2];
            $MangaModel = new $this->modelClass;

            $Manga = $MangaModel->find()->where('IdManga = '.$Manga_Id)->one();
            $List = LibraryList::find()->where('Name like "'.$ListName.'"')->one();
            $Library = $Manga->getLibraries()->where('Leitor_Id = '.$Leitor_Id)->one();

            if(!$List){
                $List = new LibraryList;
                $List->Name = $ListName;
                $List->save();
            }
            
            if(!$Library){
                $Library = new Library;
                $Library->Leitor_Id = $Leitor_Id;
                $Library->Manga_Id = $Manga_Id;
            }
            $Library->List_Id = $List->IdList;
            $Library->save();
            return ['Changed' => true];

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
            if($where){
                $where = $where." and";
            }
            $where = $where." (";
            $i = 0;
            foreach($SplitGenres as $Genre){
                if($i != 0){
                    $where = $where.' and';
                }
                $where = $where." exists (select * from category ca inner join manga_category mc on mc.Category_Id = ca.IdCategory where mc.Manga_Id=manga.IdManga and ca.Name like '".$Genre."')";
                $i++;
            }
            $where = $where.')';
        }

        if($NotGenres){
            $SplitNotGenres = explode('_', strtolower($NotGenres));
            if($where){
                $where = $where." and";
            }
            $where = $where." (";
            $i = 0;
            foreach($SplitNotGenres as $Genre){
                if($i != 0){
                    $where = $where.' and';
                }
                $where = $where." !exists (select * from category ca inner join manga_category mc on mc.Category_Id = ca.IdCategory where mc.Manga_Id=manga.IdManga and ca.Name like '".$Genre."')";
                $i++;
            }
            $where = $where.')';
        }

        switch ($Otpion){
            case 'latest-updates':
                $orderby="max(ch.ReleaseDate) desc, manga.Title asc";
                if($where){
                    $Mangas = $MangaModel::find()
                        ->innerJoin('chapter ch', $on='manga.IdManga = ch.Manga_Id')
                        ->where($where)
                        ->groupBy('manga.IdManga')
                        ->orderBy($orderby)
                        ->all();
                }else{
                    $Mangas = $MangaModel::find()
                        ->innerJoin('chapter ch', $on='manga.IdManga = ch.Manga_Id')
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
                        ->where($where)
                        ->groupBy('manga.IdManga')
                        ->orderBy($orderby)
                        ->all();
                }else{
                    $Mangas = $MangaModel::find()
                        ->leftJoin('favorite f', $on='manga.IdManga = f.Manga_Id')
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
                        ->where($where)
                        ->groupBy('manga.IdManga')
                        ->orderBy($orderby)
                        ->all();
                }else{
                    $Mangas = $MangaModel::find()
                        ->leftJoin('rating r', $on='manga.IdManga = r.Manga_Id')
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
