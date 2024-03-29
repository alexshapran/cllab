<?php

class ClientController extends Controller
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
				'actions'=>array('ajaxAdd', 'index', 'update', 'create', 'delete'),
				'roles'=>array('Superadmin'),
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

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Client;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Client']))
		{
			$model->attributes=$_POST['Client'];
			$model->account_id = yii::app()->user->getModel()->account_id;
			if($model->save())
				$this->redirect($this->createUrl('/client'));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionUpdate()
	{
		$model=$this->loadModel();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Client']))
		{
//		echo '<pre>';
//		var_dump($_POST['Client']);
//		die();
		
			$model->attributes = $_POST['Client'];
			$model->date_added = Controller::convertDateFormat($_POST['Client']['date_added']);
			if($model->save())
				$this->redirect($this->createUrl('/client'));
		}

		$this->render('update',array(
			'model'=>$model,
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
		$criteria = new CDbCriteria;
		$user = yii::app()->user->getModel();
		
		$criteria->condition = 'account_id = '.$user->account_id;
		
		if(isset($_POST['search_text']) && $_POST['search_text'])
		{
			if($_POST['search_field'])
			{
				$criteria = Controller::addWhereToCriteria(	$_POST['search_text'], 
															$_POST['search_field'], 
															$criteria);
			}
			else
			{
				$criteria = Controller::addWhereToCriteria(	$_POST['search_text'], 
															array_keys(Client::getAllAttributes()), 
															$criteria);
			}
			
		}
		
		$dataProvider=new CActiveDataProvider('Client', array('criteria'=>$criteria));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Client('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Client']))
			$model->attributes=$_GET['Client'];

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
				$this->_model=Client::model()->findbyPk($_GET['id']);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='client-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	} 
	
	/**
	 * add new client, popup 
	 */
	public function actionAjaxAdd() {
		$result = array();
		$response = '';
		if(isset($_POST['Client']))
		{
			$model = new Client;
			$model->attributes=$_POST['Client'];
			$model->account_id = Yii::app()->user->getConfigId();
			if($model->validate()){
				$model->save();
				$model->update();
				$result['success'] = array('id'=>$model->id, 'name'=>$model->name);
				$response = array('result' => $result);
			} else {
				$response = array('form' => $this->renderPartial('/appraisal/_client_form', array('model' => $model ), true , true));		
			}
		}
		echo CJSON::encode($response);
	}
}
