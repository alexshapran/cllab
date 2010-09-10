<?php

class ConfscopeofvalueController extends Controller
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
				'actions'=>array('index','view', 'create', 'delete'),
				'roles' => array('Superadmin'),
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

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new ConfScopeOfValue;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if($_GET['sos_id'])
		{
			$sOS =  ConfScopeOfSettings::model()->findByPk($_GET['sos_id']);
			$model->conf_sos_id = $sOS->id;
			$model->save();
			$this->renderPartial('/confscopeofsettings/_simpleset', array('model'=>$sOS));
		}


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

		if(isset($_POST['ConfScopeOfValue']))
		{
			$model->attributes=$_POST['ConfScopeOfValue'];
			if($model->save())
			$this->redirect(array('view','id'=>$model->id));
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
		
		if($_GET['val_id'])
			$model = ConfScopeOfValue::model()->findByPk($_GET['val_id']);

		if($model)
		{
			$sOS =  ConfScopeOfSettings::model()->findByPk($model->conf_sos_id);
			$model->delete();
			$this->renderPartial('/confscopeofsettings/_simpleset', array('model'=>$sOS));
		}
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('ConfScopeOfValue');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ConfScopeOfValue('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ConfScopeOfValue']))
		$model->attributes=$_GET['ConfScopeOfValue'];

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
			$this->_model=ConfScopeOfValue::model()->findbyPk($_GET['id']);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='conf-scope-of-value-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
