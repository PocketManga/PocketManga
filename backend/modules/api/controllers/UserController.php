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
        
        $UrlPhoto = null;
        if($User->SrcPhoto){
            $UrlPhoto = 'img'.$User->SrcPhoto;
        }else{
            $UrlPhoto = 'img'.$Photo;
        }

        $UserToApp["IdUser"] = $User->IdUser;
        $UserToApp["Username"] = $User->Username;
        $UserToApp["Email"] = $User->Email;
        $UserToApp["UrlPhoto"] = $UrlPhoto;
        $UserToApp["Server_Id"] = $Server->IdServer;
        $UserToApp["ChapterShow"] = ($App->ChapterShow==1)?true:false;
        $UserToApp["MangaShow"] = ($App->MangaShow==1)?true:false;
        $UserToApp["Theme"] = ($App->Theme==1)?true:false;

        return $UserToApp;

    }
    
    public function actionChange()
    {
        $params = $_REQUEST;

        $User = User::find()->where('IdUser = '.$params['IdUser'])->one();
        $Server = Server::find()->where('IdServer = '.$params['Server_Id'])->one();
        
        if(!$User || !$Server){
            return "Something Got Wrong";
        }

        $App = $User->leitor->app;

        $App->MangaShow = ($params['MangaShow'] == "true")?1:0;
        $App->ChapterShow = ($params['ChapterShow'] == "true")?1:0;
        $App->Theme = ($params['Theme'] == "true")?1:0;
        $App->Server = $Server->Code;
        
        $App->save();

        return "Saved With Success";

    }
}
