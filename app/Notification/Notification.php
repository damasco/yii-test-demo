<?php

namespace App\Notification;

/**
* Notification interface
*/
interface Notification
{
    /**
     * @return void
     */
    public function notify();
}
