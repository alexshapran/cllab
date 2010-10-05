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
				'actions'=>array(	'bibliography', 'getPropertyAjax', 
									'marketanalysis', 'PrivacyPolicy',
									'appendicies', 'createappend'),
				'roles'=>array('Superadmin', 'Account Admin', 'User'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	public function actionBibliography() {
		if(!$oAppraisal = Appraisal::getModel())
			$this->redirect('/appraisal/edit/');
		
		$oBibliography = $oAppraisal->sdBibliography;
		if(!$oBibliography)
			$oBibliography = $oAppraisal->createRelation('sdBibliography','sd_bibliography_id');

		if(isset($_POST['ReportCoverLetter'])) {
			$oBibliography->attributes = $_POST['ReportCoverLetter'];
			if($oBibliography->save())
				Yii::app()->user->setFlash('success','Cover Letter was successfully saved!');
		}
			
		$this->render('bibliography',array(
			'model'=>$oBibliography,
			'oAppraisal'=>$oAppraisal,
		));
	}
	
	public function actionPrivacyPolicy(){
		if(!$oAppraisal = Appraisal::getModel())
			$this->redirect('/appraisal/edit/');
			
		$oPrivacyPolicy = $oAppraisal->sdPrivacyPolicy;
		if(!$oPrivacyPolicy)
			$oPrivacyPolicy = $oAppraisal->createRelation('sdPrivacyPolicy','sd_privacy_policy_id');

		if(isset($_POST['SdPrivacyPolicy'])) {
			$oPrivacyPolicy->attributes = $_POST['SdPrivacyPolicy'];
			if($oPrivacyPolicy->save())
				Yii::app()->user->setFlash('success','Market Analysis was successfully saved!');
		}
			
		$this->render('privacy_policy',array(
			'model'=>$oPrivacyPolicy,
			'oAppraisal'=>$oAppraisal,
		));
	}
	
	/**
	 * 
	 */
	public function actionAppendicies()
	{
		if(isset($_POST['SdAppendicesList']))
		{
			if(!$oAppraisal = Appraisal::getModel())
				$this->redirect('/appraisal/edit/');
			foreach($oAppraisal->sdAppendices->sdAppendicesLists as $oApp)
			{
					$oApp->text = $_POST['SdAppendicesList'][$oApp->id]['text'];
					
					if(trim($oApp->text) == '')
						$oApp->delete();
					else
						$oApp->save();
			}
		}
		
		if(!$oAppraisal = Appraisal::getModel())
			$this->redirect('/appraisal/edit/');
		$this->render('appendicies', array('oAppend'=>$oAppraisal->sdAppendices, 'oAppraisal'=>$oAppraisal));
	}
	public function actionCreateappend()
	{
		if($_GET['add_id'])
		{
			$model = new SdAppendicesList;
			$model->sd_appendices_id = $_GET['add_id'];
			if($model->save())
				$response['form'] = $this->renderPartial('_appsimple', array('model'=>$model), true, true);
			
			echo CJSON::encode($response);
		}
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
