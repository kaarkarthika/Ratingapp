<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "product_category_master".
 *
 * @property int $id
 * @property int $ProductId
 * @property int $CaregoryId
 * @property string $Name
 * @property int $Attribute
 * @property double $PurshaseCost
 * @property double $SaleCost
 * @property double $PurchaseGst
 * @property double $SalesGst
 * @property double $StockIn
 * @property string $Status
 * @property string $CreatedAt
 * @property string $UpdatedAt
 * @property string $UpdatedIpaddress
 * @property int $UserId
 *
 * @property ProductMaster $product
 * @property CategoryMaster $caregory
 */
class ProductCategoryMaster extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_category_master';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ProductId', 'CaregoryId', 'Attribute', 'UserId'], 'integer'],
            [['PurshaseCost', 'SaleCost', 'PurchaseGst', 'SalesGst', 'StockIn'], 'number'],
            [['Status'], 'string'],
            [['CreatedAt', 'UpdatedAt'], 'safe'],
            [['Name'], 'string', 'max' => 255],
            [['UpdatedIpaddress'], 'string', 'max' => 500],
            [['ProductId'], 'exist', 'skipOnError' => true, 'targetClass' => ProductMaster::className(), 'targetAttribute' => ['ProductId' => 'id']],
            [['CaregoryId'], 'exist', 'skipOnError' => true, 'targetClass' => CategoryMaster::className(), 'targetAttribute' => ['CaregoryId' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ProductId' => 'Product ID',
            'CaregoryId' => 'Caregory ID',
            'Name' => 'Name',
            'Attribute' => 'Attribute',
            'PurshaseCost' => 'Purshase Cost',
            'SaleCost' => 'Sale Cost',
            'PurchaseGst' => 'Purchase Gst',
            'SalesGst' => 'Sales Gst',
            'StockIn' => 'Stock In',
            'Status' => 'Status',
            'CreatedAt' => 'Created At',
            'UpdatedAt' => 'Updated At',
            'UpdatedIpaddress' => 'Updated Ipaddress',
            'UserId' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(ProductMaster::className(), ['id' => 'ProductId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCaregory()
    {
        return $this->hasOne(CategoryMaster::className(), ['id' => 'CaregoryId']);
    }
}
