<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Collectors Lab Appraisal Manager',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	// application components
	'components'=>array(
		// AUTHORIZATION MANAGER
		'authManager' => array(
		    // ����� ������������ ���� �������� �����������
		    'class' => 'PhpAuthManager',
		    // ���� �� ���������. User
		    'defaultRoles' => array('User'),
),
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
			'class'=>'WebUser',
		),
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:[a-zA-Z0-9-\.]+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		
		/* 'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		), */
		// uncomment the following to use a MySQL database
		
//		DATABASE CONFIG
 
//		'db'=>array(
//			'connectionString' => 'mysql:host=piogroup.net;dbname=piogroup_clab',
//			'emulatePrepare' => true,
//			'username' => 'piogroup_cluser',
//			'password' => 'nFtGQGLd9E32',
//			'charset' => 'utf8',
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=cllab',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8'
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
					'levels'=>'error, warning',
		        	'logPath'	=> dirname('_FILE_').'../logs',
		        	'logFile'	=>'error_log.txt',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),
	
	// DATABASE CONFIG END

	// ALLOW GII
	
    'modules'=>array(
        'gii'=>array(
            'class'=>'system.gii.GiiModule',
            'password'=>'root116',
        ),
    ), 
        
	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
    	'fontSize'=>array(
    					'4'=>4,
    					'5'=>5,
    					'6'=>6,
    					'7'=>7,
    					'8'=>8,
    					'9'=>9,
    					'10'=>10,
    					'11'=>11,
    					'12'=>12,
    					'13'=>13,
    					'14'=>14,
    					'15'=>15,
    					'16'=>16,
    					'17'=>17,
    					'18'=>18,
    					'19'=>19,
    					'20'=>20,
    					'21'=>21,
					    '22'=>22,
					    '23'=>23,
					    '24'=>24),
    	'fontTypes'=>
    array(
		'Arial'=>'Arial',
		'Arial Black'=>'Arial Black',
		'Book Antiqua'=>'Book Antiqua',
		'Comic Sans MS'=>'Comic Sans MS',
		'Courier New'=>'Courier New',
		'Georgia'=>'Georgia',
		'Impact'=>'Impact',
		'Symbol'=>'Symbol',
		'Tahoma'=>'Tahoma',
		'Terminal'=>'Terminal',
		'Times New Roman'=>'Times New Roman',
		'Trebuchet MS'=>'Trebuchet MS',
		'Verdana'=>'Verdana',
		'Webdings'=>'Webdings'),
    
    // �������� �������
    	'attributeExportOrder'=>
    array( 	'title' => 'Title', 
    		'value' => 'Value', 
    		'maker_artist' => 'Artist', 
    		'description' => 'Description', 
    		'medium' => 'Medium', 
			'dimensions' =>	'Dimensions', 
    		'date_period' => 'Data/Period', 
    		'markings' => 'Markings',
    		'condition' => 'Condition',
    		'provenance' => 'Provenance',
    		'exhibited' => 'Exhibited',
    		'literature' => 'Literature',
    		'acquisition_cost' => 'Acquisition Cost',
    		'acquisition_date' => 'Acquisition Date',
    		'acquisition_source' => 'Acquisition Source',
    		'notes' => 'Notes',
    		'comparables' => 'Comparables'),
    	
    	'defConfGen'=>array(
 'company_name'=> 'Company name',
 'phone' => 'Phone',
 'email' => 'your@email.com',
 'website' => 'www.yourwebsite.com',
 'address' => 'Address',
 'city' => 'City',
 'state' => 'State',
 'zip' => 'Zip',
 'default_currency' => '$',
 'header' => '{client_name}, {city} - Effective Date: {effective_date} "{value_type}" {appraisal_purpose}, {report_type} Appraisal Report Page {page_count_of} ',
 'footer' => '{comp_name} : {comp_address}, {comp_city}, {comp_state}, {comp_zip}, {comp_phone}, {comp_email}',
 'privacy_policy' => '',
 'global_font_type' => 'Arial'
    ),
    
    	'defConfFont'=>array(
'Header'=>array('section'=>'Header',
    			'size'=>'9',
    			'bold'=>'0',
    			'italics'=>'0',
    			'underline'=>'0'
    			),
'Footer'=>array('section'=>'Footer',
    			'size'=>'9',
    			'bold'=>'0',
    			'italics'=>'0',
    			'underline'=>'0'
    			),
'Section Titles'=>array('section'=>'Section Titles',
    			'size'=>'9',
    			'bold'=>'0',
    			'italics'=>'0',
    			'underline'=>'0'
    			),
'Section Headlines'=>array('section'=>'Section Headlines',
    			'size'=>'14',
    			'bold'=>'0',
    			'italics'=>'0',
    			'underline'=>'0'
    			),
'Section Content'=>array('section'=>'Section Content',
    			'size'=>'12',
    			'bold'=>'0',
    			'italics'=>'0',
    			'underline'=>'0'
    			),
    						),
    			
    	'defImageSize'=>array(

'Small' => array(	'size'=>'Small',
    				'max_height'=>'40',
    				'max_width'=>'40'),
    						
'Medium' => array(	'size'=>'Medium',
    				'max_height'=>'60',
    				'max_width'=>'60'),
    						
'Large' => array(	'size'=>'Large',
    				'max_height'=>'100',
    				'max_width'=>'100')
    						),

    						
// Don't change the ORDER of this array!
// If category need to be added, add it to the end of array.
    						
		'defScopeOfSettings'=>array(

'Problem to Solve' => array('name'=>'Problem to Solve',
							'allow_add_more' => '1',
							'add_has_name' => '1'),

'Intended User' => array(	'name'=>'Intended User',
							'allow_add_more' => '1',
							'add_has_name' => '1'),
    						
'Approach to Value' => array(	'name'=>'Approach to Value',
								'allow_add_more' => '1',
								'add_has_name' => '1'),

'Market Examined' => array(	'name'=>'Market Examined',
								'allow_add_more' => '1',
								'add_has_name' => '1'),    						
    						
'Type of Appraisal Report' => array('name'=>'Type of Appraisal Report',
									'allow_add_more' => '0',
									'add_has_name' => '0'),

'Assignment Conditions' => array('name'=>'Assignment Conditions',
									'allow_add_more' => '1',
									'add_has_name' => '0'),

'Extent of Physical Inspection' => array('name'=>'Extent of Physical Inspection',
									'allow_add_more' => '1',
									'add_has_name' => '0'),

'Method of Research' => array('name'=>'Method of Research',
									'allow_add_more' => '0',
									'add_has_name' => '0'),    						

'Photography' => array('name'=>'Photography',
									'allow_add_more' => '1',
									'add_has_name' => '0'),

'USPAP Compilancy' => array('name'=>'USPAP Compilancy',
									'allow_add_more' => '0',
									'add_has_name' => '0'),
    						
'Assumptions' => array('name'=>'Assumptions',
									'allow_add_more' => '1',
									'add_has_name' => '0',
    								'num_of_def_fields'=>'1'),

'Extraordinary Assumptions' => array('name'=>'Extraordinary Assumptions',
									'allow_add_more' => '1',
									'add_has_name' => '0',
    								'num_of_def_fields'=>'2'),    						

'Hypothetical Conditions' => array('name'=>'Hypothetical Conditions',
									'allow_add_more' => '1',
									'add_has_name' => '0',
    								'num_of_def_fields'=>'2'), 
    						),

    	'Disclaimer Settings'=>array(	'General Disclaimers & Limiting Conditions', 
    									'Additional Limiting Conditions', 
    									'Restricted Use Disclaimer'),
	),
);