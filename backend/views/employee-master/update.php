<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\EmployeeMaster */

$this->title = 'Update Employee Master: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Employee Masters', 'url' => ['index']]; 
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="employee-master-update">

  
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
