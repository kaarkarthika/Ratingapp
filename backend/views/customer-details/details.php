<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\CustomerDetailsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Customer Details';
$this->params['breadcrumbs'][] = $this->title;
?> 
<style type="text/css">
   .btn-success{
    background-color:<?php //echo $color_code;?>;
   color: #fff;
   border-color: <?php //echo $color_code;?>;
  }
  .btn-success:hover, .btn-success:active, .btn-success.hover {
    background-color:<?php // echo $color_code;?>;
}
.btn-success:hover {
   
    border-color:<?php //echo $color_code;?>;
}
</style>
<div class="auth-project-module-index">

    <div class="box box-primary  ">
      <div class=" ">
   
        <div class=" box-header with-border box-header-bg">
        <?php $model = ArrayHelper::toArray($model); ?>
        <div class="row">
            <div class="col-md-6"><label>Customer Name: <?php echo $model['CustomerName']; ?></label></div>
            <div class="col-md-6"><label>Customer Email: <?php echo $model['EmailId']; ?></label></div>
        </div>
        <div class="row">
             <div class="col-md-6"><label>Customer Contact: <?php echo $model['CustomerName']; ?></label></div>
            <div class="col-md-6"><label>Overall Rating: <?php echo $model['average_rating']; ?></label></div>
        </div>
 
    </div>
    </div>
 </div></div>
<script type="text/javascript">
     $('body').on("click",".modalView",function(){
             var url = $(this).attr('value');
             $('#operationalheader').html('<span> <i class="fa fa-fw fa-th-large"></i>Employee Details</span>');
             $('#operationalmodal').modal('show').find('#modalContenttwo').load(url);
             return false;
         });
    
</script>

