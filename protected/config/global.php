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
                '<controller:\w+>/<id:\d+>'=>'<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
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
			),
		),
		'booster' => array(
            'class' => 'ext.bootstrap.components.Booster',
            'fontAwesomeCss' => true,
		),
	),

	// using Yii::app()->params['paramName']
	'params'=>array(),
);