<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "designation_master".
 *
 * @property int $id
 * @property string $DesignationName
 * @property string $Status
 * @property string $CreatedAt
 * @property string $UpdatedAt
 * @property string $UpdatedIpaddress
 */
class DesignationMaster extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'designation_master';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Status','DesignationName'], 'required'],
            [['CreatedAt', 'UpdatedAt'], 'safe'],
            [['DesignationName'], 'safe'],
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
            'DesignationName' => 'Designation Name',
            'Status' => 'Active Status',
            'CreatedAt' => 'Created At',
            'UpdatedAt' => 'Updated At',
            'UpdatedIpaddress' => 'Updated Ipaddress',
        ];
    }
}
