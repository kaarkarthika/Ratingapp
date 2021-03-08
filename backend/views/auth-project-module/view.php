<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\AuthProjectModule */

?>
<div class="auth-project-module-view">
   <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'p_autoid',
            'moduleName',
            'moduleCode',
            'moduleCode2',
            'moduleCode3',
            'moduleMultiple',
            'moduelRoot',
            'user_url:url',
            'userAction',
            'FAIcon',
            'sortOrder',
            'user_rights:ntext',
            'is_active',
            'module_show_status:ntext',
            'admin_lead_opn',
        ],
    ]) ?>

</div>
