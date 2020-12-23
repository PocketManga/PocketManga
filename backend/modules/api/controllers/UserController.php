<?php

namespace backend\modules\api\controllers;

use yii\web\Controller;
use common\models\User;

/**
 * Default controller for the `api` module
 */
class UserController extends Controller
{
    public $modelClass = 'common\models\User';
    
    public function actionLogin($username, $passwordHash)
    {
        $UserModel = new $this->modelClass;

        $User = User::find()->where('Username like "%'.$username.'%"')->one();
        
        if($User){
            return ($User->validatePassword($passwordHash))?true:false;
        }

        return 0;
    }
}
