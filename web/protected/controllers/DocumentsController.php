<?php

class DocumentsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_model;

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('bibliography', 'getPropertyAjax', 'marketanalysis', 'property'),
				'roles'=>array('Superadmin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	public function actionBibliography() {
		$oAppraisal = Appraisal::getModel();
		$oBibliography = $oAppraisal->sdBibliography;
		if(!$oBibliography)
			$oBibliography = $oAppraisal->createBibliography();

		if(isset($_POST['ReportCoverLetter'])) {
			$oBibliography->attributes = $_POST['ReportCoverLetter'];
			if($oBibliography->save())
				yii::app()->user->setFlash('success','Cover Letter was successfully saved!');
		}
			
		$this->render('bibliography',array(
			'model'=>$oBibliography,
			'oAppraisal'=>$oAppraisal,
		));
	}
	
	public function actionGetPropertyAjax() {
		$oAppraisal = Appraisal::getModel();
		$srt = $oAppraisal->getPopulateProperty();
//		$oBibliography = $oAppraisal->sdBibliography;
		echo $srt;
		die;
		
		$this->renderPartial('_tinymce', array('model'=>$oBibliography), false, true);
	}
}
