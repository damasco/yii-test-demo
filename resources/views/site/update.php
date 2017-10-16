<?php

/* @var $this \App\Controller\SiteController */
/* @var $model \App\Form\ProfileForm */
/* @var $form \CActiveForm */

$this->pageTitle = 'Update profile';
$this->breadcrumbs = [
    $this->pageTitle,
];
?>

<div class="form">
    <?php $form = $this->beginWidget(\CActiveForm::class, [
        'id' => 'profile-form',
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

    <div class="buttons">
        <?= \CHtml::submitButton('Save', ['class' => 'btn btn-primary']); ?>
    </div>

    <?php $this->endWidget(); ?>
</div>
