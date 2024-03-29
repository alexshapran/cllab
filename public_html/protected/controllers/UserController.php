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
//						For AA
						array(	'allow',
								'actions'=>array('users', 'update'),
								'roles'=>array('Account Admin')),
//						For SA
						array(	'allow', // allow admin to perform 'create' and 'update' actions
								'actions'=>array( 'create', 'update', 'accounts','users', 'delete'),
								'roles'=>array('Superadmin'),
						),
						array(	'deny',  // deny all users
								'users'=>array('*'),
						),
		);
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionUpdate()
	{
		$model=$this->loadModel();
		
		
//		At first we get all attributes
		if(isset($_POST['User']))
		{
			$model->attributes = $_POST['User'];
		}
		
//		At second if current user is account admin we add it's account and status client
		$thisUser = Yii::app()->user->getModel();
		
		if(Yii::app()->user->getRole() == 'Account Admin')
		{
			$model->account_id = $thisUser->account_id;
			
//			Find privilege with 'client'
			$priv = Privilege::model()->findByAttributes(array('value'=>'User'));
			
//			echo '<pre>';
//			var_dump($priv);
//			die();
			
			if($priv)
			{
				$model->privilege_id = $priv->id;
			}
		}
		
//		At third add another attributes
		if(isset($_POST['User']))
		{
			$model->setAttribute('password_repeat',$_POST['User']['password_repeat']);

			if($model->password)
			{
//				if password need to be update we encrypt it
					$model->password = md5($model->password);
					$model->password_repeat = md5($model->password_repeat);
			}
			else
			{
//				if don't - we load it encrypted from database
				$thisModel = User::model()->findByPk($model->id);
				if($thisModel)
				{
					$model->password = $thisModel->password;
					$model->password_repeat = $model->password;
				}
			}

			if($model->validate())
			{
				if($model->save(false))
				$this->redirect(array('user/users'));
			}
		}

//		if $model is not saved, we clear password field
		$model->password = $model->password_repeat = '';

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
			$this->_model = new User();
		}
		return $this->_model;
	}

	/*
	 * Provides Admin to manage accounts
	 * @param
	 * @return
	 */

	public function actionAccounts()
	{
		$accModel = new Account;
		//$dataProvider = new CActiveDataProvider('Account');
		$this->render('accounts',array(
			'model'=>$accModel,
			'dataProvider'=> new CActiveDataProvider('Account')
		));
	}
	/*
	 * Provides Admin to manage Users
	 * @param
	 * @return
	 */

	public function actionUsers()
	{
		$accounts = Account::model()->findAll();
		$criteria = new CDbCriteria;
		
		$criteria = new CDbCriteria();
		$thisUser = Yii::app()->user->getModel();
		
		if(Yii::app()->user->getRole() == 'Account Admin' )
		{
			$criteria->condition = 'account_id = ' . $thisUser->account_id;
		}

		if(isset($_GET['filterBy']) && $_GET['filterBy'])
				$criteria->condition = 'account_id = ' . $_GET['filterBy'];

		$aUsers = new CActiveDataProvider('User', array('criteria'=>$criteria));
		$this->render('users', array('aUsers' => $aUsers, 'accounts'=>$accounts));
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
