<?php

namespace backend\controllers;

use Yii;
use common\models\Author;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AuthorController implements the CRUD actions for Author model.
 */
class AuthorController extends Controller
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
     * Lists all Author models.
     * @return mixed
     */
    public function actionList()
    {
        $Authors = Author::find()->all();

        return $this->render('list', [
            'Authors' => $Authors,
        ]);
    }

    /**
     * Displays a single Author model.
     * @param integer $idAuthor
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idAuthor)
    {
        return $this->render('view', [
            'model' => $this->findModel($idAuthor),
        ]);
    }

    /**
     * Creates a new Author model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Author();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idAuthor' => $model->IdAuthor]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Author model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idAuthor
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idAuthor)
    {
        $model = $this->findModel($idAuthor);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idAuthor' => $model->IdAuthor]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Author model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idAuthor
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idAuthor)
    {
        $this->findModel($idAuthor)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Author model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idAuthor
     * @return Author the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idAuthor)
    {
        if (($model = Author::findOne($idAuthor)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
