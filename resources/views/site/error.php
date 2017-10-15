k .,<?php
/* @var $this \application\controllers\SiteController */
/* @var $error array */

$this->pageTitle = \Yii::app()->name . ' - Error';
$this->breadcrumbs = [
    'Error',
];
?>

<h2>Error <?= $code; ?></h2>

<div class="error">
    <?= \CHtml::encode($message); ?>
</div>