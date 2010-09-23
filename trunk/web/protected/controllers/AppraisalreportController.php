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
				'actions'=>array('coverLetter', 'biohistcontext', 'marketanalysis', 'resume', 'property'),
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
			$oCoverLetter = $oAppraisal->createRelation('reportCoverLetter', 'report_cover_letter_id');

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
			$oBiohistContext = $oAppraisal->createRelation('reportBiohistContext', 'report_biohist_context_id');

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
			$oMarketAnalysis = $oAppraisal->createRelation('reportMarketanalysis', 'report_market_analysis_id');

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
	
	public function actionResume() {
		$oAppraisal = Appraisal::getModel();
		$oResume = $oAppraisal->reportResume;
		
		if(!$oResume)
			$oResume = $oAppraisal->createRelation('reportResume', 'report_resume_id');
			
		$aResumes = $oResume->getResumeData();
		
		if(isset($_POST['ReportResume'])) {
			$oResume->attributes = $_POST['ReportResume'];
			if($oResume->save()) {
				if(isset($_POST['Resume']) && $arr = $_POST['Resume']) {
					foreach($arr as $id =>$text) {
						ReportResumeData::saveDatat($id, $oResume->id, $text);	
					}
				}
				if(isset($_POST['New_resume']) && $arr = $_POST['New_resume']) {
					foreach($arr as $id =>$text) {
						ReportResumeData::saveDatat(false, $oResume->id, $text);	
					}
				}
				yii::app()->user->setFlash('success','Resume was successfully saved!');
			}
		}
		
		$this->render('resume',array(
			'model'=>$oResume,
			'aResumes'=>$aResumes,
			'oAppraisal'=>$oAppraisal,
		));
	}
}
