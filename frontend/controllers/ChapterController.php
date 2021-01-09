<?php

namespace frontend\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use common\models\Chapter;
use common\models\Manga;

/**
 * ChapterController implements the CRUD actions for Chapter model.
 */
class ChapterController extends Controller
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
     * Displays a single Chapter model.
     * @param integer $idChapter
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idManga, $idChapter)
    {
        $Manga = Manga::find()->where('IdManga = '.$idManga)->one();
        $Chapters = Chapter::find()->where('Manga_Id = '.$idManga)->orderBy('Number')->all();
        
        $Chapter = $this->findModel($idChapter);

        $Previous = null;
        $Next = null;

        for($i = 0; $i < count($Chapters); $i++){
            if($Chapters[$i]->IdChapter == $idChapter){
                if($i!=0){
                    $Previous = $Chapters[$i-1]->IdChapter;
                }
                if($i<count($Chapters)-1){
                    $Next = $Chapters[$i+1]->IdChapter;
                }
            }
        }

        return $this->render('view', [
            'Chapter' => $Chapter,
            'Manga' => $Manga,
            'Previous' => $Previous,
            'Next' => $Next,
        ]);
    }

    /**
     * Finds the Chapter model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idChapter
     * @return Chapter the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idChapter)
    {
        if (($model = Chapter::findOne($idChapter)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
