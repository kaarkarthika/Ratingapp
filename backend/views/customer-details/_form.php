<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CustomerDetails */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-details-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'CustomerName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ContactNo')->textInput() ?>

    <?= $form->field($model, 'EmailId')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Address')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Floor')->textInput() ?>

    <?= $form->field($model, 'Employee')->textInput() ?>

    <?= $form->field($model, 'Question1')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Question2')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Question3')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Question4')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Question5')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'QuestionRating1')->textInput() ?>

    <?= $form->field($model, 'QuestionRating2')->textInput() ?>

    <?= $form->field($model, 'QuestionRating3')->textInput() ?>

    <?= $form->field($model, 'QuestionRating4')->textInput() ?>

    <?= $form->field($model, 'QuestionRating5')->textInput() ?>

    <?= $form->field($model, 'average_rating')->textInput() ?>

    <?= $form->field($model, 'CreatedAt')->textInput() ?>

    <?= $form->field($model, 'UpdatedAt')->textInput() ?>

    <?= $form->field($model, 'UpdatedIpaddress')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
