<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [

            'reportico' => [
            'class' => 'reportico\reportico\Module' ,
            'controllerMap' => [
                            'reportico' => 'reportico\reportico\controllers\ReporticoController',
                            'mode' => 'reportico\reportico\controllers\ModeController',
                            'ajax' => 'reportico\reportico\controllers\AjaxController',
                        ]
            ],
    ],
    'components' => [
        'request' => [
            'class' => 'common\components\Request',
            'web'=> '/backend/web',
            'adminUrl' => '/admin',
            'csrfParam' => '_csrf-backend',
            'enableCsrfValidation'=>false,
            
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'admin' => 'admin',
                'login' => 'site/login',
                'home' => 'site/index',

                'company-setup-index' => 'company-setup/index',
                'company-setup-create' => 'company-setup/create',
                'company-setup-update' => 'company-setup/update',
                'company-setup-view' => 'company-setup/view',

                'new-sale-index' => 'new-sale/index',
                'new-sale-create' => 'new-sale/create',
                'new-sale-update' => 'new-sale/update',
                'new-sale-view' => 'new-sale/view',
                'new-sale-report' => 'new-sale/report',

                'new-purchase-index' => 'new-purchase/index',
                'new-purchase-create' => 'new-purchase/create',
                'new-purchase-update' => 'new-purchase/update',
                'new-purchase-view' => 'new-purchase/view',

                'expense-index' => 'expense/index',
                'expense-create' => 'expense/create',
                'expense-update' => 'expense/update',
                'expense-view' => 'expense/view',

                'income-index' => 'income/index',
                'income-create' => 'income/create',
                'income-update' => 'income/update',
                'income-view' => 'income/view',

                'daily-sale-report' => 'new-sale/daily-report',
                'monthly-sale-report' => 'new-sale/monthly-report',

                'daily-purchase-report' => 'new-purchase/daily-report',
                'monthly-purchase-report' => 'new-purchase/monthly-report',

                'daily-expense-report' => 'expense/daily-report',
                'monthly-expense-report' => 'expense/monthly-report',

                'daily-income-report' => 'income/daily-report',
                'monthly-income-report' => 'income/monthly-report',
                
                'balance-sheet' => 'balance-sheet/create',
                'balance-sheet-view' => 'balance-sheet/view',
            ],
        ],
        
    ],
    'params' => $params,
];
