<?php

class ConftypeofvalueController extends Controller
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
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('update', 'delete', 'CreateAjax'),
				'roles'=>array('Superadmin', 'Account Admin')
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

//	/**
//	 * Displays a particular model.
//	 */
//	public function actionView()
//	{
//		$this->render('view',array(
//			'model'=>$this->loadModel(),
//		));
//	}
	public function actionCreateAjax() {
		$result = array();
		$response = '';
		if(isset($_POST['ConfTypeOfValue']))
		{
			$model = new ConfTypeOfValue;
			$model->attributes=$_POST['ConfTypeOfValue'];
			$model->conf_gen_id = Yii::app()->user->getConfigId();
			if($model->validate()){
				$model->save();
				$model->update();
				$result['success'] = array('id'=>$model->id, 'name'=>$model->name);
				$response = array('result' => $result);
			} else {
				$response = array('form' => $this->renderPartial('/conftypeofvalue/_typeofvalue_form', array('model' => $model ), true , true));		
			}
		}
		echo CJSON::encode($response);
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

		if(isset($_POST['ConfTypeOfValue']))
		{
			$model->attributes=$_POST['ConfTypeOfValue'];
			$model->conf_gen_id = Yii::app()->user->getConfigId();
			if($model->save())
				$this->redirect(Yii::app()->controller->createUrl('/confgeneral/update'));
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

//	/**
//	 * Lists all models.
//	 */
//	public function actionIndex()
//	{
//		$dataProvider=new CActiveDataProvider('ConfTypeOfValue');
//		$this->render('index',array(
//			'dataProvider'=>$dataProvider,
//		));
//	}
//
//	/**
//	 * Manages all models.
//	 */
//	public function actionAdmin()
//	{
//		$model=new ConfTypeOfValue('search');
//		$model->unsetAttributes();  // clear any default values
//		if(isset($_GET['ConfTypeOfValue']))
//			$model->attributes=$_GET['ConfTypeOfValue'];
//
//		$this->render('admin',array(
//			'model'=>$model,
//		));
//	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 */
	public function loadModel()
	{
		if($this->_model===null)
		{
			$this->_model = isset($_GET['id']) ? ConfTypeOfValue::model()->findbyPk($_GET['id']) : new ConfTypeOfValue;
		}
		return $this->_model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='conf-type-of-value-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
?>