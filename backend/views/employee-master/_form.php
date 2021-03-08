<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use backend\models\FloorMaster;
use backend\models\DesignationMaster;

/* @var $this yii\web\View */
/* @var $model backend\models\EmployeeMaster */
/* @var $form yii\widgets\ActiveForm */
?>
<style type="text/css">
     .score {
   background-color: #0c9cce;
   color: #fff;
   font-weight: 600;
   border-radius: 50%;
   width: 40px;
   height: 40px;
   line-height: 40px;
   text-align: center;
   margin: auto;
   /* padding: 21% 14%;*/
   }
   .checkbox input[type="checkbox"] {
   cursor: pointer;
   opacity: 0;
   z-index: 1;
   outline: none !important;
   }
   .upper {
   text-transform: uppercase;
   }
   .checkbox-custom input[type="checkbox"]:checked + label::before {
   background-color: #5fbeaa;
   border-color: #5fbeaa;
   }
   .checkbox label::before {
   -o-transition: 0.3s ease-in-out;
   -webkit-transition: 0.3s ease-in-out;
   background-color: #ffffff;
   /* border-radius: 3px; */
   border: 1px solid #cccccc;
   content: "";
   display: inline-block;
   height: 17px;
   left: 0!important;
   margin-left: -20px!important;
   position: absolute;
   transition: 0.3s ease-in-out;
   width: 17px;
   outline: none !important;
   }
   .checkbox input[type="checkbox"]:checked + label::after {
   content: "\f00c";
   font-family: 'FontAwesome';
   color: #fff;
   position: relative;
   right: 59px;
   bottom: 1px;
   }
   .checkbox label {
   display: inline-block;
   padding-left: 5px;
   position: relative;
   }
</style>
<div class="auth-project-module-form">
<div id="page-content">
   <div class="">
      <div class="eq-height">
         <div class="panel">
            <div class="panel-body">
    <?php $form = ActiveForm::begin(); ?>
<div class="row">
    <div class='col-sm-6 form-group' >
    <?= $form->field($model, 'EmployeeName')->textInput(['maxlength' => true]) ?>
    </div>
<div class='col-sm-6 form-group' >
    <?= $form->field($model, 'EmployeeId',['enableAjaxValidation' => true])->textInput(['maxlength' => true]) ?>
</div>
</div>
<!-- <div class="row">
    <div class='col-sm-6 form-group' >
        <?php //echo $form->field($model, 'ContactNo',['enableAjaxValidation' => true])->textInput(['maxlength' => 10]) ?>
       
    </div>
    <div class='col-sm-6 form-group' >
        <?php //echo  $form->field($model, 'EmailId')->textInput(['maxlength' => true]) ?>
    </div>
</div> -->
<div class="row">
    <div class='col-sm-6 form-group' >
       <?php
        $des = ArrayHelper::map(DesignationMaster::find()->where(['Status'=>"Active"])->asArray()->all(),'id','DesignationName');
         ?>
         <?= $form->field($model, 'Designation')->dropDownList($des,['prompt'=>'Select Designation Name']) ?> 
    </div>
    <div class='col-sm-6 form-group' >
        <?php
        $floor = ArrayHelper::map(FloorMaster::find()->where(['Status'=>"Active"])->asArray()->all(),'id','FloorName');
         ?>
         <?= $form->field($model, 'EmployeeType')->dropDownList($floor,['prompt'=>'Select Floor Name']) ?>
    </div>
</div>
 <div class="row">
    <div class='col-sm-6 form-group' >
        <?php echo $form->field($model, 'Password')->passwordInput(['maxlength' => 40,'value' =>""]) ?>
       
    </div>
    <div class='col-sm-6 form-group' >
        <?php echo  $form->field($model, 'Password_hash'/*['enableAjaxValidation' => true]*/)->passwordInput(['maxlength' => 40,'value' =>""]) ?>
        <span id="errorspan" style="color: red;"></span>
    </div>
</div> 
<div class="row">
    <div class='col-sm-6 form-group' > 
        <?= $form->field($model, 'Status')->dropDownList(['Active' => 'Active','Inactive'=>'Inactive']) ?>
    </div>
    <div class='col-sm-6 form-group' >
       <div class="form-group pull-right"style="margin-top:25px;" >
        <?php echo Html::a('<span class="fa fa-remove"></span> Cancel', '?r=employee-master/index', ['class'=> "btn btn-sm btn-danger"]); ?>
        <?= Html::submitButton('<span class="fa fa-save"></span> Save', ['class' => 'btn btn-sm btn-success']) ?>
    </div>
    </div>
</div> 
    <?php ActiveForm::end(); ?>

</div>

<script type="text/javascript">
  $('body').on("change","#employeemaster-password_hash",function(){
             var url = $(this).val();  
             if (url!="") {
              var pass = $("#employeemaster-password").val();
              if (url===pass) { 
                $("#errorspan").html("");
              }else{  
                $("#errorspan").html("Password not matched with Comfirm Password");
                $(this).val(""); return false;
              }
             }
           });
</script>