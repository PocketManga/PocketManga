<?php

namespace backend\controllers;

use Yii;
use common\models\Manga;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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
    public function actionList()
    {
        $Mangas = Manga::find()->all();

        return $this->render('list', [
            'Mangas' => $Mangas,
        ]);
    }

    /**
     * Displays a single Manga model.
     * @param integer $idManga
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idManga)
    {
        $Manga = $this->findModel($idManga);
        $Authors = $Manga->getAuthors()->all();
        $Chapters = $Manga->getChapters()->all();
        $Genres = $Manga->getCategories()->all();
        return $this->render('view', [
            'Authors' => $Authors,
            'Chapters' => $Chapters,
            'Genres' => $Genres,
            'Manga' => $Manga,
        ]);
    }

    /**
     * Creates a new Manga model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Manga();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idManga' => $model->IdManga]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Manga model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idManga
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idManga)
    {
        $model = $this->findModel($idManga);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idManga' => $model->IdManga]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Manga model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idManga
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idManga)
    {
        $this->findModel($idManga)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Manga model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idManga
     * @return Manga the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idManga)
    {
        if (($model = Manga::findOne($idManga)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
