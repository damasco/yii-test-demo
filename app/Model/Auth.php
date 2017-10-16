<?php

namespace App\Model;

interface Auth
{
    /**
     * @return string
     */
    public function getEmail();

    /**
     * @return string
     */
    public function getAuthKey();
}
