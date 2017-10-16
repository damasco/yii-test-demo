<?php

namespace App\Api\Component;

use CJSON;

class Controller extends \CController
{
    public function renderJson($statusCode, $data)
    {
        header('HTTP/1.1 ' . $statusCode . ' ' . $this->getStatusCodeMessage($statusCode));
        header('Content-type: application/json');
        echo CJSON::encode($data);
        \Yii::app()->end();
    }

    private function getStatusCodeMessage($status)
    {
        $codes = [
            200 => 'OK',
            400 => 'Bad Request',
            401 => 'Unauthorized',
            402 => 'Payment Required',
            403 => 'Forbidden',
            404 => 'Not Found',
            500 => 'Internal Server Error',
            501 => 'Not Implemented',
        ];

        return $codes[$status] ?? '';
    }
}
