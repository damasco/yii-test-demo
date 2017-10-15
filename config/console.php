<?php

\Yii::setPathOfAlias('migrations', __DIR__ . '/../database/migrations');

return [
    'basePath' => __DIR__ . '/../app',
    'name' => 'Demo console',
    'preload' => ['log'],
    'components' => [
        'db' => require __DIR__ . '/db.php.dist',
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
    'commandMap' => [
        'migrate'=>[
            'class'=>'system.cli.commands.MigrateCommand',
            'migrationPath'=>'migrations',
            'migrationTable'=>'migrations',
            'connectionID'=>'db',
        ]
    ],
];
