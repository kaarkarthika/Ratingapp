<?php
namespace frontend\controllers;

use Yii;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\InvoiceAccessoriesGrouping;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;
use backend\models\AppsManagement;
use backend\models\ClientManagement;
use backend\models\ClientPermission;
use backend\models\EmployeeMaster;
use backend\models\CustomerDetails;
use backend\models\DesignationMaster;
use backend\models\FloorMaster; 
use backend\models\Userdetails;
use backend\models\UploadApp;
use backend\models\ApiVersion;
use yii\db\Expression;  
use yii\db\Query;
use common\models\User;

class AppStoreController extends Controller
{

           public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

     public function beforeAction($action) {    
	$params = (Yii::$app->request->headers); 
	if($authorization=$params['authorization']){		
		$this->enableCsrfValidation = false;
    	return parent::beforeAction($action);
	}else{
   $list = array();
   $list['status'] = 'error';
   $list['message'] = 'Invalid Authorization Request!';		
   $response['Output'][]=$list;
		echo json_encode($response);
	}
} 
function authorization(){  
	$params = (Yii::$app->request->headers);
	$authorization=$params['authorization'];
	$authorization=str_replace('Bearer', '', $authorization);
	$authorization=trim($authorization);
	$model = Userdetails::find()
					->where(['auth_key'=>$authorization])
					->one(); 
	if($model){ 
		return $model;
	}
}
public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }


 /*Customer Rating*/
public function actionCustomerRating()
{

  $data=Url::base(true);
   $list = array();
  $postd=(Yii::$app ->request ->rawBody);
  $requestInput = json_decode($postd,true); 
 
 $list['status'] = 'error';
  $list['message'] = 'Invalid Authorization Request!';
  
  if($model=$this->authorization()){
    
    $field_check=array('CustomerName','ContactNo','EmailId','Address','Question1','Question2','Question3','Question4','Question5','QuestionRating1','QuestionRating2','QuestionRating3','QuestionRating4','QuestionRating5','Floor','EmployeeName','Password');
     $is_error = '';
     foreach ($field_check as $one_key) {
        $key_val =isset($requestInput[$one_key]);
        if ($key_val == '') {
          $is_error = 'yes';
          $is_error_note = $one_key;
          break;
        }
    } 
    $det1=array();
    if ($is_error == "yes") {
        $list['status'] = 'error';
        $list['message'] = $is_error_note . ' is Mandatory.';
    }else{  //echo "<pre>"; print_r($requestInput); die;
    $mm = EmployeeMaster::find()->where(['Password_hash'=>trim($requestInput['Password'])])->andWhere(['Status'=>"Active"])->asArray()->one();
      if(empty($mm)){
        $list['status'] = 'error';
        $list['message'] =  'Invalid Password';
      } else{

        $model = new CustomerDetails();
        $model->CustomerName= $requestInput['CustomerName'];
        $model->ContactNo= $requestInput['ContactNo'];
        $model->EmailId= $requestInput['EmailId'];
        $model->Address= $requestInput['Address'];
        $model->Floor= $requestInput['Floor'];  
        $model->Employee= $requestInput['EmployeeName'];
        $model->Question1= $requestInput['Question1'];
        $model->Question2= $requestInput['Question2'];
        $model->Question3= $requestInput['Question3'];
        $model->Question4= $requestInput['Question4'];
        $model->Question5= $requestInput['Question5'];
        $model->QuestionRating1= $requestInput['QuestionRating1'];
        $model->QuestionRating2= $requestInput['QuestionRating2'];
        $model->QuestionRating3= $requestInput['QuestionRating3'];
        $model->QuestionRating4= $requestInput['QuestionRating4'];
        $model->QuestionRating5= $requestInput['QuestionRating5'];
        $average_rating = ($model->QuestionRating1+$model->QuestionRating2+$model->QuestionRating3+$model->QuestionRating4+$model->QuestionRating5);
        $average_rating = ($average_rating/5);
        $model->average_rating=  $average_rating;
         
        $model->save();
        $det1[] =$model;      
        $list['status']='success';
        $list['message']='success';
       // $list['latest_apk']=$latest_data; 
       // $list['app_version']=$latest_data3; 
       // $list['question_list']=$det1;
      }
      } 

 
 
}
$response['Output'][] = $list;
        
  return json_encode($response);
}
   

 /*Question List*/
