<?php
$yii=dirname(__FILE__).'/../yii/framework/yii.php';
$config=dirname(__FILE__).'/protected/config/test.php';

defined('YII_DEBUG') or define('YII_DEBUG',true);
defined('URL') or define('URL','http://158.69.201.210/gddmanager');
define('LANG', 'en');

require_once($yii);
Yii::createWebApplication($config)->run();
