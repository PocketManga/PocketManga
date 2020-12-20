<?php

namespace backend\controllers;

use Yii;
use common\models\Server;
use common\models\Manga;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * ServerController implements the CRUD actions for Server model.
 */
class ServerController extends Controller
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
                        'actions' => ['create','update'],
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
     * Lists all Server models.
     * @return mixed
     */
    public function actionList()
    {
        if(!Yii::$app->user->can('ViewPost')){
            throw new HttpException(403,'You are not allowed to perform this action.');
        }

        $Servers = Server::find()->all();

        return $this->render('list', [
            'Servers' => $Servers,
        ]);
    }

    /**
     * Displays a single Server model.
     * @param integer $idServer
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idServer)
    {
        if(!Yii::$app->user->can('ViewPost')){
            throw new HttpException(403,'You are not allowed to perform this action.');
        }

        $model = $this->findModel($idServer);
        $Mangas = Manga::find()->where('Server like "'.$model->Code.'"')->all();

        return $this->render('view', [
            'model' => $model,
            'Mangas' => $Mangas,
        ]);
    }

    /**
     * Creates a new Server model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(!Yii::$app->user->can('CreatePost')){
            throw new HttpException(403,'You are not allowed to perform this action.');
        }

        $model = new Server();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idServer' => $model->IdServer]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Server model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idServer
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idServer)
    {
        if(!Yii::$app->user->can('UpdatePost')){
            throw new HttpException(403,'You are not allowed to perform this action.');
        }

        $model = $this->findModel($idServer);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idServer' => $model->IdServer]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Server model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idServer
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idServer)
    {
        if(!Yii::$app->user->can('DeletePost')){
            throw new HttpException(403,'You are not allowed to perform this action.');
        }

        $this->findModel($idServer)->delete();

        return $this->redirect(Yii::$app->request->baseUrl.'/server_list');
    }

    /**
     * Finds the Server model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idServer
     * @return Server the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idServer)
    {
        if (($model = Server::findOne($idServer)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
