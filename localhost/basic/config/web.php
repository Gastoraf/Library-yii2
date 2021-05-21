<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
  'id' => 'basic',
  'basePath' => dirname(__DIR__),
  'bootstrap' => ['log'],
  'defaultRoute' => 'library/main',
  'layout' => 'main',
  'aliases' => [
    '@bower' => '@vendor/bower-asset',
    '@npm'   => '@vendor/npm-asset',
  ],
  'modules' => [
    'admin' => [
      'class' => 'app\modules\admin\Module',
    ],
  ],
  'components' => [

    'request' => [
      // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
      'cookieValidationKey' => 'XeCuj-Y1cbx1h2Li249wPOkeJNZoJrOq',
      'baseUrl' => '', // Чтобы не отображалась папки в ссылках
    ],
    'authManager' => [
      'class' => 'yii\rbac\DbManager',
    ],
    'cache' => [
      'class' => 'yii\caching\FileCache',
    ],
    'user' => [
      'identityClass' => 'app\models\User',
      'enableAutoLogin' => true,
      'loginUrl' => 'index.php' //перенаправление на главную страницу
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


    'urlManager' => [
      'enablePrettyUrl' => true,
      'showScriptName' => false,
      //'enableStrictParsing' => true, // Следовать только правилам ниже
      'rules' => [
        '' => 'library/main',
        '/login' => 'library/login',
        '/registration' => 'library/registration',
        '<controller>/<action>/<page:\d+>' => '<controller>/<action>',
        '<controller>/<action>' => '<controller>/<action>',
        'admin' => 'admin/default/index',
        '<module>/<controller>/<action>/<page:\d+>' => '<module>/<controller>/<action>',
        '<module>/<controller>/<action>/<id:\d+>' => '<module>/<controller>/<action>',
        '<module>/<controller>/<action>' => '<module>/<controller>/<action>',
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
