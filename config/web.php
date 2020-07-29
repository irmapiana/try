<?php

use yii\filters\AccessControl;
use yii\yii\behaviors\LoginOnceBehavior;

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'name' => 'Mbb',
     'modules'=> [
        'gridview' => [
                'class' => '\kartik\grid\Module'
            ]
        ],

    // 'language' => 'id',
    'basePath' => dirname(__DIR__),
    'components' => [
        'session' =>[
                    'class' => 'yii\web\DbSession',
                    // 'db' => 'mydb',
                    // 'sessionTable' => 'my_session',
                ],

        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'wvyzeP9oCl81Xy10rLuN2ihnIM_CDzgz',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => false,
            'enableSession' => true,
            'authTimeout' => 300,
            'as loginOnce' => [
                'class' => 'yii\behaviors\LoginOnceBehavior',]
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
        'db' => require(__DIR__ . '/db.php'),
        'authManager' => [
            'class' => 'yii\rbac\DbManager', // only support DbManager
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
               ],
        ],
        // 'formatter' => [
        //     'decimalSeparator' => ',',
        //     'thousandSeparator' => ' ',
        //     'currencyCode' => 'IDR',
        // ],
        'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'thousandSeparator' => ',',
            'decimalSeparator' => '.',
        ]

    ],
    'as access' => [
        'class' => 'app\components\AccessControl',
        // We will override the default rule config with the new AccessRule class
        'allowActions' => [
            // add wildcard allowed action here!
            //'site/index',
           // 'role/*'

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
