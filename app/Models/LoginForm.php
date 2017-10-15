<?php

namespace App\Models;

use App\Components\FormModel;
use App\Components\UserIdentity;

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class LoginForm extends FormModel
{
    public $username;
    public $password;
    public $rememberMe;

    private $identity;

    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
    public function rules()
    {
        return [
            // username and password are required
            ['username, password', 'required'],
            // rememberMe needs to be a boolean
            ['rememberMe', 'boolean'],
            // password needs to be authenticated
            ['password', 'authenticate'],
        ];
    }

    /**
     * Declares attribute labels.
     */
    public function attributeLabels()
    {
        return [
            'rememberMe' => 'Remember me next time',
        ];
    }

    /**
     * Authenticates the password.
     * This is the 'authenticate' validator as declared in rules().
     * @param string $attribute the name of the attribute to be validated.
     * @param array $params additional parameters passed with rule when being executed.
     */
    public function authenticate($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $this->identity = new UserIdentity($this->username, $this->password);
            if (!$this->identity->authenticate()) {
                $this->addError('password', 'Incorrect username or password.');
            }
        }
    }

    /**
     * Logs in the user using the given username and password in the model.
     * @return boolean whether login is successful
     */
    public function login()
    {
        if ($this->identity === null) {
            $this->identity = new UserIdentity($this->username, $this->password);
            $this->identity->authenticate();
        }
        if ($this->identity->errorCode === UserIdentity::ERROR_NONE) {
            $duration = $this->rememberMe ? 3600 * 24 * 30 : 0; // 30 days
            \Yii::app()->user->login($this->identity, $duration);
            return true;
        }
        return false;
    }
}
