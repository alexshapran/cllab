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
				'actions'=>array('coverLetter', 'biohistcontext', 'signedcert', 'getscopetext',
									'marketanalysis', 'resume', 'property', 'scopeofwork'),
				'actions'=>array('coverLetter', 'biohistcontext', 'marketanalysis', 'resume', 'ResumeDelete'),
				'roles'=>array('Superadmin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	public function actionCoverLetter(){
		if(!$oAppraisal = Appraisal::getModel())
			$this->redirect('/appraisal/edit/');
			
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
		if(!$oAppraisal = Appraisal::getModel())
			$this->redirect('/appraisal/edit/');
			
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
		if(!$oAppraisal = Appraisal::getModel())
			$this->redirect('/appraisal/edit/');
			
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
		if(!$oAppraisal = Appraisal::getModel())
			$this->redirect('/appraisal/edit/');
			
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

	
	public function actionSignedcert()
	{
		$oAppraisal = Appraisal::getModel();
		$appSignedCert = $oAppraisal->appSignedCert;
		if(isset($_POST['AppSignedCert']))
		{
			$appSignedCert->attributes = $_POST['AppSignedCert'];
			if($_POST['value'])
				$appSignedCert->selected_values = serialize(array_keys($_POST['value']));

			$appSignedCert->save();
			$appSignedCert->update();
		}
		

		$criteria = new CDbCriteria();
		$criteria->condition="conf_general_id = ".yii::app()->user->getConfigId();
		$criteria->order='conf_sign_cert_settings_id';
		$criteria->with='confSignCertSettings';

		$confSignText = ConfSignCertText::model()->findAll($criteria);

		$this->render('signedcert', 
						array(	'model'=>$appSignedCert,
								'oAppraisal'=>$oAppraisal,
								'aSignedCertText'=>$confSignText
						));
	}
	
	
	public function actionScopeofwork()
	{
		$oAppraisal = Appraisal::getModel();
		$oScopeOfWork = $oAppraisal->scopeOfWork;
		$aConfScopeOfSettings = ConfGeneral::getScopeOfSettings();
		$oBasicInfo = $oAppraisal->basicReportParameters;
		//$aCategories = ConfGeneral::getConfCategories();

		
		
//		Makes Saving if has $_POST
		if(isset($_POST['AppScopeOfWork']))
		{
			$postedScope = $_POST['AppScopeOfWork'];
			
			$oScopeOfWork->attributes = $postedScope;


//			Saves Problem to Solve
			$problem_to_solve[$postedScope['problem_to_solve']] = $_POST['scopeofworkvalue'];
			$oScopeOfWork->problem_to_solve = serialize($problem_to_solve);

			
//			Saves Intended User(s)
			$int_user[$postedScope['int_users']] = $_POST['intusers'];
			$oScopeOfWork->int_users = serialize($int_user);
			
//			Saves Approach to Value
			$app_to_value[$postedScope['app_to_value']] = $_POST['app_to_value'];
			$oScopeOfWork->app_to_value = serialize($app_to_value);
			
//			Saves Marked Examined
			$mark_exam[$postedScope['mark_exam']] = $_POST['mark_exam'];
			$oScopeOfWork->mark_exam = serialize($mark_exam);
			
			
//			Save Assignment Conditions
			if(isset($_POST['ConfScopeOfValue']['ass_cond']))
			{
				$array = $_POST['ConfScopeOfValue']['ass_cond'];
				$selected = array();
				foreach($array as $key=>$el)
					if($el['value']=='1')
						$selected[] = $key;
						
				$oScopeOfWork->ass_cond = implode(', ', $selected);
			}


//			Save Extent of Physical Inspection
			if(isset($_POST['ConfScopeOfValue']['ext_of_phys_insp']))
			{
				$array = $_POST['ConfScopeOfValue']['ext_of_phys_insp'];
				$selected = array();
				foreach($array as $key=>$el)
					if($el['value']=='1')
						$selected[] = $key;
			
				$oScopeOfWork->ext_of_phys_insp = implode(', ', $selected);
			}
			
			
//			Save Photography
			if(isset($_POST['ConfScopeOfValue']['photography']))
			{
				$array = $_POST['ConfScopeOfValue']['photography'];
				$selected = array();
				foreach($array as $key=>$el)
					if($el['value']=='1')
						$selected[] = $key;
			
				$oScopeOfWork->photography = implode(', ', $selected);
			}
			
			
//			Save USPAP Compilancy
//			$uspap_comp[$postedScope['uspap_comp']] = $_POST['uspap_comp'];
//			$oScopeOfWork->uspap_comp = serialize($uspap_comp);
			
			
//			Save changes
			$oScopeOfWork->save();
			$oScopeOfWork->update();
		}
		

//		Categories of item examinated
		if(!$oScopeOfWork->categories)
		{
			$sql = "SELECT * FROM conf_category WHERE conf_gen_id = ".yii::app()->user->getConfigId();
			$connection = yii::app()->db;
			$command = $connection->createCommand($sql);
			$aCategories = $command->queryColumn();
			$oScopeOfWork->categories = implode('; ', $aCategories);
		}
		
		
		if(!$oScopeOfWork->client)
			$oScopeOfWork->client = $oBasicInfo->client_name;
		
		if(!$oScopeOfWork->owner)
			$oScopeOfWork->owner = $oBasicInfo->client_name;
		
		
//		Get from Basic info unchanged field types_of_value_id

		if($oBasicInfo->types_of_value_id)
		{
			$oValue = ConfTypeOfValue::getObjectById($oBasicInfo->types_of_value_id);
			if($oValue)
			{
				$oScopeOfWork->type_of_value = $oValue->name;
				$oScopeOfWork->def_of_value = $oValue->definition;
				$oScopeOfWork->source_of_def_value = $oValue->source;
			}
		}
		
		
		if($oBasicInfo->effective_valuation_date)
			$oScopeOfWork->eff_val_date = $oBasicInfo->effective_valuation_date;
		

		if(!$oScopeOfWork->meth_of_research && $aConfScopeOfSettings[7]->confScopeOfValues[0])
			$oScopeOfWork->meth_of_research = $aConfScopeOfSettings[7]->confScopeOfValues[0]['value'];
			
			
		$oScopeOfWork->save();
		$oScopeOfWork->update();
		
//		If there is no scope of work - create it
//		if(!$oScopeOfWork)
//		{
//			$oScopeOfWork = new AppScopeOfWork();
//			$oScopeOfWork->save(); 
//			$oAppraisal->app_scope_of_work_id = $oScopeOfWork->id;
//			$oAppraisal->save();
//		}
		
//		if(!$oScopeOfWork->problem_to_solve)
//		{
//			$oScopeOfWork->problem_to_solve = 
//		}

		
		$this->render('scopeofwork', array(	'oAppraisal'=>$oAppraisal,
													'oScopeOfWork'=>$oScopeOfWork,
													'aConfScopeOfSettings'=>$aConfScopeOfSettings));
		
		 
	}
	
	
	public function actionGetscopetext()
	{
		if($_GET['sett_id'])
		{
			$oAppraisal = Appraisal::getModel();
			$oScopeOfWork = $oAppraisal->scopeOfWork;

			switch($_GET['type'])
			{
				case 'problem': $string_from_db = $oScopeOfWork->problem_to_solve; break;
				case 'int_users': $string_from_db = $oScopeOfWork->int_users; break;
				case 'app_to_value': $string_from_db = $oScopeOfWork->app_to_value; break;
				case 'mark_exam': $string_from_db = $oScopeOfWork->mark_exam; break;
//				case 'uspap_comp': $string_from_db = $oScopeOfWork->uspap_comp; break;
			}
			
			$key = array_keys(unserialize($string_from_db));
			if( $key[0] != $_GET['sett_id'])
			{
				$oScopeValue = ConfScopeOfValue::model()->findByPk($_GET['sett_id']);
				$send_value = $oScopeValue->value;
			}
			else
			{
				$problem = unserialize($string_from_db);
				$send_value = current($problem);
			}
		}
		if(!isset($send_value))
			$send_value = 'Error, please, contact service provider.';

		echo CJSON::encode($send_value);
	}
	
	public function actionResumeDelete() {
		if(isset($_GET['resume_id'])) {
			ReportResumeData::model()->findByPk((int)$_GET['resume_id'])->delete();	
		}
	}
}
