<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\EmployeeMaster */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Employee Masters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-master-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [ 
            'EmployeeName',
            'EmployeeId',
            'EmployeeType',
            'TypeName',
            'ContactNo',
            'EmailId:email',
            'Designation',
            'Address:ntext',
            'Status', 
        ],
    ]) ?>

</div>
