<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\CustomerDetails */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Customer Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-details-view">

 

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [ 
            'CustomerName',
            'ContactNo',
            'EmailId:email',
            'Address:ntext',
            'Floor',
            'Employee',
            'Question1:ntext', 
            'Question2:ntext',
            'Question3:ntext',
            'Question4:ntext',
            'Question5:ntext',
            'QuestionRating1',
            'QuestionRating2',
            'QuestionRating3',
            'QuestionRating4',
            'QuestionRating5',
            'average_rating', 
        ],
    ]) ?>

</div>
