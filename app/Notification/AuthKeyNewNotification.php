<?php

namespace App\Notification;

use App\Model\Auth;
use Yii;

class AuthKeyNewNotification implements Notification
{
    /**
     * @var Auth
     */
    private $auth;

    /**
     * AuthKeyNewNotification constructor.
     * @param Auth $auth
     */
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    /**
     * {@inheritdoc}
     */
    public function notify()
    {
        $subject = 'Authorization';
        $url = Yii::app()->request->getBaseUrl(true) . Yii::app()->urlManager->createUrl('/auth/activate', [
            'authKey' => $this->getAuthKey(),
            'email' => $this->getEmail(),
        ]);
        $message = '<a href="' . $url . '">Click here</a> for authorization';

        Yii::app()->mailer->send($subject, $message, $this->getEmail());
    }

    /**
     * @return string
     */
    private function getEmail()
    {
        return $this->auth->getEmail();
    }

    /**
     * @return string
     */
    private function getAuthKey()
    {
        return $this->auth->getAuthKey();
    }
}
