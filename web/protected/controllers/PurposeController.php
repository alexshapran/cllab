<?php

class PurposeController extends Controller
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
				'actions'=>array('createajax', 'update', 'delete'),
				'roles'=>array('Superadmin')
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

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreateajax()
	{
		$model = new ConfPurpose;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		$response = array();
		if(isset($_POST['ConfPurpose']))
		{
			$model->attributes = $_POST['ConfPurpose'];
			$model->conf_gen_id = yii::app()->user->getConfigId();
			if($model->save())
			{
				$aConfPurposeDataProvider = 
						new CActiveDataProvider(
								'ConfPurpose', 
								array(	'criteria'=>array('condition'=>'conf_gen_id = '.Yii::app()->user->getConfigId()),
										'pagination'=>false));

				$response['gridView'] = $this->renderPartial('create', array('aConfPurposeDataProvider'=>$aConfPurposeDataProvider));
				$response['arrIdVal'] = array('id'=>$model->id, 'value'=>$model->value);
			}
			else 
			{
				$request['error'] = '';
				foreach($model->getErrors() as $error)
				{
					$request['error'].= $error[0].'<br />';
				}
			}
		}
//		$response['gridView'] = $this->renderPartial('create', array('aConfPurposeDataProvider'=>$aConfPurposeDataProvider), true, true);
		
		echo CJSON::encode($response);
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionUpdate()
	{
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		if(isset($_POST['ConfPurpose']))
		{
			$m = ConfPurpose::model()->findByPk($_POST['ConfPurpose']['id']);
			$m->value = $_POST['ConfPurpose']['value'];
			$m->save();
		}

		$aConfPurposeDataProvider = new CActiveDataProvider('ConfPurpose', 
															array(	
																'criteria'=>
																	array('condition'=>'conf_gen_id = '.Yii::app()->user->getConfigId()),
																'pagination'=>false));

		$this->renderPartial('create',array('aConfPurposeDataProvider'=>$aConfPurposeDataProvider));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 */
	public function actionDelete()
	{
		$model = ConfPurpose::model()->findByPk($_GET['id']);
		$model->delete();
		$aConfPurposeDataProvider = new CActiveDataProvider('ConfPurpose', 
															array(	
																'criteria'=>
																	array('condition'=>'conf_gen_id = '.Yii::app()->user->getConfigId()),
																'pagination'=>false));

		$this->renderPartial('create',array('aConfPurposeDataProvider'=>$aConfPurposeDataProvider));
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
				$this->_model=Purpose::model()->findbyPk($_GET['id']);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='purpose-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
