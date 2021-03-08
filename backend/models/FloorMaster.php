<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "floor_master".
 *
 * @property int $id
 * @property string $FloorName
 * @property string $Status
 * @property string $CreatedAt
 * @property string $UpdatedAt
 * @property string $UpdatedIpaddress
 */
class FloorMaster extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'floor_master';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FloorName'], 'required'],
            [['Status'], 'string'],
            [['CreatedAt', 'UpdatedAt'], 'safe'],
            [['FloorName'], 'safe'],
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
            'FloorName' => 'Floor Name',
            'Status' => 'Actve Status',
            'CreatedAt' => 'Created At',
            'UpdatedAt' => 'Updated At',
            'UpdatedIpaddress' => 'Updated Ipaddress',
        ];
    }
}
