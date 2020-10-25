<?php

namespace frontend\controllers;

use Yii;
use frontend\models\ChapterReaded;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ChapterReadedController implements the CRUD actions for ChapterReaded model.
 */
class ChapterReadedController extends Controller
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
     * Lists all ChapterReaded models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => ChapterReaded::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ChapterReaded model.
     * @param integer $Leitor_Id
     * @param integer $Chapter_Id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($Leitor_Id, $Chapter_Id)
    {
        return $this->render('view', [
            'model' => $this->findModel($Leitor_Id, $Chapter_Id),
        ]);
    }

    /**
     * Creates a new ChapterReaded model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ChapterReaded();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Leitor_Id' => $model->Leitor_Id, 'Chapter_Id' => $model->Chapter_Id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ChapterReaded model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $Leitor_Id
     * @param integer $Chapter_Id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($Leitor_Id, $Chapter_Id)
    {
        $model = $this->findModel($Leitor_Id, $Chapter_Id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Leitor_Id' => $model->Leitor_Id, 'Chapter_Id' => $model->Chapter_Id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ChapterReaded model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $Leitor_Id
     * @param integer $Chapter_Id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($Leitor_Id, $Chapter_Id)
    {
        $this->findModel($Leitor_Id, $Chapter_Id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ChapterReaded model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $Leitor_Id
     * @param integer $Chapter_Id
     * @return ChapterReaded the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($Leitor_Id, $Chapter_Id)
    {
        if (($model = ChapterReaded::findOne(['Leitor_Id' => $Leitor_Id, 'Chapter_Id' => $Chapter_Id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
