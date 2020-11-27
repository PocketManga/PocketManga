<?php

namespace backend\controllers;

use Yii;
use backend\models\AppLibrary;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AppLibraryController implements the CRUD actions for AppLibrary model.
 */
class AppLibraryController extends Controller
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
     * Lists all AppLibrary models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => AppLibrary::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AppLibrary model.
     * @param integer $App_Id
     * @param integer $Manga_Id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($App_Id, $Manga_Id)
    {
        return $this->render('view', [
            'model' => $this->findModel($App_Id, $Manga_Id),
        ]);
    }

    /**
     * Creates a new AppLibrary model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AppLibrary();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'App_Id' => $model->App_Id, 'Manga_Id' => $model->Manga_Id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing AppLibrary model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $App_Id
     * @param integer $Manga_Id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($App_Id, $Manga_Id)
    {
        $model = $this->findModel($App_Id, $Manga_Id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'App_Id' => $model->App_Id, 'Manga_Id' => $model->Manga_Id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing AppLibrary model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $App_Id
     * @param integer $Manga_Id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($App_Id, $Manga_Id)
    {
        $this->findModel($App_Id, $Manga_Id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AppLibrary model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $App_Id
     * @param integer $Manga_Id
     * @return AppLibrary the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($App_Id, $Manga_Id)
    {
        if (($model = AppLibrary::findOne(['App_Id' => $App_Id, 'Manga_Id' => $Manga_Id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
