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
			$model->attributes = $_POST['ConfCategory'];
			$model->conf_gen_id = yii::app()->user->getConfigId();
			
			if($model->save())
			{
				$response['form'] = $this->renderCategories(true);
			}
			else 
			{
				$errors = $model->getErrors();
				$response['errors'] = '';
				foreach($errors as $key=>$er)
				{
					$response['errors'] .= $response['errors'].'<b>'.$key.'</b>:'.$er[0].'<br />';
				}
			}
			
			echo CJSON::encode($response);
		}
		
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
			
			if($model->save())
			{
				$response['form'] = $this->renderCategories(true);
			}
			else 
			{
				$errors = $model->getErrors();
				$response['errors'] = '';
				foreach($errors as $key=>$er)
				{
					$response['errors'] .= $response['errors'].'<b>'.$key.'</b>:'.$er[0].'<br />';
				}
			}
			
			echo CJSON::encode($response);
		}
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 */
	public function actionAjaxdelete()
	{
//		TODO: ���� ���� appraisal �� ���� ��������� (�����. �� ����� ������� ���������),
//		����� �� ������ �����������?
		$model = ConfCategory::model()->findByPk($_GET['id']);
		if($model)
		{
			if($model->delete())
			{
				$response['form'] = $this->renderCategories(true);
			}
			else
			{
				$errors = $model->getErrors();
				$response['errors'] = '';
				foreach($errors as $key=>$er)
				{
					$response['errors'] .= $response['errors'].'<b>'.$key.'</b>:'.$er[0].'<br />';
				}
			}
			
			echo CJSON::encode($response);
		}
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
	 * @param		
	 * @return		partial
	 */
	
	public function renderCategories($for_ajax = false) 
	{
		$oNewCategory = new ConfCategory;
		$aParentCategories = ConfCategory::model()->findAllByAttributes(array(	'parent_id'=>NULL,
																				'conf_gen_id'=>Yii::app()->user->getConfigId()));
		$aChildCats = array();

		foreach ($aParentCategories as $oParent)
			$aChildCats[$oParent->id] = ConfCategory::model()->findAllByAttributes(array('parent_id'=>$oParent->id));
			
		if($for_ajax)
		{
			return $this->renderPartial(	'/confCategory/_allCategories', 
								array(	'aParentCategories'=>$aParentCategories, 
										'aChildCats'=>$aChildCats, 
										'oNewCategory'=>$oNewCategory), 
								true, true);
		}
			
		$this->renderPartial(	'/confCategory/_allCategories', 
								array(	'aParentCategories'=>$aParentCategories, 
										'aChildCats'=>$aChildCats, 
										'oNewCategory'=>$oNewCategory), 
								$for_ajax, true);
	}
}
