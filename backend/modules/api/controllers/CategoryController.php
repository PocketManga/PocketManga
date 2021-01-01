<?php

namespace backend\modules\api\controllers;

use Yii;
use yii\rest\ActiveController;
use yii\web\Controller;
use common\models\User;
use common\models\Server;

/**
 * Default controller for the `api` module
 */
class CategoryController extends ActiveController
{
    public $modelClass = 'common\models\Category';
    
    public function actionAll($idUser)
    {
        $User = User::find()->where('IdUser = '.$idUser)->one();
        
        if(!$User){
            return null;
        }

        $CategoryModel = new $this->modelClass;
        $Categories = $CategoryModel->find()->all();

        $CategoriesToApp = null;
        if($Categories){
            foreach($Categories as $Category){
                $newCategory = null;

                $newCategory["IdCategory"] = $Category->IdCategory;
                $newCategory["NumMangas"] = count($Category->mangas);
                $newCategory["Name"] = $Category->Name;
                $newCategory["NameUrl"] = lcfirst(str_replace(' ','',ucwords($Category->Name, " ")));
                
                $ChaptersToApp[] = $newCategory;
            }
        }

        return ($ChaptersToApp)?$ChaptersToApp:null;
    }
    
    public function actionMangas($idCategory, $idUser)
    {
        $User = User::find()->where('IdUser = '.$idUser)->one();
        
        if(!$User){
            return null;
        }

        $CategoryModel = new $this->modelClass;

        $Category = $CategoryModel->find()->where('IdCategory = '.$idCategory)->one();
        $Favorites = $User->leitor->mangas;
        $Mangas = $Category->mangas;

        $MangasToApp = null;
        
        if($Mangas){
            foreach($Mangas as $Manga){
                $Server = Server::find()->where('Code like "'.$Manga->Server.'"')->one();
                $newManga = null;

                $newManga["IdManga"] = $Manga->IdManga;
                $newManga["Title"] = $Manga->Title;
                $newManga["AlternativeTitle"] = $Manga->AlternativeTitle;
                $newManga["OriginalTitle"] = $Manga->OriginalTitle;
                $newManga["ReleaseDate"] = $Manga->ReleaseDate;
                $newManga["Server"] = ($Server->Name)?$Server->Name:$Manga->Server;
                $newManga["Description"] = $Manga->Description;
                $newManga["Status"] = ($Manga->Status==1)?true:false;
                $newManga["Oneshot"] = ($Manga->OneShot==1)?true:false;
                $newManga["R18"] = ($Manga->R18==1)?true:false;

                $newManga["Image"] = 'img'.$Manga->SrcImage;

                $newManga["List"] = null;
                $newManga["Favorite"] = false;
                if($Favorites){
                    foreach($Favorites as $Favorite){
                        if($Manga == $Favorite){
                            $newManga["Favorite"] = true;
                        }
                    }
                }

                $Authors = null;
                $Categories = null;

                $MangaAuthors = $Manga->authors;
                $MangaCategories = $Manga->categories;

                if($MangaAuthors){
                    foreach($MangaAuthors as $Author){
                        $Authors = $Authors.(($Authors)?' , ':'').$Author->FirstName.(($Author->LastName)?' '.$Author->LastName:'');
                    }
                }
                $newManga["Authors"] = $Authors;

                if($MangaCategories){
                    foreach($MangaCategories as $Category){
                        $Categories = $Categories.(($Categories)?' , ':'').$Category->Name;
                    }
                }
                $newManga["Categories"] = $Categories;

                $MangasToApp[] = $newManga;
            }
        }

        return ($MangasToApp)?$MangasToApp:null;
    }
}
