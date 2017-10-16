<?php

namespace App\Component;

use App\Exception\NotFoundHttpException;
use App\Exception\ServerErrorHttpException;
use App\Model\TempUser;
use App\Model\User;
use Ramsey\Uuid\Uuid;

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity implements \IUserIdentity
{
    /**
     * @var User
     */
    private $user;
    /**
     * @var array
     */
    private $states;
    /**
     * @var bool
     */
    private $isAuthenticated = false;
    /**
     * @var string
     */
    private $authKey;
    /**
     * @var string
     */
    private $email;

    /**
     * UserIdentity constructor.
     * @param string $authKey
     * @param string $email
     */
    public function __construct($authKey, $email)
    {
        $this->authKey = $authKey;
        $this->email = $email;
    }

    /**
     * {@inheritdoc}
     * @throws NotFoundHttpException
     * @throws \CDbException
     * @throws ServerErrorHttpException
     */
    public function authenticate()
    {
        $user = User::model()->findByAttributes([
            'auth_key' => $this->authKey,
            'email' => $this->email
        ]);
        if ($user !== null) {
            $user->auth_key = Uuid::uuid4();
            if (!$user->save(false)) {
                throw new ServerErrorHttpException;
            }
        } else {
            $tempUser = TempUser::model()->findByAttributes([
                'auth_key' => $this->authKey,
                'email' => $this->email
            ]);
            if ($tempUser === null) {
                throw new NotFoundHttpException;
            }

            $user = new User();
            $user->email = $tempUser->email;
            $user->auth_key = Uuid::uuid4();
            if ($user->save()) {
                // new user
                $tempUser->delete();
            } else {
                throw new ServerErrorHttpException;
            }
        }

        $this->user = $user;
        $this->isAuthenticated = true;

        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function getIsAuthenticated()
    {
        return $this->isAuthenticated;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->user->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->user->email;
    }

    /**
     * @param array $states
     */
    public function setPersistentStates($states)
    {
        $this->states = $states;
    }

    /**
     * {@inheritdoc}
     */
    public function getPersistentStates()
    {
        return $this->states;
    }
}
