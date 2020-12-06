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

                'manga_list' => 'manga/list',
                'manga/create' => 'manga/create',
                'manga/<idManga:\d+>' => 'manga/view',
                'manga/<idManga:\d+>/update' => 'manga/update',
                'manga/<idManga:\d+>/delete' => 'manga/delete',
                
                'manga/<idManga:\d+>/chapter/create' => 'chapter/create',
                'manga/<idManga:\d+>/chapter/<idChapter:\d+>' => 'chapter/view',
                'manga/<idManga:\d+>/chapter/<idChapter:\d+>/update' => 'chapter/update',
                'manga/<idManga:\d+>/chapter/<idChapter:\d+>/delete' => 'chapter/delete',
                
                'author_list' => 'author/list',
                'author/create' => 'author/create',
                'author/<idAuthor:\d+>' => 'author/view',
                'author/<idAuthor:\d+>/update' => 'author/update',
                'author/<idAuthor:\d+>/delete' => 'author/delete',

                'category_list' => 'category/list',
                'category/create' => 'category/create',
                'category/<idCategory:\d+>' => 'category/view',
                'category/<idCategory:\d+>/update' => 'category/update',
                'category/<idCategory:\d+>/delete' => 'category/delete',

                'server_list' => 'server/list',
                'server/create' => 'server/create',
                'server/<idServer:\d+>' => 'server/view',
                'server/<idServer:\d+>/update' => 'server/update',
                'server/<idServer:\d+>/delete' => 'server/delete',

                'manager_list' => 'user/manager',
                'manager/create' => 'user/create',
                'manager/<idManager:\d+>' => 'user/view',
                'manager/<idManager:\d+>/update' => 'user/update',
                'manager/<idManager:\d+>/delete' => 'user/delete',

                'reader_list' => 'user/leitor',
                'reader/<idLeitor:\d+>' => 'user/view',
                'reader/<idLeitor:\d+>/delete' => 'user/delete',

                'report_list' => 'report/list',
                'report/<idReport:\d+>' => 'report/view',
                'report/<idReport:\d+>/update' => 'report/update',
                'report/<idReport:\d+>/delete' => 'report/delete',
                
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
