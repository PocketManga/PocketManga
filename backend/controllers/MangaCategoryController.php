<?php

namespace backend\controllers;

use Yii;
use common\models\MangaCategory;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MangaCategoryController implements the CRUD actions for MangaCategory model.
 */
class MangaCategoryController extends Controller
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
     * Lists all MangaCategory models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => MangaCategory::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MangaCategory model.
     * @param integer $Category_Id
     * @param integer $Manga_Id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($Category_Id, $Manga_Id)
    {
        return $this->render('view', [
            'model' => $this->findModel($Category_Id, $Manga_Id),
        ]);
    }

    /**
     * Creates a new MangaCategory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MangaCategory();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Category_Id' => $model->Category_Id, 'Manga_Id' => $model->Manga_Id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing MangaCategory model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $Category_Id
     * @param integer $Manga_Id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($Category_Id, $Manga_Id)
    {
        $model = $this->findModel($Category_Id, $Manga_Id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Category_Id' => $model->Category_Id, 'Manga_Id' => $model->Manga_Id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing MangaCategory model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $Category_Id
     * @param integer $Manga_Id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($Category_Id, $Manga_Id)
    {
        $this->findModel($Category_Id, $Manga_Id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the MangaCategory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $Category_Id
     * @param integer $Manga_Id
     * @return MangaCategory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($Category_Id, $Manga_Id)
    {
        if (($model = MangaCategory::findOne(['Category_Id' => $Category_Id, 'Manga_Id' => $Manga_Id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
