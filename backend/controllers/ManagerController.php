<?php

namespace backend\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use backend\models\Manager;
use common\models\User;

/**
 * ManagerController implements the CRUD actions for Manager model.
 */
class ManagerController extends Controller
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
     * Lists all Manager models.
     * @return mixed
     */
    public function actionList()
    {
        $Managers = Manager::find()->all();

        return $this->render('list', [
            'Managers' => $Managers,
        ]);
    }

    /**
     * Displays a single Manager model.
     * @param integer $idManager
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idManager)
    {
        $model = $this->findModel($idManager);
        $Roles = Yii::$app->authManager->getRolesByUser($model->user->IdUser);
        var_dump($Roles);
        return 'true';
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new Manager model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Manager();
        $Users = User::find()->all();
        $DDUsers = null;
        
        foreach($Users as $User){
            if(!$User->manager){
                $DDUsers[$User->IdUser] = $User->Username;
            }
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idManager' => $model->IdManager]);
        }

        return $this->render('create', [
            'model' => $model,
            'Users' => $DDUsers,
        ]);
    }

    /**
     * Updates an existing Manager model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idManager
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idManager)
    {
        $model = $this->findModel($idManager);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idManager' => $model->IdManager]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Manager model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idManager
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idManager)
    {
        $this->findModel($idManager)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Manager model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idManager
     * @return Manager the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idManager)
    {
        if (($model = Manager::findOne($idManager)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
