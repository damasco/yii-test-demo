<?php
/**
 * This is the bootstrap file for test application.
 * This file should be removed when the application is deployed for production.
 */

require __DIR__ . '/../vendor/autoload.php';

$config = __DIR__ . '/../config/test.php';

// remove the following line when in production mode
defined('YII_DEBUG') or define('YII_DEBUG', true);

require __DIR__ . '/../vendor/yiisoft/yii/framework/yii.php';

\Yii::createWebApplication($config)->run();
