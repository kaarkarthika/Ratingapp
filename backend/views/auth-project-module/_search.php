<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AuthProjectModuleSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="auth-project-module-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'p_autoid') ?>

    <?= $form->field($model, 'moduleName') ?>

    <?= $form->field($model, 'moduleCode') ?>

    <?= $form->field($model, 'moduleCode2') ?>

    <?= $form->field($model, 'moduleCode3') ?>

    <?php // echo $form->field($model, 'moduleMultiple') ?>

    <?php // echo $form->field($model, 'moduelRoot') ?>

    <?php // echo $form->field($model, 'user_url') ?>

    <?php // echo $form->field($model, 'userAction') ?>

    <?php // echo $form->field($model, 'FAIcon') ?>

    <?php // echo $form->field($model, 'sortOrder') ?>

    <?php // echo $form->field($model, 'user_rights') ?>

    <?php // echo $form->field($model, 'is_active') ?>

    <?php // echo $form->field($model, 'module_show_status') ?>

    <?php // echo $form->field($model, 'admin_lead_opn') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
