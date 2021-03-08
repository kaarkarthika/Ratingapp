<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\FloorMaster */

$this->title = 'Create Floor Master';
$this->params['breadcrumbs'][] = ['label' => 'Floor Masters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="floor-master-create">
   
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
