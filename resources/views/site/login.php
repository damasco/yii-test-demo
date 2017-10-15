<?php
/* @var $this \application\controllers\SiteController */
/* @var $model \application\models\LoginForm */
/* @var $form \CActiveForm */

$this->pageTitle = \Yii::app()->name . ' - Login';
$this->breadcrumbs = [
    'Login',
];
?>

<div class="row">
    <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="panel-title">Login</h2>
            </div>
            <div class="panel-body">
                <div class="form">
                    <?php $form = $this->beginWidget(\CActiveForm::class, [
                        'id' => 'login-form',
                        'enableClientValidation' => true,
                        'clientOptions' => [
                            'validateOnSubmit' => true,
                        ],
                    ]); ?>

                    <div class="form-group">
                        <?= $form->labelEx($model, 'username'); ?>
                        <?= $form->textField($model, 'username', ['class' => 'form-control']); ?>
                        <?= $form->error($model, 'username'); ?>
                    </div>

                    <div class="form-group">
                        <?= $form->labelEx($model, 'password'); ?>
                        <?= $form->passwordField($model, 'password', ['class' => 'form-control']); ?>
                        <?= $form->error($model, 'password'); ?>
                    </div>

                    <div class="form-group rememberMe">
                        <?= $form->checkBox($model, 'rememberMe'); ?>
                        <?= $form->label($model, 'rememberMe'); ?>
                        <?= $form->error($model, 'rememberMe'); ?>
                    </div>

                    <div class="buttons">
                        <?= \CHtml::submitButton('Login', ['class' => 'btn btn-primary']); ?>
                    </div>

                    <?php $this->endWidget(); ?>
                </div>
            </div>
        </div>
    </div>
</div>