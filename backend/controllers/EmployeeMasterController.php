<?php

namespace backend\controllers;

use Yii;
use backend\models\EmployeeMaster;
use backend\models\FloorMaster;
use backend\models\DesignationMaster;
use backend\models\EmployeeMasterSearch;
use yii\web\Controller;
use yii\widgets\ActiveForm;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;


/**
 * EmployeeMasterController implements the CRUD actions for EmployeeMaster model.
 */
class EmployeeMasterController extends Controller
{
    /**
     * @inheritdoc
     */
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

    /**
     * Lists all EmployeeMaster models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EmployeeMasterSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EmployeeMaster model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->renderAjax('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new EmployeeMaster model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new EmployeeMaster();

        if ($model->load(Yii::$app->request->post())) {
            if(Yii::$app->request->isAjax){ 
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            }

            $floor = FloorMaster::findOne($_POST['EmployeeMaster']['EmployeeType']);
            if($floor){
            $model->TypeName = $floor->FloorName;
            }
            $floor1 = DesignationMaster::findOne($_POST['EmployeeMaster']['Designation']);
            if($floor1){
            $model->DesignationName = $floor1->DesignationName;
            }
            $model->UpdatedIpaddress = $_SERVER['REMOTE_ADDR'];
            if (isset($_POST['EmployeeMaster']['Password']) && $_POST['EmployeeMaster']['Password']!="") {     
            $password_hash= trim($_POST['EmployeeMaster']['Password']);
            $model->Password = Yii::$app->security->generatePasswordHash($password_hash);
            $model->Password_hash =  trim($_POST['EmployeeMaster']['Password']);  
            } 

            $model->save();
            return $this->redirect(['index']);
        }else{
            return $this->render('create', ['model' => $model]);
        }

    }

    /**
     * Updates an existing EmployeeMaster model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
               if(Yii::$app->request->isAjax){ 
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            }

            $floor = FloorMaster::findOne($_POST['EmployeeMaster']['EmployeeType']);
            if($floor){
            $model->TypeName = $floor->FloorName;
            }
            $floor1 = DesignationMaster::findOne($_POST['EmployeeMaster']['Designation']);
            if($floor1){
            $model->DesignationName = $floor1->DesignationName;
            }
           $model->UpdatedIpaddress = $_SERVER['REMOTE_ADDR'];
           
           if (isset($_POST['EmployeeMaster']['Password']) && $_POST['EmployeeMaster']['Password']!="") {     
            $password_hash= trim($_POST['EmployeeMaster']['Password']);
            $model->Password = Yii::$app->security->generatePasswordHash($password_hash);
            $model->Password_hash =  trim($_POST['EmployeeMaster']['Password']);

            } 
            if(!$model->save()){
                echo "<pre>"; print_r($model->getErrors()); die;
            }
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing EmployeeMaster model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if($model->Status=="Active"){
            $model->Status=="Inactive";
        }else{
            $model->Status=="Inactive";
        }
        $model->save();
        return $this->redirect(['index']);
    }

    /**
     * Finds the EmployeeMaster model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return EmployeeMaster the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EmployeeMaster::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
