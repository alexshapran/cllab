<?php

class ConfcategoryController extends Controller
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
				'actions'=>array('ajaxcreate','view', 'ajaxsave', 'ajaxdelete'),
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

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionAjaxcreate()
	{
		$model = new ConfCategory;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		if(isset($_POST['ConfCategory']))
		{
			$model->attributes=$_POST['ConfCategory'];
			$model->save();
		}
		self::renderCategories();
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionAjaxsave()
	{
		if(isset($_POST['ConfCategory']))
		{
			$model = ConfCategory::model()->findByPk($_POST['ConfCategory']['id']);
			$model->attributes=$_POST['ConfCategory'];
			$model->save();
		}
		self::renderCategories();
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 */
	public function actionAjaxdelete()
	{
//		TODO: если есть appraisal из этой категории (соотв. не можем удалить категорию),
//		нужно ли делать уведомление?
		$model = ConfCategory::model()->findByPk($_GET['id']);
		if($model)
			$model->delete();
		self::renderCategories();
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('ConfCategory');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ConfCategory('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ConfCategory']))
			$model->attributes=$_GET['ConfCategory'];

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
				$this->_model=ConfCategory::model()->findbyPk($_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}

	/*
	 * @author	Malichenko Oleg [e-mail : aluminium1989@hotmail.com]
	 * @param		
	 * @return		partial
	 */
	
	public function renderCategories() 
	{
		$oNewCategory = new ConfCategory;
		$aParentCategories = ConfCategory::model()->findAllByAttributes(array(	'parent_id'=>NULL,
																				'conf_gen_id'=>Yii::app()->user->getConfigId()));
		$aChildCats = array();

		foreach ($aParentCategories as $oParent)
			$aChildCats[$oParent->id] = ConfCategory::model()->findAllByAttributes(array('parent_id'=>$oParent->id));
			
		$this->renderPartial('/confCategory/_allCategories', 
					array(	'aParentCategories'=>$aParentCategories, 
							'aChildCats'=>$aChildCats, 
							'oNewCategory'=>$oNewCategory), false, true);
	}
	
	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
//	protected function performAjaxValidation($model)
//	{
//		if(isset($_POST['ajax']) && $_POST['ajax']==='conf-category-form')
//		{
//			echo CActiveForm::validate($model);
//			Yii::app()->end();
//		}
//	}
}
