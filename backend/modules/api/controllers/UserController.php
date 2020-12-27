<?php

namespace backend\modules\api\controllers;

use Yii;
use yii\rest\ActiveController;
use yii\web\Controller;
use common\models\User;

/**
 * Default controller for the `api` module
 */
class UserController extends ActiveController
{
    public $modelClass = 'common\models\User';
    
    public function actionLogin()
    {
        $params = $_REQUEST;

        $UserModel = new $this->modelClass;

        $User = User::find()->where('Username like "%'.$params['username'].'%"')->one();
        
        if(!$User){
            return ['success' => false];
        }
        $validation = $User->validatePassword($params['password']);
        
        if(!$validation){
            return ['success' => false];
        }

        $User->generateEmailVerificationToken();
        $User->save();

        return ['success' => $validation, 'username' => $User->Username, 'token' => $User->verification_token, 'idUser' => $User->IdUser];

    }
}
