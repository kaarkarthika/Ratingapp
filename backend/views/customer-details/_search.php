<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CustomerDetailsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-details-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'CustomerName') ?>

    <?= $form->field($model, 'ContactNo') ?>

    <?= $form->field($model, 'EmailId') ?>

    <?= $form->field($model, 'Address') ?>

    <?php // echo $form->field($model, 'Floor') ?>

    <?php // echo $form->field($model, 'Employee') ?>

    <?php // echo $form->field($model, 'Question1') ?>

    <?php // echo $form->field($model, 'Question2') ?>

    <?php // echo $form->field($model, 'Question3') ?>

    <?php // echo $form->field($model, 'Question4') ?>

    <?php // echo $form->field($model, 'Question5') ?>

    <?php // echo $form->field($model, 'QuestionRating1') ?>

    <?php // echo $form->field($model, 'QuestionRating2') ?>

    <?php // echo $form->field($model, 'QuestionRating3') ?>

    <?php // echo $form->field($model, 'QuestionRating4') ?>

    <?php // echo $form->field($model, 'QuestionRating5') ?>

    <?php // echo $form->field($model, 'average_rating') ?>

    <?php // echo $form->field($model, 'CreatedAt') ?>

    <?php // echo $form->field($model, 'UpdatedAt') ?>

    <?php // echo $form->field($model, 'UpdatedIpaddress') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
