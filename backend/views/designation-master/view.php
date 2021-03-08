<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\DesignationMaster */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Designation Masters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="designation-master-view">
 

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [ 
            'DesignationName',
            'Status',
            'CreatedAt',
            'UpdatedAt', 
        ],
    ]) ?>

</div>
