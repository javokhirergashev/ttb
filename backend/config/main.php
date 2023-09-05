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
    'defaultRoute' => 'user/profile',
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'timeZone' => 'Asia\Tashkent',
    'language' => 'uz',
    'name' => 'TTB',
    'modules' => [
        'admin' => [
            'class' => 'mdm\admin\Module',
            'layout' => 'left-menu', // You can choose a different layout if desired.
        ],
    ],
    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            'site/*', // Allow access to the site controller for everyone.
            'admin/*', // Allow access to the admin controller for those with the necessary permissions.
            // Add more actions that should be accessible without authentication or specific permissions.
        ],
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager', // You can use different implementations, like DbManager or FileManager
            'defaultRoles' => ['*'], // Define default roles
        ],
        'qr' => [
            'class' => '\Da\QrCode\Component\QrCodeComponent',
            // ... you can configure more properties of the component here
        ],
        'formatter' => [
            'timeZone' => 'Asia/Tashkent',
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
                    'class' => \yii\log\FileTarget::class,
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mdm' => [
            'class' => '',
            // ...
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
    ],

    'on beforeAction' => function () {
        if (Yii::$app->user->isGuest && Yii::$app->request->url != '/site/login') {
            Yii::$app->getResponse()->redirect(['site/login']);
            Yii::$app->end();
        }
    },

    'params' => $params,
];
