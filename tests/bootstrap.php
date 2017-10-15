<?php

// change the following paths if necessary
$config = __DIR__ . '/../config/test.php';

require_once __DIR__ . '/../vendor/yiisoft/yii/framework/yiit.php';
require_once __DIR__ . '/WebTestCase.php';

\Yii::createWebApplication($config);
