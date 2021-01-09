<?php

namespace backend\modules\api\controllers;

use Yii;
use yii\rest\ActiveController;
use yii\web\Controller;
use common\models\User;
use common\models\Manga;
use common\models\Favorite;

/**
 * Default controller for the `api` module
 */
class FavoriteController extends ActiveController
{
    public $modelClass = 'common\models\Favorite';

    public function actionFavdelete($idUser, $idManga)
    {
        $User = User::find($idUser)->one();

        if(!$User){
            return "Something Got Wrong";
        }

        $Favorites = $User->leitor->favorites;

        $Manga = Manga::find()->where('IdManga = '.$idManga)->one();

        $result = $this->ChangeFavorite($User, $Manga, $Favorites, false);

        return $result;
    }
    
    public function actionFavcreate()
    {
        $params = $_REQUEST;

        $User = User::find($params["IdUser"])->one();

        if(!$User){
            return "Something Got Wrong";
        }

        $Favorites = $User->leitor->favorites;

        $Manga = Manga::find()->where('IdManga = '.$params["IdManga"])->one();
        
        $result = $this->ChangeFavorite($User, $Manga, $Favorites, true);

        return $result;
    }
    
    private function ChangeFavorite($User, $Manga, $Favorites, $create){

        $Favorite = null;

        if($Favorites){
            foreach($Favorites as $Fav){
                if($Fav->Manga_Id == $Manga->IdManga){
                    $Favorite = $Fav;
                }
            }
        }
        if($create){
            if($Favorite){
                return "Already in Favorites";
            }else{
                $Favorite = new Favorite();
                $Favorite->Manga_Id = $Manga->IdManga;
                $Favorite->Leitor_Id = $User->leitor->IdLeitor;
                $Favorite->save();
    
                return "Added to Favorites";
            }
        }else{
            if($Favorite){
                $Fav = Favorite::find()->where("Leitor_Id = ".$Favorite->Leitor_Id." and Manga_Id = ".$Favorite->Manga_Id)->one();
                $Fav->delete();
                
                return "Removed from Favorites";
            }else{
                return "It Wasn´t on Favorites";
            }
        }
    }
}
