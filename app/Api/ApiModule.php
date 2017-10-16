<?php

namespace App\Api;

class ApiModule extends \CWebModule
{
    public $defaultController = 'money';

    public $controllerNamespace = '\App\Api\Controller';

    public function init()
    {
        $this->controllerPath = __DIR__ . '/Controller';
    }
}
