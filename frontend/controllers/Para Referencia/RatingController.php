<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Rating;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RatingController implements the CRUD actions for Rating model.
 */
class RatingController extends Controller
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
     * Lists all Rating models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Rating::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Rating model.
     * @param integer $User_Id
     * @param integer $Manga_Id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($User_Id, $Manga_Id)
    {
        return $this->render('view', [
            'model' => $this->findModel($User_Id, $Manga_Id),
        ]);
    }

    /**
     * Creates a new Rating model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Rating();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'User_Id' => $model->User_Id, 'Manga_Id' => $model->Manga_Id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Rating model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $User_Id
     * @param integer $Manga_Id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($User_Id, $Manga_Id)
    {
        $model = $this->findModel($User_Id, $Manga_Id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'User_Id' => $model->User_Id, 'Manga_Id' => $model->Manga_Id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Rating model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $User_Id
     * @param integer $Manga_Id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($User_Id, $Manga_Id)
    {
        $this->findModel($User_Id, $Manga_Id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Rating model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $User_Id
     * @param integer $Manga_Id
     * @return Rating the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($User_Id, $Manga_Id)
    {
        if (($model = Rating::findOne(['User_Id' => $User_Id, 'Manga_Id' => $Manga_Id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
