<?php

namespace frontend\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use common\models\Manga;
use common\models\Category;

/**
 * MangaController implements the CRUD actions for Manga model.
 */
class MangaController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
            ],
        ];
    }

    /**
     * Displays a single Manga model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $Categories = Category::find()->all();
        $Manga = $this->findModel($id);
        $Authors = $Manga->getAuthors()->all();
        $Chapters = $Manga->getChapters()->all();
        $Genres = $Manga->getCategories()->all();
        $ChapterReadeds = null;
        $Favorite = false;
        $Library = false;

        if(!Yii::$app->user->isGuest){
            $ChapterReadeds = Yii::$app->user->identity->leitor->chapterReadeds;
            $Favorites = Yii::$app->user->identity->leitor->favorites;
            $Libraries = Yii::$app->user->identity->leitor->libraries;
            if($Favorites){
                foreach($Favorites as $Fav){
                    if($Fav->Manga_Id == $Manga->IdManga){
                        $Favorite = true;
                    }
                }
            }
            if($Libraries){
                foreach($Libraries as $Lib){
                    if($Lib->Manga_Id == $Manga->IdManga){
                        $Library = true;
                    }
                }
            }
        }
        
        return $this->render('view', [
            'Manga' => $Manga,
            'Authors' => $Authors,
            'Genres' => $Genres,
            'Chapters' => $Chapters,
            'Categories' => $Categories,
            'ChapterReadeds' => $ChapterReadeds,
            'Favorite' => $Favorite,
            'Library' => $Library,
        ]);
    }

    /**
     * Finds the Manga model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Manga the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Manga::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
