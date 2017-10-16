<?php

namespace App\Controller;

use App\Component\Controller;
use App\Component\UserIdentity;
use App\Exception\BadRequestHttpException;
use App\Factory\UserFactory;
use App\Form\LoginForm;
use App\Notification\AuthKeyNewNotification;
use Yii;

/**
* AuthController
*/
class AuthController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function filters()
    {
        return [
            'accessControl',
            'postOnly + logout',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function accessRules()
    {
        return [
            [
                'deny',
                'actions' => ['logout'],
                'users' => ['?'],
            ],
            [
                'allow',
                'actions' => ['login', 'active'],
                'users' => ['?'],
            ],
        ];
    }

    public function actionLogin()
    {
        $model = new LoginForm();

        $request = $this->getRequest();

        if ($request->getPost('ajax') === 'login-form') {
            echo \CActiveForm::validate($model);
            Yii::app()->end();
        }

        if ($data = $request->getPost(\CHtml::modelName($model))) {
            $model->attributes = $data;
            if ($model->validate()) {
                $user = UserFactory::createAuthUser($model->email);
                (new AuthKeyNewNotification($user))->notify();

                Yii::app()->user->setFlash(
                    'login',
                    'An email with an authorization link has been sent to your email address'
                );
                $this->refresh();
            }
        }

        $this->render('login', ['model' => $model]);
    }

    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    public function actionActivate($authKey, $email)
    {
        $userIdentity = new UserIdentity($authKey, $email);

        if ($userIdentity->authenticate()) {
            Yii::app()->user->login($userIdentity);
            $this->redirect(Yii::app()->homeUrl);
        }

        throw new BadRequestHttpException('Incorrect authKey or email');
    }
}
