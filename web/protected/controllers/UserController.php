<?php

class UserController extends Controller
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
		return 	array(
					array('allow', // allow admin to perform 'create' and 'update' actions
							'actions'=>array('create','update', 'admin', 'view', 'accounts','users'),
							'roles'=>array('Superadmin'),
					),
					array('deny', // allow admin user to perform 'admin' and 'delete' actions
							'actions'=>array('admin','delete'),
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
		$model=new User;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			if($model->save())
			$this->redirect(array('view','id'=>$model->id));
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

		if(isset($_POST['User']))
		{
			$model->attributes = $_POST['User'];
			$model->setAttribute('password_repeat',$_POST['User']['password_repeat']);

			if($model->password)
			{
				if($model->validate('update'))
				{
					$model->password = md5($model->password);
				}
				else
				{
					//					$model->unsetAttributes('password_repeat');

					$this->render('update',array(
						'model'=>$model,
						'aAcc'=> Account::model()->findAll(),
						'aPriv'=>Privilege::model()->findAll(),
					));
					die();
				}
			}
			else
			{
				$thisModel = User::model()->findByPk($model->id);
				$model->password = $thisModel->password;
			}

			if($model->validate(array('id, username, password, name, account_id, privilege_id')))
			{
				if($model->save(false))
				$this->redirect(array('user/users'));
			}

		}

		$model->password = '';
		//		$model->password_repeat = '';

		$this->render('update',array(
			'model'=>$model,
			'aAcc'=> Account::model()->findAll(),
			'aPriv'=>Privilege::model()->findAll(),
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
		$dataProvider=new CActiveDataProvider('User');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
		$model->attributes=$_GET['User'];

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
			$this->_model=User::model()->findbyPk($_GET['id']);
			if($this->_model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}

	/*
	 * Provides Admin to manage accounts
	 * @author	Malichenko Oleg [e-mail : aluminium1989@hotmail.com]
	 * @param
	 * @return
	 */

	public function actionAccounts()
	{
		$accModel = new Account;
		//$dataProvider = new CActiveDataProvider('Account');

		$this->render('accounts',array(
			'model'=>$accModel,
		));
	}
	/*
	 * Provides Admin to manage Users
	 * @author	Malichenko Oleg [e-mail : aluminium1989@hotmail.com]
	 * @param
	 * @return
	 */

	public function actionUsers()
	{
		$dataProvider = new CActiveDataProvider('User');
		$this->render('users');
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

}
