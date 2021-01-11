<?php

namespace backend\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\HttpException;

use common\models\Leitor;
use common\models\LibraryList;

/**
 * LeitorController implements the CRUD actions for Leitor model.
 */
class LeitorController extends Controller
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
                        'actions' => ['list','view'],
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
     * Lists all Leitor models.
     * @return mixed
     */
    public function actionList()
    {
        if(!Yii::$app->user->can('UserViewPost')){
            throw new HttpException(403,'You are not allowed to perform this action.');
        }

        $Readers = Leitor::find()->where("Status = 1")->all();

        return $this->render('list', [
            'Readers' => $Readers,
        ]);
    }

    /**
     * Displays a single Leitor model.
     * @param integer $idLeitor
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idLeitor)
    {
        if(!Yii::$app->user->can('UserViewPost')){
            throw new HttpException(403,'You are not allowed to perform this action.');
        }

        $model = $this->findModel($idLeitor);
        
        $Lists = LibraryList::find()
            ->leftJoin('library li', $on='li.List_Id = library_list.IdList')
            ->leftJoin('leitor le', $on='le.IdLeitor = li.Leitor_Id')
            ->where('le.IdLeitor ='.$idLeitor)
            ->all();

        return $this->render('view', [
            'model' => $model,
            'Lists' => $Lists,
        ]);
    }

    /**
     * Updates an existing Leitor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idLeitor
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idLeitor)
    {
        if(!Yii::$app->user->can('UserUpdatePost')){
            throw new HttpException(403,'You are not allowed to perform this action.');
        }

        $model = $this->findModel($idLeitor);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idLeitor' => $model->IdLeitor]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Leitor model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idLeitor
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idLeitor)
    {
        if(!Yii::$app->user->can('UserDeletePost')){
            throw new HttpException(403,'You are not allowed to perform this action.');
        }

        $model = $this->findModel($idLeitor);
        $model->Status = 0;
        $model->save();

        return $this->redirect(Yii::$app->request->baseUrl.'/reader_list');
    }

    /**
     * Finds the Leitor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idLeitor
     * @return Leitor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idLeitor)
    {
        if (($model = Leitor::findOne($idLeitor)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
