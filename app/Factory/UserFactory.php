<?php

namespace App\Factory;

use App\Exception\ServerErrorHttpException;
use App\Model\Auth;
use App\Model\TempUser;
use App\Model\User;
use Ramsey\Uuid\Uuid;

class UserFactory
{
    /**
     * @param string $email
     * @return Auth
     * @throws ServerErrorHttpException
     */
    public static function createAuthUser($email)
    {
        $user = User::model()->findByAttributes(['email' => $email]);

        if ($user !== null) {
            return $user;
        }

        $tempUser = TempUser::model()->findByAttributes(['email' => $email]);

        if ($tempUser === null) {
            $tempUser = new TempUser();
            $tempUser->email = $email;
        }

        $tempUser->auth_key = Uuid::uuid4();

        if (!$tempUser->save()) {
            throw new ServerErrorHttpException;
        }

        return $tempUser;
    }
}
