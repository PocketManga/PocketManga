<?php

namespace backend\modules\api\controllers;

use Yii;
use yii\rest\ActiveController;
use yii\web\Controller;
use common\models\User;
use common\models\Manga;
use common\models\Library;

/**
 * Default controller for the `api` module
 */
class LibraryController extends ActiveController
{
    public $modelClass = 'common\models\Library';

    public function actionLibdelete($idUser, $idManga)
    {
        $User = User::find($idUser)->one();

        if(!$User){
            return "Something Got Wrong";
        }

        $Libraries = $User->leitor->libraries;

        $Manga = Manga::find()->where('IdManga = '.$idManga)->one();

        $result = $this->ChangeLibrary($User, $Manga, $Libraries, false);

        return $result;
    }
    
    public function actionLibcreate()
    {
        $params = $_REQUEST;

        $User = User::find($params["IdUser"])->one();

        if(!$User){
            return "Something Got Wrong";
        }

        $Libraries = $User->leitor->libraries;

        $Manga = Manga::find()->where('IdManga = '.$params["IdManga"])->one();
        
        $result = $this->ChangeLibrary($User, $Manga, $Libraries, true);

        return $result;
    }
    
    private function ChangeLibrary($User, $Manga, $Libraries, $create){

        $Library = null;

        if($Libraries){
            foreach($Libraries as $Lib){
                if($Lib->Manga_Id == $Manga->IdManga){
                    $Library = $Lib;
                }
            }
        }
        if($create){
            if($Library){
                return "Already in Library";
            }else{
                $Library = new Library();
                $Library->Manga_Id = $Manga->IdManga;
                $Library->Leitor_Id = $User->leitor->IdLeitor;
                $Library->List_Id = 1;
                $Library->save();
    
                return "Added to Library";
            }
        }else{
            if($Library){
                $Lib = Library::find()->where("Leitor_Id = ".$Library->Leitor_Id." and Manga_Id = ".$Library->Manga_Id)->one();
                $Lib->delete();
                
                return "Removed from Library";
            }else{
                return "It Wasn´t on Library";
            }
        }
    }
}
