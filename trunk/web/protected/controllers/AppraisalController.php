<?php

class AppraisalController extends Controller
{
	/**
	 * TODO Check all relations (on delete on update)
	 */
	
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
				'actions'=>array('index', 'view', 'property'),
				'roles'=>array('Superadmin'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('edit','update', 'create'),
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
		$model = $this->loadModel();
		if(!$model)
			$model = new Appraisal;
			
		$oBasicParams = $model->getBasicParamsModel();
		
		if(isset($_POST['Appraisal']) && isset($_POST['BasicReportParameters']))
		{
			$model->attributes = $_POST['Appraisal'];
			$model->date_created = Controller::convertDateFormat($model->date_created);
			
			$oBasicParams->attributes = $_POST['BasicReportParameters'];
			
			if($model->validate() && $oBasicParams->validate()){
				$oBasicParams->prepareDateFormat();
				$oBasicParams->save();
				
				$model->basic_report_parameters_id = $oBasicParams->id;
				if($model->save())
					$this->redirect('/appraisal/edit/' . $model->alias);	
			}
		}
		
		// Prepare all data with we need
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
	
	public function actionProperty()
	{
		if(!$model = Appraisal::getModel())
			$this->redirect('/appraisal/edit/');
		
		$condition = '_object.appraisal_id = ' . $model->id;
		$order = '_object.id';
		$pager = 10;
		
		if(isset($_GET['pager']))
			$pager = $_GET['pager'];
				
		if(isset($_GET['orderBy']))
			$order = $this->setOrder();
		
		if(isset($_GET['f']) && isset($_GET['s']))
			$condition .= $this->createSearchCondition();
		

		$aObjects = new CActiveDataProvider('Object', 
			array('criteria'=>array(
					'alias'=>'_object',
					'condition'=>$condition,
          			'order'=>$order,
          			'with'=>array('category'),
      		),
      			'pagination'=>array(
          			'pageSize'=>$pager,
      		),
      	));
      	
      	if(isset($_GET['exp']) && $_GET['exp'] == 'order') {
      		$this->saveExportOrder($aObjects);
      		yii::app()->user->setFlash('success','Export Order was successfully saved!');
      		$this->redirect('/appraisal/property/' . $model->alias ? $model->alias : $model->id);
      	}	
      	
		$this->render('property',array(
			'aObjects'=>$aObjects,
			'oAppraisal'=>$model
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
			$this->_model = Appraisal::getModel();
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
	
    
    protected function makeSqlPart($field, $sKeyword) {
    	$condition = '`_object`.`' . $field . "` LIKE '" . $sKeyword . "' OR ";
//    	foreach($aKeyword as $word) {
//			$condition .= '`_object`.`' . $field . '` LIKE %' . $word . '% OR ';	
//		}
		return $condition;
    }
    
    protected function setOrder() {
    	switch($_GET['orderBy']) {
			case 'id':
				$order = '`_object`.`id`';
				break;
			case 'cat_location' :
				$order = '`_category`.`name` ASC';
				break;
			case 'loc_category' :
				$order = '`_category`.`name` ASC';
				break;
			default: $order = '';
		}
		return $order;	
    }
    
	/**
	 *  create search condition 
	 */
	protected function createSearchCondition() {
		$sKeyword = Controller::prepareKeyword($_GET['s']);
		$condition = ' AND (';
		$aFields = Object::getSearchField();
		
		// create condition
		if($_GET['f'] == 'all') {
			unset($aFields['all']);
			foreach($aFields as $key => $value) {
				$condition .= $this->makeSqlPart($key, $sKeyword);
			}
		} elseif(array_key_exists($_GET['f'], $aFields)) { // check is get value is correct
			$condition = $this->makeSqlPart($_GET['f'], $sKeyword);
		}
		$condition = substr($condition, 0, -3);
		$condition .= ')';			
		return $condition;
	}
	
	public function saveExportOrder($dataProvider) {
		$aObjects = $dataProvider->getData();
		foreach($aObjects as $i => $oObject) {
			$oObject->export_order = $i+1;
			$oObject->save(false);
		}
		return true;
	}
	
	
}
