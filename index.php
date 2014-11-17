<?php
defined('YII_INCLUDE_PATH') or define('YII_INCLUDE_PATH', $_SERVER['YII_INCLUDE_PATH']);
defined('APPLICATION_ENV') or define('APPLICATION_ENV', $_SERVER['APPLICATION_ENV']);

// change the following paths if necessary
//$yii=YII_INCLUDE_PATH;
$yii='/Applications/XAMPP/xamppfiles/yii/framework/yiic.php';
$isDev = APPLICATION_ENV == "development" ? true : false;
$configDir=dirname(__FILE__).'/protected/config/';
$configFile = $isDev ? 'development.php' : 'production.php';

// Server specific settings
$configServer = include $configDir.'/'.$configFile;
// Global application settings
$configGlobal = include $configDir.'/global.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG', $isDev);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($yii);
$config = CMap::mergeArray($configGlobal, $configServer);
Yii::createWebApplication($config)->run();