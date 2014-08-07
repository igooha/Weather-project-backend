<?php

header('Content-Type: text/html; charset=utf-8');
mb_language('uni');
mb_internal_encoding('UTF-8');
setlocale(LC_ALL, 'ru_RU.UTF-8');

if($_SERVER['HTTP_HOST'] != 'tut_domen_prodaction')
{
    $yii = '/yii1.1.15/framework/yii.php';
    $config = dirname(__FILE__).'/protected/config/dev.php';

    defined('YII_DEBUG') or define('YII_DEBUG',true);
    defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);
}
else
{
    $yii='/home/system/yii1.1.15/framework/yii.php';
    $config = dirname(__FILE__).'/protected/config/production.php';

    defined('YII_DEBUG') or define('YII_DEBUG',false);
    defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);
}

require_once($yii);

Yii::createWebApplication($config)->run();