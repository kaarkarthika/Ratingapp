<?php
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use backend\models\CustomerMaster;
use backend\models\CustomerDetails;

use backend\models\StatusModule;
/* @var $this yii\web\View */

$this->title = 'Boms Rating - Dashboard';

//Set Default Timezone
date_default_timezone_set('Asia/Kolkata');
?>
<section class="content-header">
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>


<head>


</head>
  <body>

	<div class="box box-primary  ">
	    <div class=" "> 
	        <div class=" box-header with-border box-header-bg"> 
	   			<div id="chartdiv" style="width: 90%; height: 400px;"></div>
			</div>
		</div>
	</div>
	 
<link rel="stylesheet" href="chart/starrr.css"> 
<script src="chart/am-core.js"></script>
<script src="chart/am-charts.js"></script>
<script src="chart/am-animated.js"></script>
<?php
 $model = CustomerDetails::find()->asArray()->all();
 $erating =$hrating=$arating=$urating=$brating=0;
 $i=1;  $ia=1;  $is=1;  $id=1;  $if=1;
 foreach ($model as $key => $value) {
    if ($value['average_rating']>4 && $value['average_rating']<=5) {  
       $erating = $ia; $ia++;
    } else if ($value['average_rating']>3 && $value['average_rating']<=4) {
       $hrating = $is;  $is++;
    } else if ($value['average_rating']>2 && $value['average_rating']<=3) { 
       $arating = $id; $id++;
    } else if ($value['average_rating']>1 && $value['average_rating']<=2) {
       $urating = $if; $if++;
    } else if ($value['average_rating']>=1) {
       $brating = $i; $i++;
    }
     
 }
//echo $arating; die;
  ?>
  <script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
var chart = am4core.create("chartdiv", am4charts.XYChart);

// Add data
chart.data = [{
  "feedback": "Excellent",
  "rating": "<?php echo $erating; ?>"
}, {
  "feedback": "Happy",
  "rating": "<?php echo $hrating; ?>"
}, {
  "feedback": "Average",
  "rating": "<?php echo $arating; ?>"
}, {
  "feedback": "Unhappy",
  "rating": "<?php echo $urating; ?>"
}, {
  "feedback": "Bad",
  "rating": "<?php echo $brating; ?>"
}];

// Create axes

// Create axes
let categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "feedback";
categoryAxis.renderer.labels.template.rotation = 270;
categoryAxis.renderer.labels.template.hideOversized = false;
categoryAxis.renderer.minGridDistance = 20;
categoryAxis.renderer.labels.template.horizontalCenter = "right";
categoryAxis.renderer.labels.template.verticalCenter = "middle";
categoryAxis.tooltip.label.rotation = 270;
//categoryAxis.tooltip.label.horizontalCenter = "right";
//categoryAxis.tooltip.label.verticalCenter = "middle";

let valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
valueAxis.title.text = "Feedback";
//valueAxis.title.fontWeight = "bold"; 
// Create series
var series = chart.series.push(new am4charts.ColumnSeries());
series.dataFields.valueY = "rating";
series.dataFields.categoryX = "feedback";
categoryAxis.renderer.labels.template.rotation = 270;
categoryAxis.renderer.labels.template.hideOversized = false;
series.name = "rating";
series.columns.template.tooltipText = "{categoryX}: [bold]{valueY}[/]";
series.columns.template.fillOpacity = .8;

}); // end am4core.ready()
</script>
	 <div class="box box-primary">
      <div class=" "> 
          <div class=" box-header with-border box-header-bg"> 
  <table class="table">
    <tbody>
      <?php if($model){
        foreach ($model as $key => $value) {
           $firstquestion += $value['QuestionRating1'];
           $secondquestion += $value['QuestionRating2'];
           $thirdquestion += $value['QuestionRating3'];
           $fourthquestion += $value['QuestionRating4'];
           $fifthquestion += $value['QuestionRating5'];
        }
      } ?>
      <tr><th>Question 1</th><td><div class='starrr star firstquestion'>?php  ?></div></td></tr>
      <tr><th>Question 2</th><td><div class='starrr star secondquestion'></div></td></tr>
      <tr><th>Question 3</th><td><div class='starrr star thirdquestion'></div></td></tr>
      <tr><th>Question 4</th><td><div class='starrr star fourthquestion'></div></td></tr>
      <tr><th>Question 5</th><td><div class='starrr star fifthquestion'></div></td></tr>
    
    </tbody>
  </table>
    
    <h3>Starrr</h3>  
    <div class='starrr star'  ></div>
    <div>&nbsp;
      <span class='your-choice-was' style='display: none;'>
        Your rating was <span class='choice'></span>.
      </span>
    </div> 
  </div> 
  </div>
</div>
   <script src="chart/starrr.js"></script>
  <script>
    $('.star').starrr({
      change: function(e, value){
        if (value) {
          $('.your-choice-was').show();
          $('.choice').text(value);
        } else {
          $('.your-choice-was').hide();
        }
      }
    }); 
  </script>

  </body>

</html>
</section>
