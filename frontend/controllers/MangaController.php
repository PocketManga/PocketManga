<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Manga;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use frontend\models\Category;

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
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Manga models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Manga::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
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
        
        return $this->render('view', [
            'Manga' => $Manga,
            'Authors' => $Authors,
            'Genres' => $Genres,
            'Chapters' => $Chapters,
            'Categories' => $Categories,
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
