<?php
$yii    = dirname(__FILE__).'/../yii/framework/yii.php';
$config = dirname(__FILE__).'/protected/config/main.php';

defined('YII_DEBUG') or define('YII_DEBUG',true);
if (defined('YII_DEBUG')){
    defined('URL') or define('URL','https://dev.gddmanager.com');
    defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);
}
defined('URL') or define('URL','https://gddmanager.com');

if (!defined('LANG')){
    if (isset($_GET['lang'])){
        $lang = $_GET['lang'];
    }
    else{
        if (!empty($_SERVER['HTTP_ACCEPT_LANGUAGE'])){
            $lang = substr($_SERVER["HTTP_ACCEPT_LANGUAGE"],0,2);
        }
        else{
            $lang = 'en';
        }
    }
    
    // Limit languages
    if($lang != 'es' and $lang != 'en'){
        $lang = 'en';
    }
    define('LANG',$lang);
}

require_once($yii);
Yii::createWebApplication($config)->run();
?>