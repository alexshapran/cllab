<?php

class AppraisalController extends Controller
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
				'actions'=>array('index', 'view'),
				'roles'=>array('Superadmin'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('edit','update'),
				'roles'=>array('Superadmin'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 */
	public function actionView()
	{
		$this->render('view',array(
			'model'=>$this->loadModel(),
		));
	}

//	/**
//	 * Creates a new model.
//	 * If creation is successful, the browser will be redirected to the 'view' page.
//	 */
	public function actionEdit()
	{
		$model=$this->loadModel();
		$oBasicParams = $model->getBasicParamsModel();
		
		if(isset($_POST['Appraisal']) && isset($_POST['BasicReportParameters']))
		{
			$model->attributes = $_POST['Appraisal'];

			$oBasicParams->attributes = $_POST['BasicReportParameters'];
			
			if($model->validate() && $oBasicParams->validate()){
				$oBasicParams->prepareDateFormat();
				$oBasicParams->save();
				
				$model->basic_report_parameters_id = $oBasicParams->id;
				if($model->save())
					$this->redirect('/appraisal');	
			}
		}
		
		// Prepare all data with we need
		$aClient = Client::model()->findAll();
		$oClient = new Client;
		$aReportTypes = TypesOfReport::model()->findAll();
		$aValueTypes = ConfTypeOfValue::model()->findAll();
		$aPurpose = ConfPurpose::model()->findAll();
		$aImagesSize = Yii::app()->params['aImagesSize'];
		$aDateTypes = Yii::app()->params['aDateTypes'];
		
		$aReportSections = $oBasicParams->getOrderList();
		
//		var_dump($aReportSections);
//		die;
		
		$this->render('edit',array(
			'model'=>$model,
			'aClient'=>$aClient,
			'oClient'=>$oClient,
			'oBasicParams'=>$oBasicParams,
			'aPurpose'=>$aPurpose,
			'aValueTypes'=>$aValueTypes,
			'aReportTypes'=>$aReportTypes,
			'aImagesSize'=>$aImagesSize,
			'aDateTypes'=>$aDateTypes,
			'aReportSections'=>$aReportSections,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionUpdate()
	{
		
		$model=$this->loadModel();
		$aClient = Client::model()->findAll();
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Appraisal']))
		{
			$model->attributes=$_POST['Appraisal'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}
var_dump($aClient);
die;
		$this->render('update',array(
			'model'=>$model,
			'aClient'=>$aClient,
		));
	}
	
//	public function actionEdit()
//	{
//		$model=$this->loadModel();
//		$aClient = Client::model()->findAll();
//		// Uncomment the following line if AJAX validation is needed
//		// $this->performAjaxValidation($model);
//
//		if(isset($_POST['Appraisal']))
//		{
//			$model->attributes=$_POST['Appraisal'];
//			if($model->save())
//				$this->redirect(array('view','id'=>$model->id));
//		}
//var_dump($aClient);
//die;
//		$this->render('update',array(
//			'model'=>$model,
//			'aClient'=>$aClient,
//		));
//	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 */
	public function actionDelete()
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel()->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new Appraisal('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Appraisal']))
			$model->attributes=$_GET['Appraisal'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Appraisal('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Appraisal']))
			$model->attributes=$_GET['Appraisal'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 */
	public function loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id']))
				$this->_model=Appraisal::model()->findbyPk($_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='appraisal-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}