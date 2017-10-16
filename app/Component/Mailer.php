<?php

namespace App\Component;

use Swift_SmtpTransport;
use Swift_Mailer;
use Swift_Message;
use Yii;

class Mailer extends \CComponent
{
    /**
     * @var string
     */
    public $smtp;
    /**
     * @var int
     */
    public $port;
    /**
     * @var string
     */
    public $username;
    /**
     * @var string
     */
    public $password;
    /**
     * @var string
     */
    public $encryption;

    public function init()
    {
    }

    /**
     * @param string $subject
     * @param string $message
     * @param string $toEmail
     * @return void
     */
    public function send($subject, $message, $toEmail)
    {
        $transport = $this->createTransport();
        $mailer = new Swift_Mailer($transport);
        $message = (new Swift_Message($subject))
            ->setFrom(Yii::app()->params['adminEmail'])
            ->setTo($toEmail)
            ->setBody($message, 'text/html');

        $mailer->send($message);
    }

    /**
     * @return Swift_SmtpTransport
     */
    private function createTransport()
    {
        return (new Swift_SmtpTransport($this->smtp, $this->port, $this->encryption))
            ->setUsername($this->username)
            ->setPassword($this->password);
    }
}