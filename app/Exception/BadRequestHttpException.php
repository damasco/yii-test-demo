<?php

namespace App\Exception;

class BadRequestHttpException extends \CHttpException
{
    public $statusCode = 400;

    public function __construct($message = 'Bad request', $code = 0)
    {
        parent::__construct($this->statusCode, $message, $code);
    }
}
