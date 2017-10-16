<?php
/* @var $this application\components\Controller */
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="<?= \Yii::app()->language ?>">

    <?php \Yii::app()->clientScript->registerCssFile(
        \Yii::app()->assetManager->publish(\Yii::getPathOfAlias('bower.bootstrap.dist.css') . '/bootstrap.min.css')
    ) ?>
    
    <?php Yii::app()->clientScript->registerCoreScript('jquery') ?>
    
    <?php \Yii::app()->clientScript->registerScriptFile(
        \Yii::app()->assetManager->publish(\Yii::getPathOfAlias('bower.bootstrap.dist.js') . '/bootstrap.min.js')
    ) ?>

    <link rel="stylesheet" type="text/css" href="<?= \Yii::app()->request->baseUrl; ?>/css/main.css">
    <link rel="stylesheet" type="text/css" href="<?= \Yii::app()->request->baseUrl; ?>/css/form.css">

    <title><?= \CHtml::encode($this->pageTitle); ?></title>
</head>
<body>

<div class="wrapper">
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <?= \CHtml::link('Demo', ['/site/index'], ['class' => 'navbar-brand']) ?>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <?php $this->widget('zii.widgets.CMenu', [
                    'htmlOptions' => [
                        'class' => 'nav navbar-nav',
                    ],
                    'items' => [
                        [
                            'label' => 'Profile',
                            'url' => ['/site/index'],
                            'visible' => !\Yii::app()->user->isGuest,
                        ],
                    ],
                ]); ?>
                <?php $this->widget('zii.widgets.CMenu', [
                    'htmlOptions' => [
                        'class' => 'nav navbar-nav navbar-right',
                    ],
                    'items' => [
                        [
                            'label' => 'Login',
                            'url' => ['/auth/login'],
                            'visible' => \Yii::app()->user->isGuest,
                        ],
                        [
                            'label' => 'Logout (' . \Yii::app()->user->name . ')',
                            'url' => ['/auth/logout'],
                            'visible' => !\Yii::app()->user->isGuest,
                            'itemOptions' => [
                                'onclick' => "event.preventDefault(); document.getElementById('logout-form').submit();"
                            ]
                        ],
                    ],
                ]); ?>
                <?php if (!\Yii::app()->user->isGuest): ?>
                    <?= \CHtml::form('/auth/logout', 'post', [
                        'id' => 'logout-form',
                        'style' => 'display: none',
                    ]) ?>
                    <?= \CHtml::endForm() ?>
                <?php endif ?>
            </div>
        </div>
    </nav>

    <div class="container">
        <?php if (isset($this->breadcrumbs)): ?>
            <?php $this->widget('zii.widgets.CBreadcrumbs', [
                'homeLink' => \CHtml::link('Profile', ['site/index']),
                'links' => $this->breadcrumbs,
                'tagName' => 'ol',
                'activeLinkTemplate' => '<li><a href="{url}">{label}</a></li>',
                'inactiveLinkTemplate' => '<li class="active">{label}</li>',
                'separator' => '',
                'htmlOptions' => [
                    'class' => 'breadcrumb',    
                ],
            ]); ?>
        <?php endif ?>


        <?php if (Yii::app()->user->hasFlash('main')): ?>
        <div class="alert alert-info">
            <?= Yii::app()->user->getFlash('main'); ?>
        </div>
        <?php endif ?>

        <?= $content; ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= date('Y') ?></p>
        <p class="pull-right"><?= \Yii::powered() ?></p>
    </div>
</footer>

</body>
</html>
