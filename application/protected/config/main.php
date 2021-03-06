<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'ONS Guidebook',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.controllers.*',
		'application.components.*',
		'application.extensions.ONS.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'ons',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
			'loginUrl'=>array('site/login'),
      'class' => 'WebUser',
		),
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(

        'logout' => 'login/logout',
        //'<action:\w+>'=>'site/<action>',
        
        // not sure these are used for anything (they may be default routes)
        '<controller:\w+>/<id:\d+>'=>'<controller>/view',
        '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',

        // supporting the renderType postfix
        '<controller:\w+>/<action:\w+>\.<renderType:\w+>'=>
            '<controller>/<action>',
        '<module:\w+>/<controller:\w+>/<action:\w+>\.<renderType:\w+>' => 
            '<module>/<controller>/<action>',
        
        // default routes???
        '<controller:\w+>/<action:\w+>'=>array(
          '<controller>/<action>',
          //'defaultParams'=>array('renderType'=>'full')
        ),

    )
		),
		
		
		'db'=>array(
			'class'=>'application.extensions.PHPPDO.CPdoDbConnection',
      'pdoClass' => 'PHPPDO',
			'connectionString' => 'mysql:localhost;dbname=ons',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'marin',
			'charset' => 'utf8',
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'enabled' => true,
					'levels'=>'info, trace, error, warning',
				),
				array(
					'class'=>'CWebLogRoute',
					'enabled' => true,
					'levels'=>'info, trace, error, warning',
				),
				array(
					'class'=>'CProfileLogRoute',
					'enabled' => true,
				)
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);
