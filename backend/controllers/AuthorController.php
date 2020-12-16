<?php

namespace backend\controllers;

use Yii;
use common\models\Author;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\HttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

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
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['list'],
                        'roles' => ['@'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['view'],
                        'roles' => ['admin','full_manager','medium_manager','low_manager'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['create'],
                        'roles' => ['admin','full_manager','medium_manager'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['update','delete'],
                        'roles' => ['admin','full_manager'],
                    ],
                ],
            ],
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
        if(!Yii::$app->user->can('ViewPost')){
            throw new HttpException(403,'You are not allowed to perform this action.');
        }

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
        if(!Yii::$app->user->can('ViewPost')){
            throw new HttpException(403,'You are not allowed to perform this action.');
        }

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
        if(!Yii::$app->user->can('CreatePost')){
            throw new HttpException(403,'You are not allowed to perform this action.');
        }

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
        if(!Yii::$app->user->can('UpdatePost')){
            throw new HttpException(403,'You are not allowed to perform this action.');
        }

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
        if(!Yii::$app->user->can('DeletePost')){
            throw new HttpException(403,'You are not allowed to perform this action.');
        }

        $this->findModel($idAuthor)->delete();

        return $this->redirect(Yii::$app->request->baseUrl.'/author_list');
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
