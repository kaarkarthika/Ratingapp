<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "employee_master".
 *
 * @property int $id
 * @property string $EmployeeName
 * @property string $EmployeeId
 * @property int $EmployeeType
 * @property string $TypeName
 * @property string $ContactNo
 * @property string $EmailId
 * @property string $Designation
 * @property string $Address
 * @property string $Status
 * @property string $CreatedAt
 * @property string $ModifiedAt
 * @property string $UpdatedIpaddress
 */
class EmployeeMaster extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employee_master';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['EmployeeType', 'ContactNo'], 'integer'],
            [['EmployeeName','EmployeeId','EmployeeType'], 'required'],
            [['Address', 'Status'], 'string'],
            [['password_repeat'], 'safe'],
            [['CreatedAt', 'ModifiedAt'], 'safe'],
            [['EmployeeName', 'EmployeeId', 'TypeName', 'EmailId', 'Designation'], 'string', 'max' => 255],
            [['EmailId'], 'email'],
            [['EmployeeId'], 'unique'],
           // ['password_repeat','compare','compareAttribute'=>'Password'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'EmployeeName' => 'Employee Name',
            'EmployeeId' => 'Employee ID',
            'EmployeeType' => 'Floor Name',
            'TypeName' => 'Floor Name',
            'ContactNo' => 'Contact No',
            'EmailId' => 'Email ID',
            'Designation' => 'Designation',
            'DesignationName' => 'Designation',
            'Address' => 'Address',
            'Password_hash' => 'Confirm Password',
            'Status' => 'Active Status',
            'CreatedAt' => 'Created At',
            'ModifiedAt' => 'Modified At',
            'UpdatedIpaddress' => 'Updated Ipaddress',
        ];
    }
}
