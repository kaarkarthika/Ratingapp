<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "customermaster".
 *
 * @property int $id
 * @property string $CustomerName
 * @property string $PhoneNumber
 * @property string $Email
 * @property string $Address
 * @property string $City
 * @property string $State
 * @property string $CreatedAt
 * @property string $ModifiedAt
 * @property string $UpdatedIpaddress
 */
class Customermaster extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customermaster';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Address'], 'string'],
            [['CreatedAt', 'ModifiedAt'], 'safe'],
            [['CustomerName'], 'string', 'max' => 255],
            [['PhoneNumber'], 'string', 'max' => 15],
            [['Email', 'City', 'State'], 'string', 'max' => 100],
            [['UpdatedIpaddress'], 'string', 'max' => 500],
            [['PhoneNumber'], 'unique'],
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
            'PhoneNumber' => 'Phone Number',
            'Email' => 'Email',
            'Address' => 'Address',
            'City' => 'City',
            'State' => 'State',
            'CreatedAt' => 'Created At',
            'ModifiedAt' => 'Modified At',
            'UpdatedIpaddress' => 'Updated Ipaddress',
        ];
    }
}
