<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'name' => 'PocketManga',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
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
        'urlManagerBackend' => [
            'class' => 'yii\web\urlManager',
            'baseUrl' => 'http://localhost/PocketManga/backend/web',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'home' => 'site/index',
                'reset' => 'site/request-password-reset',
                'about' => 'site/about',
                'logout' => 'site/logout',
                'signup' => 'site/signup',
                'login' => 'site/login',

                'manga/<id:\d+>' => 'manga/view',
                'manga/<idManga:\d+>/chapter/<idChapter:\d+>' => 'chapter/view',
                'home_order-by=<Option>_manga-per-page=<NumberPerPage>_page=<PageNumber>' => 'site/index2',
                'all-manga' => 'site/allmanga',
                'ongoing_order-by=<Option>_manga-per-page=<NumberPerPage>_page=<PageNumber>' => 'site/ongoing',
                'completed_order-by=<Option>_manga-per-page=<NumberPerPage>_page=<PageNumber>' => 'site/completed',
                'library' => 'library/index',
                'library/<List>' => 'library/index2',
                'search=<Search>_manga-per-page=<NumberPerPage>_page=<PageNumber>' => 'site/search',
                'search-for=<Genre:\d+>_manga-per-page=<NumberPerPage>_page=<PageNumber>' => 'site/search2',
                'my_account' => 'leitor/myaccount',

                
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ],
        ],
    ],
    'params' => $params,
];
