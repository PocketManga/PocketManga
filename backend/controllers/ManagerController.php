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
        $auth = Yii::$app->authManager;
        $UserRoles = $auth->getRolesByUser(Yii::$app->user->identity->IdUser);
        
        return $this->render('list', [
            'Managers' => $Managers,
            'Roles' => $UserRoles,
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
        $auth = Yii::$app->authManager;
        $roleModel = Yii::$app->db
            ->createCommand("Select * from auth_assignment where user_id='".$idManager."'")
            ->queryOne();
        $UserRoles = $auth->getRolesByUser(Yii::$app->user->identity->IdUser);

        $Role = null;

        foreach ($UserRoles as $URole){
            if($URole->name == $roleModel['item_name']){
                $Role = $URole;
            }
        }
        return $this->render('view', [
            'model' => $model,
            'Role' => $Role,
            'Roles' => $UserRoles,
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
            $auth = Yii::$app->authManager;
            $role=$auth->getRole('low_manager');
            
            $auth->assign($role, $model->user->getId());
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
    public function actionUpdate($idManager, $roleName)
    {
        $model = $this->findModel($idManager);

        $auth = Yii::$app->authManager;
        $role=$auth->getRole($roleName);
        
        $auth->revokeAll($model->user->getId());
        $auth->assign($role, $model->user->getId());

        return $this->redirect(Yii::$app->request->baseUrl.'/'.'manager/'.$idManager);
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
        $model = $this->findModel($idManager);
        $auth = Yii::$app->authManager;
        $auth->revokeAll($model->user->getId());

        $model->delete();

        return $this->redirect(Yii::$app->request->baseUrl.'/manager_list');
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
