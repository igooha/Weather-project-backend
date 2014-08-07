<?php

return array(
    'basePath'   => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name'       => 'txtU',

    'preload'    => array('log'),

    'import'     => array(
        'application.models.*',
        'application.components.*',
    ),

    'components' => array(
        'cache'=>array(
            'class'=>'system.caching.CFileCache',
        ),
        'urlManager'   => array(
            'showScriptName' => false,
            'urlFormat'      => 'path',
            'rules'          => array(
                array(
                    'class'        => 'application.components.MainUrlRule',
                    'connectionID' => 'db',
                ),
                '<controller:\w+>/<id:\d+>'              => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>'          => '<controller>/<action>',
            ),
        ),
        'defaultController' => 'site',
        'db'           => array(
            'connectionString'   => '',
            'username' => '',
            'password' => '',
            'charset' => 'utf8',
            'tablePrefix' => '',
        ),
        'errorHandler' => array(
            'errorAction' => 'site/error',
        ),
        'log'          => array(
            'class'  => 'CLogRouter',
            'routes' => array(
                array(
                    'class'  => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
            ),
        ),
    ),
    'language'   => 'ru',
);
