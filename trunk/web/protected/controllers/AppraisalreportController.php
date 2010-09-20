<?php

class AppraisalreportController extends Controller
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
				'actions'=>array('coverLetter', 'biohistcontext', 'marketanalysis', 'property'),
				'roles'=>array('Superadmin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	public function actionCoverLetter(){
		$oAppraisal = Appraisal::getModel();
		$oCoverLetter = $oAppraisal->reportCoverLetter;
		if(!$oCoverLetter)
			$oCoverLetter = $oAppraisal->createCoverLetter();

		if(isset($_POST['ReportCoverLetter'])) {
			$oCoverLetter->attributes = $_POST['ReportCoverLetter'];
			if($oCoverLetter->save())
				yii::app()->user->setFlash('success','Cover Letter was successfully saved!');
		}
			
		$this->render('cover_letter',array(
			'model'=>$oCoverLetter,
			'oAppraisal'=>$oAppraisal,
		));
	}
	
	public function actionBiohistcontext(){
		$oAppraisal = Appraisal::getModel();
		$oBiohistContext = $oAppraisal->reportBiohistContext;
		if(!$oBiohistContext)
			$oBiohistContext = $oAppraisal->createBiohistContext();

		if(isset($_POST['ReportBiohistContext'])) {
			$oBiohistContext->attributes = $_POST['ReportBiohistContext'];
			if($oBiohistContext->save())
				yii::app()->user->setFlash('success','Biohist Context was successfully saved!');
		}
			
		$this->render('biohist_context',array(
			'model'=>$oBiohistContext,
			'oAppraisal'=>$oAppraisal,
		));
	}
	
	public function actionMarketanalysis(){
		$oAppraisal = Appraisal::getModel();
		$oMarketAnalysis = $oAppraisal->reportMarketanalysis;
		if(!$oMarketAnalysis)
			$oMarketAnalysis = $oAppraisal->createMarketAnalysis();

		if(isset($_POST['ReportMarketAnalysis'])) {
			$oMarketAnalysis->attributes = $_POST['ReportMarketAnalysis'];
			if($oMarketAnalysis->save())
				yii::app()->user->setFlash('success','Market Analysis was successfully saved!');
		}
			
		$this->render('market_analysis',array(
			'model'=>$oMarketAnalysis,
			'oAppraisal'=>$oAppraisal,
		));
	}
}
