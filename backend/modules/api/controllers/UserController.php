<?php

namespace backend\modules\api\controllers;

use Yii;
use yii\rest\ActiveController;
use yii\web\Controller;
use common\models\User;
use common\models\Server;
use backend\models\App;

/**
 * Default controller for the `api` module
 */
class UserController extends ActiveController
{
    private $localUrl = 'http://192.168.137.1';

    public $modelClass = 'common\models\User';
    
    public function actionLogin()
    {
        $params = $_REQUEST;

        $User = User::find()->where('Username like "%'.$params['username'].'%"')->one();
        
        if(!$User){
            return ['success' => false];
        }
        $App = $User->leitor->app;
        if(!$App){
            $newApp = new App;
            $newApp->Leitor_Id = $User->leitor->IdLeitor;
            $newApp->save();
        }
        $validation = $User->validatePassword($params['password']);
        
        if(!$validation){
            return ['success' => false];
        }

        $User->generateEmailVerificationToken();
        $User->save();

        return ['success' => $validation, 'username' => $User->Username, 'token' => $User->verification_token, 'idUser' => $User->IdUser];

    }
    
    public function actionUser($idUser)
    {
        $User = User::find()->where('IdUser = '.$idUser)->one();
        
        if(!$User){
            return null;
        }
        $App = $User->leitor->app;
        if(!$App){
            return null;
        }
        $UserToApp = null;

        $Server = Server::find()->where('Code like "'.$User->leitor->app->Server.'"')->one();

        $Photo = null;
        if($User->Gender == "F"){
            $Photo = "/default/F.jpg";
        }else{
            $Photo = "/default/M.jpg";
        }

        $UserToApp["IdUser"] = $User->IdUser;
        $UserToApp["Username"] = $User->Username;
        $UserToApp["Email"] = $User->Email;
        $UserToApp["UrlPhoto"] = $this->localUrl.Yii::$app->request->baseUrl.'/img'.($User->SrcPhoto)?$User->SrcPhoto:$Photo;
        $UserToApp["Server_Id"] = $Server->IdServer;
        $UserToApp["ChapterShow"] = ($App->ChapterShow==1)?true:false;
        $UserToApp["MangaShow"] = ($App->MangaShow==1)?true:false;
        $UserToApp["Theme"] = ($App->Theme==1)?true:false;

        return $UserToApp;

    }
}
