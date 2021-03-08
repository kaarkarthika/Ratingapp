<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\FloorMaster */

$this->title = 'Update Floor Master: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Floor Masters', 'url' => ['index']]; 
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="floor-master-update">
 

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