public function actionQuestionList()
{

  $data=Url::base(true);
   $list = array();
  $postd=(Yii::$app ->request ->rawBody);
  $requestInput = json_decode($postd,true); 
 
 $list['status'] = 'error';
  $list['message'] = 'Invalid Authorization Request!';
  
  if($model=$this->authorization()){
    
    $field_check=array('Status');
     $is_error = '';
     foreach ($field_check as $one_key) {
        $key_val =isset($requestInput[$one_key]);
        if ($key_val == '') {
          $is_error = 'yes';
          $is_error_note = $one_key;
          break;
        }
    } 
    $det1=array();
    if ($is_error == "yes") {
        $list['status'] = 'error';
        $list['message'] = $is_error_note . ' is Mandatory.';
       
    }else{ 
      $det = array(1=>'Resonse to Your Queries',2=>'Display of Jewellery & presentation',3=>"Conversational Skills of staffs & their Service efficiency", 4=>"Convenience of mode of payment",5=>"if this is your first visit, how you come to know know about our Organization");
     

        $det1[] =$det;      
        $list['status']='success';
        $list['message']='success';
       // $list['latest_apk']=$latest_data; 
       // $list['app_version']=$latest_data3; 
        $list['question_list']=$det1;
      } 

 
 
}
$response['Output'][] = $list;
        
  return json_encode($response);
}
   
  /*Floor List*/
public function actionFloorList()
{

  $data=Url::base(true);
   $list = array();
  $postd=(Yii::$app ->request ->rawBody);
  $requestInput = json_decode($postd,true); 
 
 $list['status'] = 'error';
  $list['message'] = 'Invalid Authorization Request!';
  
  if($model=$this->authorization()){
    
    $field_check=array('Status');
     $is_error = '';
     foreach ($field_check as $one_key) {
        $key_val =isset($requestInput[$one_key]);
        if ($key_val == '') {
          $is_error = 'yes';
          $is_error_note = $one_key;
          break;
        }
    } 

    if ($is_error == "yes") {
        $list['status'] = 'error';
        $list['message'] = $is_error_note . ' is Mandatory.';
       
    }else{ 
 
      $Status = $requestInput['Status'];
      $det=array();
       
        $emp = FloorMaster::find()->where(['Status'=>$Status])->asArray()->all();
       

      if(!empty($emp)){  
        foreach ($emp as $key => $value) {
          $det['AutoId'] = $value['id']; 
          $det['FloorName'] = $value['FloorName'];  
          $det['Status'] = $value['Status']; 
          $det['CreatedTime']=date('M d Y',strtotime($value['CreatedAt']));  
          $det1[]=$det;
          
        }

        $list['status']='success';
        $list['message']='success';
       // $list['latest_apk']=$latest_data; 
       // $list['app_version']=$latest_data3; 
        $list['floor_list']=$det1;
      }else{
        $list['status']='success';
        $list['message']='Floor List not Available';
        $list['floor_list']=array();
      }

}
   
 
}
$response['Output'][] = $list;
        
  return json_encode($response);
}

     /*Employee List*/
public function actionEmployeeList()
{

  $data=Url::base(true);
   $list = array();
  $postd=(Yii::$app ->request ->rawBody);
  $requestInput = json_decode($postd,true); 
 
 $list['status'] = 'error';
  $list['message'] = 'Invalid Authorization Request!';
  
  if($model=$this->authorization()){
    
    $field_check=array('floor_name');
     $is_error = '';
     foreach ($field_check as $one_key) {
        $key_val =isset($requestInput[$one_key]);
        if ($key_val == '') {
          $is_error = 'yes';
          $is_error_note = $one_key;
          break;
        }
    } 

    if ($is_error == "yes") {
        $list['status'] = 'error';
        $list['message'] = $is_error_note . ' is Mandatory.';
       
    }else{ 
 
      $floor_name = $requestInput['floor_name'];
      $det=array();
      if($floor_name!=""){
        $emp = EmployeeMaster::find()->where(['Status'=>"Active"])->andWhere(['EmployeeType'=>$floor_name])->asArray()->all();
      }else{
        $emp = EmployeeMaster::find()->where(['Status'=>"Active"])->asArray()->all();
      }

      if(!empty($emp)){  
        foreach ($emp as $key => $value) {
          $det['AutoId'] = $value['id']; 
          $det['EmployeeName'] = $value['EmployeeName']; 
          $det['EmployeeId']   = $value['EmployeeId']; 
          $det['ContactNo']    = $value['ContactNo']; 
          $det['EmailId'] = $value['EmailId']; 
          $det['Address'] = $value['Address']; 
          $det['FloorName'] = $value['TypeName']; 
          $det['DesignationName'] = $value['DesignationName']; 
          $det['Status'] = $value['Status']; 
          $det['CreatedTime']=date('M d Y',strtotime($value['CreatedAt']));  
            $det1[]=$det;
          
        }

        $list['status']='success';
        $list['message']='success';
       // $list['latest_apk']=$latest_data; 
       // $list['app_version']=$latest_data3; 
        $list['employee_list']=$det1;
      }else{
        $list['status']='success';
        $list['message']='Employee List not Available';
        $list['employee_list']=array();
      }

}
   
 
}
$response['Output'][] = $list;
        
  return json_encode($response);
}




 

}
