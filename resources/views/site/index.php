<?php


/* @var $this \App\Controller\SiteController */
/* @var $model \App\Model\User */

$this->pageTitle = \Yii::app()->name;
?>

<h1>Profile</h1>

<?php $this->widget('zii.widgets.CDetailView', [
    'data' => $model,
    'htmlOptions' => ['class' => 'table table-bordered'],
    'attributes' => [
        'email',
        'token_api',
        'balance',
        [
            'label' => 'Username',
            'type' => 'raw',
            'value' => ($model->username ?: '') . ' ' . \CHtml::link('Update', ['site/update'], ['class' => 'btn btn-sm btn-default']),
        ]
    ],
]);
