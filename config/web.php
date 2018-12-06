<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'name' => 'сИньор Помидор',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    // set target language to be Russian
    'language' => 'ru-RU',
    'charset' => 'utf-8',
    // set source language to be English
    'sourceLanguage' => 'en-EN',
    'defaultRoute' => 'front',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'components' => [
        /**
         * Компонент загрузки фотографий
         * @link https://github.com/noam148/yii2-image-manager
         */
        'imagemanager' => [
            'class' => 'noam148\imagemanager\components\ImageManagerGetPath',
            //set media path (outside the web folder is possible)
            'mediaPath' => 'img',
            //path relative web folder. In case of multiple environments (frontend, backend) add more paths
            'cachePath' => ['assets/images', '/web/assets/images'],
            //use filename (seo friendly) for resized images else use a hash
            'useFilename' => true,
            //show full url (for example in case of a API)
            'absoluteUrl' => false,
            'databaseComponent' => 'db'
            // The used database component by the image manager, this defaults to the Yii::$app->db component
        ],
        /**
         * Компонент интернациональзации
         * настройка config/i18n
         * Основной файл с переводами @app/messages/ru/app.php
         */
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'sourceLanguage' => 'en-EN',
                ],
            ],
        ],
        /**
         * Переопредение отображений
         */
        'view' => [
            'theme' => [
                'pathMap' => [
                    #переопределение моудуля dektrium/user
                    '@dektrium/user/views/admin' => '@app/admin/views/user/',
                    '@dektrium/user/views/settings' => '@app/front/views/user',
                    '@dektrium/user/views/security' => '@app/front/views/user',

                ],
            ],
        ],
        'request' => [
           // 'baseUrl' => '',
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 't1Xd-e0vhaTKeFiP0Euv7W_gTZHNIKls',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'errorHandler' => [
            'errorAction' => 'admin/default/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            //'viewPath' => '@app/mail',
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'signorpomidor.ru',
                'username' => 'info@signorpomidor.ru',
                'password' => '3GEZmq1F',
                'port' => '25 ',

            ],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => [
                        'error',
                        'warning',
                    ],
                ],
            ],
        ],
        'db' => $db,
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            // Disable index.php
            'showScriptName' => false,
            // Disable r= routes
            'enablePrettyUrl' => true,

            'rules' => [
                '' => '/front/default/index',
                // '<action>' => 'site/<action>',

                '/admin/export/1c_exchange.php' => '/admin/export',
                'shop' => '/front/default/shop',
                'about' => '/front/default/about',
                'contacts' => '/front/default/contacts',
                'cart' => '/front/cart/cart',
                'orders' => '/front/orders/user-orders',
//                         '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
//                              '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
//                            '<module:[\wd-]+>/<controller:[\wd-]+>/<action:[\wd-]+>/<id:\d+>' => '<module>/<controller>/<action>',
            ],
        ],
    ],
    'controllerMap' => [
        'elfinder' => [
            'class' => 'mihaildev\elfinder\PathController',
            'access' => ['@'],
            'root' => [
                'path' => 'uploads',
                'name' => 'Files',
            ],
        ],
    ],
    'modules' => [
        /**
         * Компонент загрузки фотографий
         * @link https://github.com/noam148/yii2-image-manager
         */
        'imagemanager' => [
            'class' => 'noam148\imagemanager\Module',
            //set accces rules ()
            'canUploadImage' => true,
            'canRemoveImage' => function () {
                return true;
            },
            'deleteOriginalAfterEdit' => false,
            // false: keep original image after edit. true: delete original image after edit
            // Set if blameable behavior is used, if it is, callable function can also be used
            'setBlameableBehavior' => false,
            //add css files (to use in media manage selector iframe)
            'cssFiles' => [
                'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css',
            ],
        ],
        /**
         * Моудуль отвечающий за регистрацию и авторизацию пользователей
         * @link https://github.com/dektrium/yii2-user
         * Конфигурация
         * @link https://github.com/dektrium/yii2-user/blob/master/docs/configuration.md
         */
        'user' => [
            'class' => 'dektrium\user\Module',
            'layout' => '@app/front/views/layouts/main.php',
            'modelMap' => [
                'Profile' => 'app\front\models\user\Profile',
                'RegistrationForm' => 'app\front\models\user\RegistrationForm',
            ],
            'enableUnconfirmedLogin' => true,
            'confirmWithin' => 21600,
            'cost' => 12,
            'admins' => ['admin'],
            'controllerMap' => [
                'security' => [
                    'class' => \dektrium\user\controllers\SecurityController::className(),
                    'on ' . \dektrium\user\controllers\SecurityController::EVENT_AFTER_LOGIN => function ($e) {

                        if (Yii::$app->user->can('admin')) {
                            $route = ['/admin/store/index'];
                            Yii::$app->response->redirect($route)->send();
                            Yii::$app->end();
                        } else {
                            Yii::$app->response->redirect(Yii::$app->request->referrer)->send();
                        }

                    }
                ]
            ],


        ],
        /**
         * Модуль управление правами пользователей
         * @link https://github.com/dektrium/yii2-rbac/blob/master/docs
         */
        'rbac' => [
            'class' => 'dektrium\rbac\RbacWebModule',
            'layout' => '@app/admin/views/layouts/main.php',
        ],
        'front' => [
            'class' => 'app\front\Front',
        ],
        'admin' => [
            'class' => 'app\admin\Admin',
            'as access' => [
                'class' => 'yii\filters\AccessControl',
                'only' => ['create', 'update'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'] // all auth users
                    ],
                ]
            ],
        ],
        'gridview' => [
            'class' => '\kartik\grid\Module',
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
