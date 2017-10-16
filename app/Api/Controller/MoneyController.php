<?php

namespace App\Api\Controller;

use App\Api\Component\Controller;
use App\Exception\BadRequestHttpException;
use App\Model\User;
use App\Model\WithdrawMoney;
use App\Exception\ServerErrorHttpException;

class MoneyController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function filters()
    {
        return [
            'postOnly + withdrawal',
        ];
    }

    /**
     * @param int $amount
     * @param string $token
     * @throws BadRequestHttpException
     */
    public function actionWithdrawal($amount, $token)
    {
        try {
            $user = User::model()->findByAttributes(['token_api' => $token]);

            if (null === $user) {
                throw new BadRequestHttpException('Incorrect token');
            }

            if ($amount > $user->balance) {
                throw new BadRequestHttpException('Not enough money');
            }

            $model = new WithdrawMoney();
            $model->user_id = $user->id;
            $model->amount = $amount;

            if (!$model->save()) {
                throw new ServerErrorHttpException('Unknown server error');
            }

            $this->renderJson(200, [
                'message' => 'Request to withdraw money accepted',
            ]);
        } catch (\CHttpException $exception) {
            $this->renderJson($exception->statusCode, [
                'message' => $exception->getMessage(),
            ]);
        }
    }
}
