<?php

namespace App\Exception;

class NotFoundHttpException extends \CHttpException
{
    public $statusCode = 404;

    public function __construct($message = 'Not found', $code = 0)
    {
        parent::__construct($this->statusCode, $this->message, $code);
    }
}
