<html>
<head>


</head>
  <body>
    <div id="chartdiv" style="width: 400px; height: 300px;"></div>
	
	 
	
	
	<script src="backend/web/chart/am-core.js"></script>
<script src="backend/web/chart/am-charts.js"></script>
<script src="backend/web/chart/am-animated.js"></script>
  <script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
var chart = am4core.create("chartdiv", am4charts.XYChart);

// Add data
chart.data = [{
  "country": "Excellent",
  "visits": 50
}, {
  "country": "Happy",
  "visits": 40
}, {
  "country": "Average",
  "visits": 30
}, {
  "country": "Unhappy",
  "visits": 20
}, {
  "country": "Bad",
  "visits": 10
}];

// Create axes

// Create axes
let categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "country";
categoryAxis.renderer.labels.template.rotation = 270;
categoryAxis.renderer.labels.template.hideOversized = false;
categoryAxis.renderer.minGridDistance = 20;
categoryAxis.renderer.labels.template.horizontalCenter = "right";
categoryAxis.renderer.labels.template.verticalCenter = "middle";
categoryAxis.tooltip.label.rotation = 270;
//categoryAxis.tooltip.label.horizontalCenter = "right";
//categoryAxis.tooltip.label.verticalCenter = "middle";

let valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
valueAxis.title.text = "Countries";
//valueAxis.title.fontWeight = "bold";


// Create series
var series = chart.series.push(new am4charts.ColumnSeries());
series.dataFields.valueY = "visits";
series.dataFields.categoryX = "country";
categoryAxis.renderer.labels.template.rotation = 270;
categoryAxis.renderer.labels.template.hideOversized = false;
series.name = "Visits";
series.columns.template.tooltipText = "{categoryX}: [bold]{valueY}[/]";
series.columns.template.fillOpacity = .8;

}); // end am4core.ready()
</script>
	







	
  </body>

</html>