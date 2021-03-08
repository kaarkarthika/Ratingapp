<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "category_master".
 *
 * @property int $id
 * @property string $CategoryName
 * @property string $CategoryType
 * @property string $Status
 * @property string $CreatedAt
 * @property string $UpdatedAt
 * @property string $UpdatedIpaddress
 */
class CategoryMaster extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category_master';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Status'], 'string'],
            [['CreatedAt', 'UpdatedAt'], 'safe'],
            [['CategoryName', 'CategoryType'], 'string', 'max' => 255],
            [['UpdatedIpaddress'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'CategoryName' => 'Category Name',
            'CategoryType' => 'Category Type',
            'Status' => 'Status',
            'CreatedAt' => 'Created At',
            'UpdatedAt' => 'Updated At',
            'UpdatedIpaddress' => 'Updated Ipaddress',
        ];
    }
}
