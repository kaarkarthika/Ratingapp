<?php
namespace frontend\controllers;

use Yii;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;
use backend\models\ApiVersion;
use backend\models\CategoryMaster;
use backend\models\Userdetails;
use yii\db\Expression;
use yii\db\Query;
use common\models\User;

class LoginController extends Controller
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

 public function actionLogin()
{ 
  $list = array();
  $postd=(Yii::$app ->request ->rawBody);
  $requestInput = json_decode($postd,true);
    
  $list['status'] = 'error';
  $list['message'] = 'Nill';
    
    $field_check=array('username','password');
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
    $super_data = Userdetails::find()->where(['username'=>$requestInput['username']])->one();
    $loginkey='';
    $login_status="S";
    
    if(!empty($super_data)){ 
       $password=$requestInput['password'];
       $haspassword=$super_data->password_hash;
    if(Yii::$app->security->validatePassword($password,$haspassword)){
         
         
        $list['status'] = "success";
        $list['message'] = "Logged In successfully"; 
        $list['login_key'] = "S";
        $list['login_name']= $requestInput['username'];
        $list['auto_id'] =$super_data->id;
        $list['auth_key']= $super_data->auth_key; 
        $list['full_name']= $super_data->first_name.' '.$super_data->last_name;
      }else{
        $list['status'] = "error";
        $list['message'] = 'Invalid Login';

      }
    }else{
        $list['status'] = "error";
        $list['message'] = 'Invalid Login';
    }
        $response['Output'][] = $list;
        return json_encode($response);
    
   }
}


public function actionCategoryMaster(){
    $list = array();
    $postd=(Yii::$app ->request ->rawBody);
    $requestInput = json_decode($postd,true);
    
    $list['status'] = 'error';
    $list['message'] = 'Nill';
    
    $field_check=array('CaregoryName','CategoryType','Status');
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
      $model = CategoryMaster::find()->where(['CategoryName'=>$requestInput['CategoryName']])->one();
    if(!empty($model))
    {
      $model = new CategoryMaster();
    }
      $model->CategoryName = $requestInput['CategoryName'];
      $model->Categorytype = $requestInput['Categorytype'];
      $model->Status = $requestInput['Status'];

    
    if($model->save()){
        $list['status'] = "success";
        $list['message'] = 'Data Saved Successfully';
       
    }else{
        $list['status'] = "error";
        $list['message'] = 'Data Not Saved';
    }
        $response['Output'][] = $list;
        return json_encode($response);
     
    }
}


public function actionProductMaster(){
    $list = array();
    $postd=(Yii::$app ->request ->rawBody);
    $requestInput = json_decode($postd,true);
    
    $list['status'] = 'error';
    $list['message'] = 'Nill';
    
    $field_check=array('ProductName','CategoryType','Status');
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
      $model = CategoryMaster::find()->where(['CategoryName'=>$requestInput['CategoryName']])->one();
    if(!empty($model))
    {
      $model = new CategoryMaster();
    }
      $model->CategoryName = $requestInput['CategoryName'];
      $model->Categorytype = $requestInput['Categorytype'];
      $model->Status = $requestInput['Status'];

    
    if($model->save()){
        $list['status'] = "success";
        $list['message'] = 'Data Saved Successfully';
       
    }else{
        $list['status'] = "error";
        $list['message'] = 'Data Not Saved';
    }
        $response['Output'][] = $list;
        return json_encode($response);
     
    }
}
 

}
