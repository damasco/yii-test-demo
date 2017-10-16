<?php

namespace App\Controller;

use App\Component\Controller;
use App\Form\ProfileForm;
use App\Model\User;
use Yii;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function filters()
    {
        return [
            'accessControl',
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
                'actions' => ['index', 'update'],
                'users' => ['?'],
            ],
            [
                'allow',
                'actions' => ['error'],
                'users' => ['?'],
            ],
        ];
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex()
    {
        $model = User::model()->findByPk(Yii::app()->user->id);
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $this->render('index', [
            'model' => $model,
        ]);
    }

    public function actionUpdate()
    {
        $user = User::model()->findByPk(Yii::app()->user->id);
        $model = new ProfileForm();
        $model->username = $user->username;

        $request = $this->getRequest();

        if ($request->getPost('ajax') === 'profile-form') {
            echo \CActiveForm::validate($model);
            Yii::app()->end();
        }

        if ($data = $request->getPost(\CHtml::modelName($model))) {
            $model->attributes = $data;
            if ($model->validate()) {
                $user->username = $model->username;
                $user->save();
                $this->redirect(['index']);
            }
        }

        $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError()
    {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest) {
                echo $error['message'];
            } else {
                $this->render('error', $error);
            }
        }
    }
}
