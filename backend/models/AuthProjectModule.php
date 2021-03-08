<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "auth_project_module".
 *
 * @property int $p_autoid
 * @property string $moduleName
 * @property string $moduleCode
 * @property string $moduleCode2
 * @property string $moduleCode3
 * @property string $moduleMultiple one=Menu,more=Group,sub=Sub-Menu,identify=Group-Title
 * @property string $moduelRoot
 * @property string $user_url
 * @property string $userAction
 * @property string $FAIcon
 * @property int $sortOrder
 * @property string $user_rights
 * @property int $is_active
 * @property string $module_show_status
 * @property int $admin_lead_opn
 */
class AuthProjectModule extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'auth_project_module';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['moduleMultiple', 'user_rights', 'module_show_status'], 'string'],
            [['sortOrder', 'admin_lead_opn'], 'integer'],
            [['moduleName', 'moduleCode', 'moduleCode2', 'moduelRoot', 'userAction', 'FAIcon'], 'string', 'max' => 250],
            [['moduleCode3', 'user_url'], 'string', 'max' => 255],
            [['is_active'], 'string', 'max' => 2],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'p_autoid' => 'P Autoid',
            'moduleName' => 'Module Name',
            'moduleCode' => 'Module Code',
            'moduleCode2' => 'Module Code2',
            'moduleCode3' => 'Module Code3',
            'moduleMultiple' => 'Module Multiple',
            'moduelRoot' => 'Moduel Root',
            'user_url' => 'User Url',
            'userAction' => 'User Action',
            'FAIcon' => 'Faicon',
            'sortOrder' => 'Sort Order',
            'user_rights' => 'User Rights',
            'is_active' => 'Is Active',
            'module_show_status' => 'Module Show Status',
            'admin_lead_opn' => 'Admin Lead Opn',
        ];
    }
}
