<?php
/* @var $this \application\controllers\SiteController */
/* @var $model \application\models\LoginForm */
/* @var $form \CActiveForm */

$this->pageTitle = \Yii::app()->name . ' - Login';
$this->breadcrumbs = [
    'Login',
];
?>

<?php if (Yii::app()->user->hasFlash('login')): ?>

<div class="alert alert-success">
    <?= Yii::app()->user->getFlash('login'); ?>
</div>

<?php else: ?>

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
                        <?= $form->labelEx($model, 'email'); ?>
                        <?= $form->textField($model, 'email', ['class' => 'form-control']); ?>
                        <?= $form->error($model, 'email'); ?>
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

<?php endif ?>
