<?php

namespace backend\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\HttpException;

use common\models\Category;
use common\models\Server;

/**
 * CategoryController implements the CRUD actions for Category model.
 */
class CategoryController extends Controller
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
                        'actions' => ['create', 'update'],
                        'roles' => ['admin','full_manager','medium_manager'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['delete'],
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
     * Lists all Category models.
     * @return mixed
     */
    public function actionList()
    {
        if(!Yii::$app->user->can('ViewPost')){
            throw new HttpException(403,'You are not allowed to perform this action.');
        }

        $Categories = Category::find()->all();

        return $this->render('list', [
            'Categories' => $Categories,
        ]);
    }

    /**
     * Displays a single Category model.
     * @param integer $idCategory
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idCategory)
    {
        if(!Yii::$app->user->can('ViewPost')){
            throw new HttpException(403,'You are not allowed to perform this action.');
        }

        return $this->render('view', [
            'model' => $this->findModel($idCategory),
        ]);
    }

    /**
     * Creates a new Category model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(!Yii::$app->user->can('CreatePost')){
            throw new HttpException(403,'You are not allowed to perform this action.');
        }

        $model = new Category();
        $Servers = Server::find()->all();

        $DDServers = null;

        foreach($Servers as $Server){
            $DDServers[$Server->Code] = $Server->Name;
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idCategory' => $model->IdCategory]);
        }

        return $this->render('create', [
            'model' => $model,
            'Servers' => $DDServers,
        ]);
    }

    /**
     * Updates an existing Category model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idCategory
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idCategory)
    {
        if(!Yii::$app->user->can('UpdatePost')){
            throw new HttpException(403,'You are not allowed to perform this action.');
        }

        $model = $this->findModel($idCategory);
        $Servers = Server::find()->all();

        $DDServers = null;

        foreach($Servers as $Server){
            $DDServers[$Server->Code] = $Server->Name;
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idCategory' => $model->IdCategory]);
        }

        return $this->render('update', [
            'model' => $model,
            'Servers' => $DDServers,
        ]);
    }

    /**
     * Deletes an existing Category model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idCategory
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idCategory)
    {
        if(!Yii::$app->user->can('DeletePost')){
            throw new HttpException(403,'You are not allowed to perform this action.');
        }

        $this->findModel($idCategory)->delete();

        return $this->redirect(Yii::$app->request->baseUrl.'/category_list');
    }

    /**
     * Finds the Category model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idCategory
     * @return Category the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idCategory)
    {
        if (($model = Category::findOne($idCategory)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
