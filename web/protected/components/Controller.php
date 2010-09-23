<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();


	public function init() {

		if (Yii::app()->request->isAjaxRequest == false) {
			Yii::app()->getClientScript()->registerCoreScript('jquery');
		} else {
			Yii::app()->clientscript->scriptMap['jquery.js'] = false;
			Yii::app()->clientscript->scriptMap['jquery.min.js'] = false;
		}
	}
	
	/**
	 * static method create alias
	 * @param $str string
	 * @return sting
	 */
	public static function createAlias($str) {
		$str = preg_replace('#[^a-z0-9\-]+#is', '-', $str);
        $str = preg_replace('#\-+#is', '-', $str);
        $str = preg_replace('#^\-([a-z0-9\-]+)#is', '$1', $str);
		$str = preg_replace('#([a-z0-9\-]+)\-$#is', '$1', $str);
		return $str;	
	}
	
	/**
	 * convert date
	 * @param $str date
	 * @param $sFormat defualt Y-m-d
	 */
	public static function convertDateFormat($str, $sFormat = 'Y-m-d') {
		$date = date($sFormat, strtotime($str));
		return $date;
	}
	
	/*
     *  Delete unnecessary sumbols
     *  @param string from Search Form
     *  @return array
     */
    public static function prepareKeyword($str) { 
        $str = strip_tags($str);
        $str = preg_replace('#([a-zа-я0-9\.]+)#isu', '%$1%', $str);
//    	preg_match_all("/\w+/", $str, $arr);
//    	$arr = array_splice($arr[0], 0, 4); // no more than five words

    	return $str;
    }
    
    /**
     * replace '_' on ' ', make firt letters (after space) upper
     * @author	Malichenko Oleg [e-mail : aluminium1989@hotmail.com]
     * @param		string
     * @return		string
     */
    
    public function nameFromAttribute($str) 
    {
    	$patterns = array("/_/", "/^([a-z])/e", "/ ([a-z])/e");
    	$replacements = array(" ", "strtoupper('\\1')", "' '.strtoupper('\\1')");
    	return preg_replace($patterns, $replacements, $str);
    }
    

    /** add the same $crit_string into $criteria to array of $fields
     * @author	Malichenko Oleg [e-mail : aluminium1989@hotmail.com]
     * @param		mixed $fields, CDbCriteria $criteria
     * @return		CDbCriteria
     */
    
    public static function addWhereToCriteria($crit_str, $fields, $criteria)
    {
    	$crit_str = trim($crit_str);
    	$crit_str = preg_replace("/[\s]+/", " ", $crit_str ); // обрезаем лишние пробелы
    	$crit_str = preg_replace("/([\S]+)[\s]/e", "'\\1'.'% %'", $crit_str); // вставляем проценты между пробелами
    	$crit_str = '"%'.$crit_str.'%"';
    	
    	$criteria->condition.=' AND';
    	
    	if(!is_array($fields))
    	{
    		$criteria->condition.=' '.$fields.' LIKE '.$crit_str;
    	}
    	else
    	{
    		foreach($fields as $key=>$field)
    		{
    			if($key!=0)
    				$criteria->condition.=' OR '.$field.' LIKE '.$crit_str;
    			else
    				$criteria->condition.=' ('.$field.' LIKE '.$crit_str;
    		}
    		$criteria->condition.=')';
    	}
    	
    	return $criteria;
    }
    
    
    /**
     * @author	Malichenko Oleg [e-mail : aluminium1989@hotmail.com]
     * @param		none
     * @return		array
     */
    
    protected function allMenu()
    {
//    	$menu = array
//    	(
//    		'appraisal'		=>	array(),
//    		'client'		=>	array(),
//    		'confgeneral'	=>	array()
//    	)
		$menu['confgeneral'] = array(	'update',
										'fontsandimages',
										'propertysettings',
										'signedcertification',
										'scopeofsettings',
										'disclaimersettings',
										'resumesettings',
										'glossarysettings');
    }
    
    public function generateMenu() 
    {
    	$menu = array();
    	$actionName = $this->getAction()->getId();

    	if(in_array($this->id, array('confgeneral')))
    	{
    		$menu = array(	
    			array(	'label'=>'General Parameters',
    					'url'=>Yii::app()->controller->createUrl('/confgeneral/update/'),
    					'active'=> $actionName == 'update' ? 1 : 0 ),
    			array(	'label'=>'Fonts & Images',
    					'url'=>Yii::app()->controller->createUrl('/confgeneral/fontsandimages'),
    					'active'=> $actionName == 'fontsandimages' ? 1 : 0),
    			array(  'label'=>'Property Settings',
    					'url'=>Yii::app()->controller->createUrl('/confgeneral/propertysettings'),
    					'active'=> $actionName == 'propertysettings' ? 1 : 0),
				array( 	'label'=>'Signed Certification Settings', 
						'url' => Yii::app()->controller->createUrl('/confgeneral/signedcertification'),
						'active'=> $actionName == 'signedcertification' ? 1 : 0),
				array(	'label'=>'Scope of Work Settings', 
						'url'=>Yii::app()->controller->createUrl('/confgeneral/scopeofsettings'),
						'active'=> $actionName == 'scopeofsettings' ? 1 : 0),
				array(	'label'=>'Disclaimer Settings', 
						'url'=>Yii::app()->controller->createUrl('/confgeneral/disclaimersettings'),
						'active'=> $actionName == 'disclaimersettings' ? 1 : 0),
				array(  'label'=>'Resume Settings', 
						'url'=>Yii::app()->controller->createUrl('/confgeneral/resumesettings'),
						'active'=> $actionName == 'resumesettings' ? 1 : 0),
				array(	'label'=>'Glossary Settings', 
						'url'=>Yii::app()->controller->createUrl('/confgeneral/glossarysettings'),
						'active'=> $actionName == 'glossarysettings' ? 1 : 0)
    			);
    	}
    	elseif ( in_array($this->id, array('appraisal', 'documents', 'property', 'appraisalreport')) && $actionName != 'index')
    	{
    		$model = Appraisal::getModel();
    		$menu = array(
    					array(	'label'=>'Basic Info',
    							'url'=> $this->createUrl('/appraisal/edit/' . $model->alias),
    							'active' => $actionName == 'edit' ? 1 : 0
    					),
    					array(	'label'=> 'Property',
			    				'url'=> $this->createUrl('/appraisal/property/' . $model->alias),
    							'active' => in_array($actionName, array('property', '')) == 'property' ? 1 : 0
    					),
    					array(	'label'=> 'Appraisal Report', 
    							'url'=> $this->createUrl('/appraisalreport/coverletter/' . $model->alias),
    							'active' => $actionName == 'coverletter' ? 1 : 0
    					),
    					array(	'label'	=> 'Supporting Documents', 
    							'url'	=> $this->createUrl('/documents/bibliography/' . $model->alias),
    							'active' => $actionName == 'bibliography' ? 1 : 0
    					),
    		);
    	}
    	elseif(in_array($this->id, array('user')))
    	{
    		$menu = array(
    					array(	'label'=>'Accounts', 
    							'url'=> $this->createUrl('/user/accounts')),
    					array(	'label'=>'Users',
    							'url'=>	$this->createUrl('/user/users')));
    	}
    	;

    	return $menu;
    }
    
    /**
     * @author	Malichenko Oleg [e-mail : aluminium1989@hotmail.com]
     * @param		none
     * @return		array
     */
    
    public function generateSubMenu() 
    {
    	$menu = array();
    	$actionName = $this->getAction()->getId();
    	if($this->id == 'appraisal' && $actionName == 'property' || $this->id == 'property')
    	{
    		$model = Appraisal::getModel();
    		$menu = array(
    					array(	'label'=> 'Manage property',
			    				'url'=> Yii::app()->controller->createUrl('/appraisal/property/' . $model->alias)
    					),
    					array(	'label'=> 'Configure Export Order',
			    				'url'=> Yii::app()->controller->createUrl('/property/configureExportOrder' . $model->alias)
    					),
    				);
    	}elseif($this->id == 'documents')
    	{
    		$model = Appraisal::getModel();
    		$menu = array(
    					array(	'label'	=> 	'Supporting Documents', 
    							'url'	=> 	Yii::app()->createUrl('/documents/bibliography/' . $model->alias),
    							'active'=>	$actionName == 'bibliography' ? 1 : 0
    						),
    					array(	'label'	=>	'Privacy Policy', 
    							'url'	=>	Yii::app()->createUrl('/documents/privacypolicy/' . $model->alias),
    							'active'=>	$actionName == 'privacypolicy' ? 1 : 0
    						),
    					array(	'label'	=>	'Appendicies', 
    							'url'	=>	Yii::app()->createUrl('/documents/appendicies/' . $model->alias),
    							'active'=>	$actionName == 'appendicies' ? 1 : 0
    						)
    					);
    	}elseif($this->id == 'appraisalreport')
    	{
    		$model = Appraisal::getModel();
    		$menu = array(
			    		array(	'label'=> 'Cover Letter', 
    							'url'=> $this->createUrl('/appraisalreport/coverletter/' . $model->alias),
			    				'active'=>	$actionName == 'coverletter' ? 1 : 0
			    			),
			    		array(	'label'=> 'Bio/Hist.Context',
    							'url'=> $this->createUrl('/appraisalreport/biohistcontext/' . $model->alias),
			    				'active'=>	$actionName == 'biohistcontext' ? 1 : 0
    						),
    					);
    	}
    	 	
    	
    	return $menu;
    }
}