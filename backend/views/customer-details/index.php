<?php

use yii\helpers\Html;
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


   <h3 class="box-title pull-left " ><?= Html::encode($this->title) ?></h3>
    <input type="text" placeholder="Search Customer Details" name="search" id="search">
    </div>
    </div>
 <?php Pjax::begin(); ?> 
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           ['attribute'=>'CreatedAt',
            'label'=>'Date Time',
                'value'=>function($model, $Keys)
                {
                    return date('d/M/Y h:i:s A', strtotime($model->CreatedAt));
                }
            ],
            'CustomerName',
            'ContactNo', 
            'floor_name',
            'average_rating',
            'employee_name',

            //'Question1:ntext',
            //'Question2:ntext',
            //'Question3:ntext',
            //'Question4:ntext',
            //'Question5:ntext',
            //'QuestionRating1',
            //'QuestionRating2',
            //'QuestionRating3',
            //'QuestionRating4',
            //'QuestionRating5',
            //'average_rating',
            //'CreatedAt',
            //'UpdatedAt',
            //'UpdatedIpaddress',

            ['class' => 'yii\grid\ActionColumn',
               'header'=> 'Action',
                 'headerOptions' => ['style' => 'width:150px;color:#337ab7;'],
               'template'=>'{details}',
                            'buttons'=>[
                              'view' => function ($url, $model, $key) {
                                   return Html::button('<i class="glyphicon glyphicon-eye-open"></i>', ['value' => $url, 'style'=>'margin-right:4px;','class' => 'btn btn-primary btn-xs view view gridbtncustom modalView', 'data-toggle'=>'tooltip', 'title' =>'View' ]);
                                }, 
                             'details' => function ($url, $model, $key) {
                                        $options = array_merge([
                                            'class' => 'btn btn-warning btn-xs update gridbtncustom',
                                            'data-toggle'=>'tooltip',
                                            'title' => Yii::t('yii', 'Update'),
                                            'aria-label' => Yii::t('yii', 'Update'),
                                            'data-pjax' => '0',
                                        ]);
                                        return Html::a('<span class="fa fa-edit"></span>', $url, $options);
                                    },
                                'delete' => function ($url, $model, $key) {
                                    return Html::button('<i class="fa fa-trash"></i>', ['value' => $url, 'style'=>'margin-right:4px;','class' => 'btn btn-danger btn-xs delete gridbtncustom modalDelete', 'data-toggle'=>'tooltip', 'title' =>'Delete' ]);
                                  },
                          ] ],
        ],
    ]); ?>
<?php Pjax::end(); ?></div></div>
<script type="text/javascript">
     $('body').on("click",".modalView",function(){
             var url = $(this).attr('value');
             $('#operationalheader').html('<span> <i class="fa fa-fw fa-th-large"></i>Employee Details</span>');
             $('#operationalmodal').modal('show').find('#modalContenttwo').load(url);
             return false;
         });
     $('body').on("keyup","#search",function(){
        var value= $(this).val();
            $("#w0 table.table-bordered tr").each(function(index){
                if (index!=0) {
                    $row = $(this);
                    var id = $row.find("td").text();

                   if (id.indexOf(value)!=0) { 
                    $(this).hide();
                   }else{
                    $(this).show();
                   }
                }
            });
     });
</script>

