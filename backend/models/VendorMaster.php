<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "vendor_master".
 *
 * @property int $id
 * @property string $VendorName
 * @property string $PhoneNo
 * @property string $SupplierGst
 * @property string $Address
 * @property string $City
 * @property string $State
 * @property string $LandlineNo
 * @property string $Email
 * @property string $ContactPerson
 * @property string $BankName
 * @property string $AccountNo
 * @property string $IfscCode
 * @property string $CreatedAt
 * @property string $ModifiedAt
 * @property string $UpdatedIpaddress
 */
class VendorMaster extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vendor_master';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Address'], 'string'],
            [['CreatedAt', 'ModifiedAt'], 'safe'],
            [['VendorName', 'SupplierGst', 'ContactPerson', 'BankName', 'AccountNo', 'IfscCode'], 'string', 'max' => 255],
            [['PhoneNo', 'LandlineNo'], 'string', 'max' => 15],
            [['City', 'State', 'Email'], 'string', 'max' => 100],
            [['UpdatedIpaddress'], 'string', 'max' => 500],
            [['SupplierGst'], 'unique'],
            [['PhoneNo'], 'unique'],
            [['LandlineNo'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'VendorName' => 'Vendor Name',
            'PhoneNo' => 'Phone No',
            'SupplierGst' => 'Supplier Gst',
            'Address' => 'Address',
            'City' => 'City',
            'State' => 'State',
            'LandlineNo' => 'Landline No',
            'Email' => 'Email',
            'ContactPerson' => 'Contact Person',
            'BankName' => 'Bank Name',
            'AccountNo' => 'Account No',
            'IfscCode' => 'Ifsc Code',
            'CreatedAt' => 'Created At',
            'ModifiedAt' => 'Modified At',
            'UpdatedIpaddress' => 'Updated Ipaddress',
        ];
    }
}
