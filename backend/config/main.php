<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'name' => 'PocketManga',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'api' => [
            'class' => 'backend\modules\api\API',
        ],
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => true,
            'rules' => [
                '/' => 'site/index',
                'home' => 'site/index',
                'index' => 'site/index',
                'logout' => 'site/logout',
                'login' => 'site/login',
                
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/manga',
                    'pluralize' => false,
                    'extraPatterns' => [
                        'GET allmanga/{filters}' => 'allmanga',
                        'GET allmanga/total/{filters}' => 'totalmanga',
                        'GET library/{filters}' => 'library',
                        'GET readed/{filters}' => 'readed',
                        'GET changelist/{filters}' => 'changelist',
                    ],
                    'tokens' => [
                        '{filters}' => '<filters:\\w+>',
                    ],
                ],
            ],
        ],
    ],
    'params' => $params,
];
