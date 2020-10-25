<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Favorite;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FavoriteController implements the CRUD actions for Favorite model.
 */
class FavoriteController extends Controller
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
     * Lists all Favorite models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Favorite::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Favorite model.
     * @param integer $Leitor_Id
     * @param integer $Manga_Id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($Leitor_Id, $Manga_Id)
    {
        return $this->render('view', [
            'model' => $this->findModel($Leitor_Id, $Manga_Id),
        ]);
    }

    /**
     * Creates a new Favorite model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Favorite();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Leitor_Id' => $model->Leitor_Id, 'Manga_Id' => $model->Manga_Id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Favorite model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $Leitor_Id
     * @param integer $Manga_Id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($Leitor_Id, $Manga_Id)
    {
        $model = $this->findModel($Leitor_Id, $Manga_Id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Leitor_Id' => $model->Leitor_Id, 'Manga_Id' => $model->Manga_Id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Favorite model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $Leitor_Id
     * @param integer $Manga_Id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($Leitor_Id, $Manga_Id)
    {
        $this->findModel($Leitor_Id, $Manga_Id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Favorite model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $Leitor_Id
     * @param integer $Manga_Id
     * @return Favorite the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($Leitor_Id, $Manga_Id)
    {
        if (($model = Favorite::findOne(['Leitor_Id' => $Leitor_Id, 'Manga_Id' => $Manga_Id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
