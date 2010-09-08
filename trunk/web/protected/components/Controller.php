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
}