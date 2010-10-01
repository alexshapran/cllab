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
     * @param		none
     * @return		array
     */
    
    protected function allMenu()
    {
    	/**
    	 *	$menu['maincontroller'] = array(
    	 *										array(	'label'=>'',
    	 *												'action'=>'action_name',
    	 *												'controller'=>'controller_name'  -- if not set, uses maincontroller, but not highlighted
    	 *											),
    	 *										array(...)
    	 *										'disableToActions'=>array('index') -- required, dissalow menu to action 'index' in maincontroller
    	 *										'appraisalModel' => true(boolean) -- not required. only when appraisal model->alias must be added to generated url
    	 *									);
    	 */
		$menu['confgeneral'] = array(
									array(	'label'	=>'General Parameters',
//											'controller'=>'confgeneral',
											'action'	=>'update'),
									array(	'label'	=>'Fonts & Images',
//											'controller'=>'confgeneral',
											'action'	=>'fontsandimages'),
									array(	'label' =>'Property Settings',
//											'controller'=>'confgeneral',	
											'action'	=>'propertysettings'),
									array(	'label'	=>'Signed Certification Settings',
//											'controller'=>'confgeneral',
											'action'	=>'signedcertification'),
									array(	'label'	=>'Scope of Work Settings',
//											'controller'=>'confgeneral',
											'action'	=>'scopeofsettings'),
									array(	'label'	=>'Disclaimer Settings',
//											'controller'=>'confgeneral',	
											'action'	=>'disclaimersettings'),
									array(	'label'	=>'Resume Settings',
//											'controller'=>'confgeneral',
											'action'	=>'resumesettings'),
									array(	'label'	=>'Glossary Settings',
//											'controller'=>'confgeneral',
											'action'	=>'glossarysettings'),
									'disabledToActions'	=> array(''));
									
		$menu['appraisal'] = array(
									array(	'label'	=>'Basic Info',
											'action'	=>'edit'),
									array(	'label'	=>'Property',
											'action'	=>'property'),
									array(	'label'	=>'Appraisal Report',
											'controller'=>'appraisalreport',
											'action'=>'coverletter'
											),
									array(	'label'	=>'Supporting Documents',
											'controller'=>'documents',
											'action'=>'bibliography'
											),
									'appraisalModel'=>true,
									'disabledToActions' => array('index'),
									);
		
		$menu['user']	= array(
									array(	'label'	=>'Accounts',
											'action'=>'accounts'),
									array(	'label'	=>'Users',
											'action'=>'users'),
									'disabledToActions'	=> array('')
									);
									
		return $menu;
    }
    
    protected function allSubMenu($controller, $action)
    {
    	$menu = array();
    	
    	/**
    	 * if($controller == 'controller_name' && $action == 'action_name') - submenu must be displayed for this controller & action
    	 * {
    	 * 	$menu = array(	'label'=>'Manage label'
    	 * 					'controller'=>'' -- not required, if absent uses parent controller name
    	 * 					'action'=>'action_name',
    	 * 					'modelAlias'=> false(boolean) -- if Appraisal::model()->alias is required in url)
    	 * }
    	 */
    	if($controller == 'appraisal' && $action == 'property' && $action == 'index' || $controller == 'property')
    	{
    		$menu = array(
    						array(	'label'=>'Manage Property',
    								'controller'=>'appraisal',
    								'action'=>'property'
    							),
    						array(	'label'=> 'Configure Export Order',
    								'controller'=>'property',
    								'action'=>'configureExportOrder'
    							),
    						'modelAlias'=>true //$model->alias
    						);
    	}
    	if($controller == 'appraisalreport')
    	{
    		$menu = array(
			    		array(	'label'=> 'Cover Letter', 
    							'controller'=>'appraisalreport',
    							'action'=>'coverletter'
			    			),
			    		array(	'label'=> 'Bio/Hist.Context',
    							'controller'=> 'appraisalreport',
			    				'action'=>'biohistcontext'
    						),
    					array(	'label'=> 'Market Analysis',
    							'controller'=>'appraisalreport',
    							'action'=>'marketanalysis'
    						),
    					array(	'label'=>'Signed Cert.',
    							'controller'=>'appraisalreport',
    							'action'=>'signedcert'),
    					array(	'label'=>'Resume',
    							'controller'=>'appraisalreport',
    							'action'=>'resume'),
    					array(	'label'=>'Scope of Work',
    							'action'=>'scopeofwork',
    							'controller'=>'appraisalreport'),
    					'modelAlias'=>true //$model->alias
    					);
    	}
    	if($controller == 'documents')
    	{
    		$model = Appraisal::getModel();
    		$menu = array(
    					array(	'label'	=> 	'Supporting Documents',
    							'controller'=>'documents',
    							'action'=>'bibliography',
    						),
    					array(	'label'	=>	'Privacy Policy', 
    							'controller'=>	'documents',
    							'action'=>	'privacypolicy'
    						),
    					array(	'label'	=>	'Appendicies', 
    							'controller'=>	'documents',
    							'action'=>	'appendicies'
    						),
    					'modelAlias'=>true //$model->alias
    					);
    	}
    	
    	return $menu;
    }

    protected function getParentCategory($controller)
    {
    	$allMenu = $this->allMenu();
    	$allControllers = array();
    	foreach ($allMenu as $key => $menu1)
    	{
    		foreach($menu1 as $menu2)
    			if(isset($menu2['controller']) && $menu2['controller'] == $controller)
    				return $key;
    	}
    }
    
    public function generateMenu() 
    {
    	$menu = array();
    	$actionName = $this->getAction()->getId();
    	$defMenu = $this->allMenu();
    	
    		$level1 = $this->id;
    		if($this->getParentCategory($this->id))
    			$level1 = $this->getParentCategory($this->id);
    	
	    	if(isset($defMenu[$level1]['appraisalModel']) && !in_array($actionName, $defMenu[$level1]['disabledToActions']) )
	    					$model = Appraisal::getModel();
	    	
	    	
	    	if( array_key_exists($level1, $defMenu) && !in_array($actionName, $defMenu[$level1]['disabledToActions']))
	    	{
	    		foreach($defMenu[$level1] as $cMenu)
	    			if(isset($cMenu['label']))
	    			{
	    			$menu[] = array('label'	=> $cMenu['label'],
	    							'url'	=> $this->createUrl( ((isset($cMenu['controller']) ? 
	    															$cMenu['controller'] : $level1 /*$this->id*/) 
	    															.'/'.$cMenu['action'])). (isset($model) ? '/'.$model->alias : '' )  ,
	    							'active'=> isset($cMenu['controller']) && $cMenu['controller'] == $this->id ? 1 : 0 );
	    			}
	    	}
    	return $menu;
    }
    
    /**
     * @param		none
     * @return		array
     */
    
    public function generateSubMenu() 
    {
    	$menu = array();
    	$actionName = $this->getAction()->getId();   	
    	$preMenu = $this->allSubMenu($this->id, $actionName);

    	if($preMenu)
    	{
    		$model = null;
    		if(isset($preMenu['modelAlias']) && $preMenu['modelAlias'])
    			$model = Appraisal::getModel();

	    	foreach($preMenu as $cMenu)
	    	{
	    		if(is_array($cMenu))
	    		{
	    			$menu[] = array(	'label'=>$cMenu['label'],
	    								'url'=> $this->createUrl($cMenu['controller'].'/'.$cMenu['action']).
	    												($model ? '/'.$model->alias : ''),
	    								'active'=> 	$this->id == $cMenu['controller'] && 
	    											$actionName == $cMenu['action'] ? 1 : 0
	    						);
	    		}
	    	}
    	}
    	 	
    	return $menu;
    }
}