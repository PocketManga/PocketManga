<?php

namespace backend\modules\api\controllers;

use Yii;
use yii\rest\ActiveController;
use yii\web\Controller;
use common\models\Server;

/**
 * Default controller for the `api` module
 */
class ServerController extends ActiveController
{
    public $modelClass = 'common\models\Server';
    
    /*public function actionAll()
    {
        $ServerModel = new $modelClass;
        $Servers = $ServerModel->find()->all();

        $ServersToApp = null;

        foreach($Servers as $Server){
            $newServer = new Server();

            $newServer["IdServer"] = $Server->IdServer;
            $newServer["Name"] = $Server->Name;
            $newServer["Code"] = $Server->Code;

            $ServersToApp[] = $newServer;
        }

        return $ServersToApp;

    }*/
}
