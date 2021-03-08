<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers', 
   // 'defaultRoute' => 'site/index',
    'components' => [
        'user' => [
            'identityClass' => 'common\models\Frontend',
            'enableAutoLogin' => true,
            'identityCookie' => [
                'name' => '_frontendUser', // unique for frontend
            ]
        ],
        'session' => [
            'name' => 'Swim987963frontend',
            'savePath' => sys_get_temp_dir(),
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'sdfafsdsd',
            'csrfParam' => '_frontendCSRF',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [

                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
     
      'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
            'rules' => [
                
                
                //'news/<id:\w+>' => 'newslisting/index', 
                
                'login' => 'login/login',
                'category-master' => 'login/category-master',
                'product-master' => 'login/product-master',
                'employee-list' => 'app-store/employee-list',
                'floor-list' => 'app-store/floor-list',
                'employee-list' => 'app-store/employee-list',
                'question-list' => 'app-store/question-list',
                'customer-rating' => 'app-store/customer-rating',
                'product-master' => 'login/product-master',
                'logout' => 'login/logout',
				
            ],  
        ],
        
    ],
    'params' => $params,
];
