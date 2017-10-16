<?php

namespace App\Component;

class Request extends \CHttpRequest
{
    /**
     * @var array
     */
    public $noCsrfValidationRoutes = [];

    protected function normalizeRequest()
    {
        parent::normalizeRequest();
        if ($this->enableCsrfValidation && $this->checkPaths() !== false) {
            \Yii::app()->detachEventHandler('onBeginRequest', [$this,'validateCsrfToken']);
        }
    }

    private function checkPaths()
    {
        foreach ($this->noCsrfValidationRoutes as $checkPath) {
            if (false !== strpos($checkPath, '*')) {
                $pos = strpos($checkPath, '*');
                $checkPath = substr($checkPath, 0, $pos);
                if (false !== strpos($this->pathInfo, $checkPath)) {
                    return true;
                }
            } else {
                if ($this->getPathInfo() === $checkPath) {
                    return true;
                }
            }
        }
        return false;
    }
}
