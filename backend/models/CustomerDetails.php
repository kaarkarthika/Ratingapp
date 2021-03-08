<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "customer_details".
 *
 * @property string $id
 * @property string $CustomerName
 * @property int $ContactNo
 * @property string $EmailId
 * @property string $Address
 * @property int $Floor
 * @property int $Employee
 * @property string $Question1
 * @property string $Question2
 * @property string $Question3
 * @property string $Question4
 * @property string $Question5
 * @property double $QuestionRating1
 * @property double $QuestionRating2
 * @property double $QuestionRating3
 * @property double $QuestionRating4
 * @property double $QuestionRating5
 * @property double $average_rating
 * @property string $CreatedAt
 * @property string $UpdatedAt
 * @property string $UpdatedIpaddress
 */
class CustomerDetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $employee_name;
    public $floor_name;
    public static function tableName()
    {
        return 'customer_details';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ContactNo', 'Floor', 'Employee'], 'integer'],
            [['Address', 'Question1', 'Question2', 'Question3', 'Question4', 'Question5'], 'safe'],
            [['QuestionRating1', 'QuestionRating2', 'QuestionRating3', 'QuestionRating4', 'QuestionRating5', 'average_rating'], 'safe'],
            [['CreatedAt', 'UpdatedAt'], 'safe'],
            [['CustomerName', 'EmailId'], 'safe'],
            [['UpdatedIpaddress'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'CustomerName' => 'Customer Name',
            'ContactNo' => 'Contact No',
            'EmailId' => 'Email ID',
            'Address' => 'Address',
            'Floor' => 'Floor',
            'Employee' => 'Employee',
            'Question1' => 'Question1',
            'Question2' => 'Question2',
            'Question3' => 'Question3',
            'Question4' => 'Question4',
            'Question5' => 'Question5',
            'QuestionRating1' => 'Question Rating1',
            'QuestionRating2' => 'Question Rating2',
            'QuestionRating3' => 'Question Rating3',
            'QuestionRating4' => 'Question Rating4',
            'QuestionRating5' => 'Question Rating5',
            'average_rating' => 'Average Rating',
            'CreatedAt' => 'Created At',
            'UpdatedAt' => 'Updated At',
            'UpdatedIpaddress' => 'Updated Ipaddress',
        ];
    }
    public function afterFind() {  
        if(isset($this->employeemaster->id)){
         $this->employee_name= $this->employeemaster->EmployeeName;  
        }
        if(isset($this->floormaster->id)){
         $this->floor_name= $this->floormaster->FloorName;  
        }
        parent::afterFind(); 
    }
     public function getEmployeemaster()
    {
        return $this->hasOne(EmployeeMaster::className(), ['id' => 'Employee']);
    }
     public function getFloormaster()
    {
        return $this->hasOne(FloorMaster::className(), ['id' => 'Floor']);
    }
    
}
