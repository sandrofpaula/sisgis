<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'sisadmin',
    'name' => 'sisadmin',
    'language' => 'pt-BR',
    'sourceLanguage' => 'pt-BR',
    'timeZone' => 'America/Manaus',
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\Admin',
            'layout' => '@app/views/layouts/mainAdmin',//defini menu  do modulo
        ],
        'gis' => [
            'class' => 'app\modules\gis\Gis',
            'layout' => '@app/views/layouts/mainGis',//defini menu  do modulo
        ],
    ],
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'zZpUScb7wnb_hWA6s1W4OAeWkzNmr_R6',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
        'db' => $db,
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                [
                  'class' => 'yii\rest\UrlRule',
                  'controller' => 'rest/user',
                  'except' => ['delete', 'create', 'update', 'index'],
                  'extraPatterns' => [
                      'GET all' => 'all',
                  ]
               ],
               [
                  'class' => 'yii\rest\UrlRule',
                  'controller' => 'rest/auth',
                  'extraPatterns' => [
                      'POST reg' => 'reg',
                      'POST auth' => 'auth',
        
                  ],
                  'pluralize' => false,
                ],
                [
                  'class' => 'yii\rest\UrlRule',
                  'controller' => 'rest/city',
                  'extraPatterns' => [
                    'DELETE {id}' => 'delete',
                  ],
        
                ], 
            ],
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
