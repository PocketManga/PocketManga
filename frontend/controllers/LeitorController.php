<?php

namespace frontend\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\HttpException;
use yii\filters\AccessControl;
use yii\web\UploadedFile;

use frontend\models\MyAccountForm;
use common\models\Leitor;
use common\models\User;
use common\models\Server;

/**
 * LeitorController implements the CRUD actions for Chapter model.
 */
class LeitorController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['myaccount'],
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Updates an existing Leitor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionMyaccount()
    {
        /*if(!Yii::$app->user->can('UserUpdatePost')){
            throw new HttpException(403,'You are not allowed to perform this action.');
        }*/
        $Leitor = $this->findModel(Yii::$app->user->identity->leitor->IdLeitor);

        $Servers = Server::find()->orderBy('Name')->all();

        $model = new MyAccountForm();
        $model->setVariables($Leitor);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $User = User::find()->where('Username like "%'.$model->Username.'%" and IdUser != '.Yii::$app->user->identity->IdUser)->one();
    
            $Image = UploadedFile::getInstance($model, 'Photo');
            if($Image){
                $pathFolder = '/'.'users/'.Yii::$app->user->identity->IdUser;
                $fullPath = Yii::getAlias('@backend').'/web/img'.$pathFolder;

                if (!file_exists($fullPath)) {
                    mkdir($fullPath, 0777, true);
                }

                $path = $fullPath.'/photo.'.$Image->extension;
                $Image->saveAs($path);
                $Leitor->user->SrcPhoto = $pathFolder.'/photo.'.$Image->extension;
            }
    
            if($User){
                Yii::$app->session->setFlash('Error', "Username already exists!!");
            }else{
                $Leitor->user->Username = $model->Username;
            }
            $Leitor->Theme = $model->Theme;
            $Leitor->user->BirthDate = $model->BirthDate;
            $Leitor->user->Gender = $model->Gender;
            $Leitor->user->save();
            $Leitor->save();
    
            return $this->redirect(Yii::$app->request->baseUrl.'/my_account');
        }

        return $this->render('myaccount',[
            'model' => $model,
            'Servers' => $Servers,
        ]);
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
