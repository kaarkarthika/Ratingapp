<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\FloorMaster */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Floor Masters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="floor-master-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [ 
            'FloorName',
            'Status',
            'CreatedAt',
            'UpdatedAt', 
        ],
    ]) ?>

</div>
