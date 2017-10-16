<?php

namespace App\Exception;

class ServerErrorHttpException extends \CHttpException
{
    public $statusCode = 500;

    public function __construct($message = 'Unknown server error', $code = 0)
    {
        parent::__construct($this->statusCode, $message, $code);
    }
}
