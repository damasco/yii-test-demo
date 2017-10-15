<?php

\Yii::setPathOfAlias('vendor', __DIR__ . '/../vendor/');
\Yii::setPathOfAlias('bower', __DIR__ . '/../vendor/bower-asset');

return [
    'basePath' => __DIR__ . '/../app',
    'name' => 'Demo',
    'controllerNamespace' => '\App\Controllers',
    'language' => 'ru',
    'runtimePath' =>  __DIR__ . '/../runtime',
    'viewPath' => __DIR__ . '/../resources/views',
    'preload' => [
        'log',
        'debug',
    ],
    'import' => [],
    'modules' => [
        'gii' => [
            'class' => 'system.gii.GiiModule',
            'password' => '123456',
            'ipFilters' => ['127.0.0.1', '::1'],
        ],
    ],
    'components' => [
        'user' => [
            'allowAutoLogin' => true,
        ],
        'urlManager' => [
            'urlFormat' => 'path',
            'showScriptName' => false,
            'rules' => require __DIR__ . '/urls.php',
        ],
        'db' => require __DIR__ . '/db.php',
        'debug' => [
            'class' => 'vendor.zhuravljov.yii2-debug.Yii2Debug',
        ],
        'errorHandler' => [
            'errorAction' => YII_DEBUG ? null : 'site/error',
        ],
        'log' => [
            'class' => \CLogRouter::class,
            'routes' => [
                [
                    'class' => \CFileLogRoute::class,
                    'levels' => 'error, warning',
                ],
            ],
        ],
    ],
    'params' => [
        'adminEmail' => 'webmaster@example.com',
    ],
];
