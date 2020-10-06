<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'kodcms',
    'basePath' => dirname(__DIR__),
    'aliases' => [
        '@vendor'=>dirname(__DIR__)."/../cms/vendor",
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'sdfsdfsd@tgedrt',
        ],

        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],

        'db' => $db,
        'view' => [
            'theme' => [
                'basePath' => '@app/themes/sansagya',
                'baseUrl' => '@app/themes/sansagya',
                'pathMap' => [
                    '@app/views' => [
                        '@app/themes/sansagya',
                        '@kodCms/views'

                    ],
//                    '@kodcommerce/frontend/views' => [
//                        '@app/views/commerce',
//                        '@kodcommerce/frontend/views'
//                    ]
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
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
