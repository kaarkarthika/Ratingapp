<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\EmployeeMasterSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="employee-master-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'EmployeeName') ?>

    <?= $form->field($model, 'EmployeeId') ?>

    <?= $form->field($model, 'EmployeeType') ?>

    <?= $form->field($model, 'TypeName') ?>

    <?php // echo $form->field($model, 'ContactNo') ?>

    <?php // echo $form->field($model, 'EmailId') ?>

    <?php // echo $form->field($model, 'Designation') ?>

    <?php // echo $form->field($model, 'Address') ?>

    <?php // echo $form->field($model, 'Status') ?>

    <?php // echo $form->field($model, 'CreatedAt') ?>

    <?php // echo $form->field($model, 'ModifiedAt') ?>

    <?php // echo $form->field($model, 'UpdatedIpaddress') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
