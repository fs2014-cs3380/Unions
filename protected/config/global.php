<?php
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Missouri Student Unions',

	// preloading 'log' component
	'preload'=>array(
		'log',
        php_sapi_name() == 'cli' ? '' : 'booster',
	),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
 		'application.components.*',
        /*'application.components.mobiledetect.*',
        'application.components.weather.*',*/
	),

	'modules'=>array(
		'gii'=>array(),
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
		'urlManager'=>array(
			'urlFormat'=>'path',
            'showScriptName'=>false,
			'rules'=>array(
                'lostandfound/'=>'Item/',
                'lostandfound/<id:\d+>'=>'Item/view',
                'lostandfound/<action:\w+>/<id:\d+>'=>'Item/<action>',
                'lostandfound/<action:\w+>'=>'Item/<action>',
                '<controller:\w+>/<id:\d+>'=>'<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),

        'db_ems'=>array(
            'connectionString' => 'sqlsrv:server=maverick.col.missouri.edu;Database=EMS_Staging',
            'username' => 'unions',
            'password' => 'iVIOwk*ivx',
            'charset' => 'utf8',
            'class' => 'CDbConnection'
        ),

		'errorHandler'=>array(
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
                array(
                    'class'=>'CFileLogRoute',
                    'levels'=>'log, trace',
                    'categories' => 'system.db.CDbCommand',
                    'logFile' => 'db.log',
                ),
			),
		),
		'booster' => array(
            'class' => 'ext.bootstrap.components.Booster',
            'fontAwesomeCss' => true,
		),
	),

	// using Yii::app()->params['paramName']
	'params'=>array(
        'ldap' => array(
            'basedn'    => 'dc=col, dc=missouri, dc=edu',
            'host'      => 'ldap.missouri.edu',
            'port'		=> '3268' //Will allow every domain in the forest
        ),
    ),
);