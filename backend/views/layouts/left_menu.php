<?php

$session = Yii::$app->session;
$session['user_logintype'];
//echo "<pre>";print_r($_SESSION);die;
$menu_data_array = array();
use backend\models\Shortcut;
use backend\models\ApiVersion;
use yii\helpers\Url;

//  if($session['user_logintype']=='T1')
//  {
   $menu_data_array[0] = array('one', 'Dashboard', Yii::$app -> homeUrl, '<i class="fa fa-dashboard"></i>', 'site/index');

   $menu_data_array[10] = array('more', 'Masters', '-', '<i class="fa fa-circle"></i>', array('employee-master','floor-master','designation-master'));
   $menu_data_array[10]['sub'][0] = array('Designation Management', Yii::$app->homeUrl.'?r=designation-master', '<i class="fa fa-user"></i>', 'designation-master','designation-master'); 
   $menu_data_array[10]['sub'][1] = array('Floor Management', Yii::$app->homeUrl.'?r=floor-master', '<i class="fa fa-building"></i>', 'floor-master','floor-master'); 
    $menu_data_array[10]['sub'][2] = array('Employee Management', Yii::$app->homeUrl.'?r=employee-master', '<i class="fa fa-users"></i>', 'employee-master','employee-master'); 
    $menu_data_array[2] = array('one','Customer Management', Yii::$app->homeUrl.'?r=customer-details/index', '<i class="fa fa-users"></i>', 'customer-details/index','customer-details/index'); 
  

$html_menu_out = '';
$controler_url_id = Yii::$app ->controller->id;
$active_url_id = Yii::$app ->controller->action->id;
$html_menu_out_tmp = $controler_url_id . "/" . $active_url_id;
//$html_menu_out .= $html_menu_out_tmp;
foreach ($menu_data_array as $one_ig => $one_menus) {//echo "<pre>";print_r($one_menus);
	if (count($one_menus) > 0) {
		if ($one_menus[0] == 'more') {
			$isselct = '';
			if ($controler_url_id == $one_menus[4]) {$isselct = 'active';
			}//echo $isselct;
			$html_menu_out2 = '<ul class="treeview-menu">';
			foreach ($one_menus['sub'] as $one_submenus) {
				$isactive = '';
				if ($active_url_id == "index") {
					if ($active_url_id == $one_submenus[4] || $controler_url_id == $one_submenus[4]) {
						$isactive = 'class="active"';
						if ($isselct == '') {
							$isselct = 'active';
						}
					}
				} else {
					if ($active_url_id == $one_submenus[4]) {$isactive = 'class="active"';
					}
				}
				$html_menu_out2 .= '<li ' . $isactive . '><a href="' . $one_submenus[1] . '">' . $one_submenus[2] . '' . $one_submenus[0] . '</a></li>';
			}
			$html_menu_out1 = '<li class="treeview ' . $isselct . '"><a href="#">' . $one_menus[3] . ' <span>' . $one_menus[1] . '</span><i class="fa fa-angle-left pull-right"></i></a>';
			$html_menu_out2 .= '</ul></li>';
			$isselct = '';
			$html_menu_out .= $html_menu_out1 . $html_menu_out2;
		} elseif ($one_menus[0] == 'one') {
			$isselct = '';
			
			if ($active_url_id == "index") {
				if ($controler_url_id.'/'.$active_url_id == $one_menus[4] ) {$isselct = 'active';
				//die;
				}
			} else {
				if ($html_menu_out_tmp == $one_menus[4]) {

					$isselct = 'active';
				}
			}
			$html_menu_out .= '<li class="treeview ' . $isselct . '"> 
		              <a href="' . $one_menus[2] . '">' . $one_menus[3] . ' <span>' . $one_menus[1] . '</span></a></li>';
		}
	}
}
?>
<aside class="main-sidebar">
<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
<!-- Sidebar user panel
<div class="user-panel">
<div class="pull-left image">
<img src="../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
</div>
<div class="pull-left info">
<p>Alexander Pierce</p>
<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
</div>
</div>-->
<!-- search form
<form action="#" method="get" class="sidebar-form">
<div class="input-group">
<input type="text" name="q" class="form-control" placeholder="Search...">
<span class="input-group-btn">
<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
</span>
</div>
</form>
<!-- /.search form -->
<!-- sidebar menu: : style can be found in sidebar.less -->
<ul class="sidebar-menu">
<?php echo $html_menu_out; ?>

</ul>
</section>


<div class="additional-block">
<!-- 
<input type="text" class="form-control"  placeholder="Search Here" name="Search" id="shortcode" style="    width: 96%;
    border-radius: 5px;
    text-align: center;
    margin-left: 6px;
    	"> -->
    
    <br>
   <style>
	.typeahead.dropdown-menu {
		left: 20px !important;
	}
</style> 

<?php
/*$shortcut=Shortcut::find()->where(['status'=>'1'])->asArray()->all();	
								if(!empty($shortcut))
								{
									foreach ($shortcut as $key => $value)
									{
									$productlist_col_val[] = array('value' => $value['name'],'value1' => $value['link']);
									}
									$productlist_col_json = json_encode($productlist_col_val);
								}
								else
								{
									$productlist_col_json="0";
								}*/
?>
<script type="text/javascript" src="<?php echo Url::base(); ?>/boot/bootstrap3-typeahead.js"></script>
<script type="text/javascript" src="<?php echo Url::base(); ?>/boot/bootstrap3-typeahead.min.js"></script>
<div class="quickinof">
<!-- <span style="width: 100%;
    float: left;
   /*border: 1px solid;*/
    text-align: center;
    /* background:<?php  //echo $_SESSION['color_code'];?>;*/ 
    color: white;
	color: #3c8dbc;
    font-weight: bold;
	background-unset;"
>Quick Info</span> -->
</div>
 <br>
 <?php
/*  $api_version = ApiVersion::find()
                   ->orderBy(['auto_id'=>SORT_DESC])
                   ->asArray()
                    ->one();
   $data=$api_version['app_version'];*/
//print_r($data);die;
 ?>  

</div>
<!-- if(isset($_SESSION['REMOTE_ADDR'])) -->
 <script>
	/*
	var subjects = <?php // $productlist_col_json; ?>;
    $("#shortcode").typeahead({
      minLength: 1,
      delay: 100,
	  	source: subjects,
  		autoSelect: true,
 		displayText: function(item)
 		{
 	 		return item.value;	
 		},
  		afterSelect: function(item) {
			var base_url="<?php echo Url::base();?>"+"/index.php?r="+item.value1;
  			window.location.href = base_url;	
  		}
	});
*/

</script>
<!-- /.sidebar -->
</aside>