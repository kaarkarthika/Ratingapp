<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "product_master".
 *
 * @property int $id
 * @property string $Name
 * @property string $HsnNumber
 * @property string $Barcode
 * @property double $Price
 * @property string $Type
 * @property string $Brand
 * @property string $Status
 * @property string $CreatedAt
 * @property string $ModifiedAt
 * @property string $UpdatedIpaddress
 */
class ProductMaster extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_master';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Price'], 'number'],
            [['Status'], 'string'],
            [['CreatedAt', 'ModifiedAt'], 'safe'],
            [['Name', 'Barcode', 'Type', 'Brand'], 'string', 'max' => 255],
            [['HsnNumber'], 'string', 'max' => 100],
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
            'Name' => 'Name',
            'HsnNumber' => 'Hsn Number',
            'Barcode' => 'Barcode',
            'Price' => 'Price',
            'Type' => 'Type',
            'Brand' => 'Brand',
            'Status' => 'Status',
            'CreatedAt' => 'Created At',
            'ModifiedAt' => 'Modified At',
            'UpdatedIpaddress' => 'Updated Ipaddress',
        ];
    }
}
