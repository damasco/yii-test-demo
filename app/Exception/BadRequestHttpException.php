<?php

namespace App\Exception;

class BadRequestHttpException extends \CHttpException
{
    public $statusCode = 500;

    public function __construct($message = 'Bad request', $code = 0)
    {
        parent::__construct($this->statusCode, $this->message, $code);
    }
}
