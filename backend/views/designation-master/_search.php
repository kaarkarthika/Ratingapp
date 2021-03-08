<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DesignationMasterSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="designation-master-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'DesignationName') ?>

    <?= $form->field($model, 'Status') ?>

    <?= $form->field($model, 'CreatedAt') ?>

    <?= $form->field($model, 'UpdatedAt') ?>

    <?php // echo $form->field($model, 'UpdatedIpaddress') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
