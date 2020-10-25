<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Like;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LikeController implements the CRUD actions for Like model.
 */
class LikeController extends Controller
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
     * Lists all Like models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Like::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Like model.
     * @param integer $User_Id
     * @param integer $Comment_Id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($User_Id, $Comment_Id)
    {
        return $this->render('view', [
            'model' => $this->findModel($User_Id, $Comment_Id),
        ]);
    }

    /**
     * Creates a new Like model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Like();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'User_Id' => $model->User_Id, 'Comment_Id' => $model->Comment_Id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Like model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $User_Id
     * @param integer $Comment_Id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($User_Id, $Comment_Id)
    {
        $model = $this->findModel($User_Id, $Comment_Id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'User_Id' => $model->User_Id, 'Comment_Id' => $model->Comment_Id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Like model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $User_Id
     * @param integer $Comment_Id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($User_Id, $Comment_Id)
    {
        $this->findModel($User_Id, $Comment_Id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Like model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $User_Id
     * @param integer $Comment_Id
     * @return Like the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($User_Id, $Comment_Id)
    {
        if (($model = Like::findOne(['User_Id' => $User_Id, 'Comment_Id' => $Comment_Id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
