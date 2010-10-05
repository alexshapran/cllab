<?php

class ConfglossarysettingsController extends Controller
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
				'actions'=>array('delete', 'update', 'create'),
				'roles'=>array('Superadmin', 'Account Admin'),
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
		$model=new ConfGlossarySettings;
		$model->conf_gen_id = Yii::app()->user->getConfigId();

		$response = array();
		
		if($model->save())
		{
			$response = array(
				'form' => $this->renderPartial(	'/confglossarysettings/_form', 
												array('model'=>$model), 
												true, 
												true));
		}
		else
		{
			$errors = $model->getErrors();
			foreach($errors as $error)
				$out = $error[0].'<br />';
				
			$response['errors'] = $out;
		}

		echo CJSON::encode($response);
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionUpdate()
	{
		$aSettings = Confglossarysettings::model()->findAllByAttributes(array('conf_gen_id'=>Yii::app()->user->getConfigId()));
		if($aSettings)
			foreach($aSettings as $oSet)
				if($_POST['ConfGlossarySettings'][$oSet->id]) // If we $_POST this setting we save it
				{
					$oSet->attributes = $_POST['ConfGlossarySettings'][$oSet->id];
					$oSet->save();
				}
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 */
	public function actionDelete()
	{
		$response = array('result'=>'fail');
		if($_GET['id'])
		{
			$model = Confglossarysettings::model()->findByPk($_GET['id']);
			if($model->delete())
				$response = array('result'=>'done', 'id'=>$_GET['id']);
		}
		echo CJSON::encode($response);
	}


	/**
	 * Manages all models.
	 */
	private function renderAll()
	{
		$aGlos = Confglossarysettings::model()->findAllByAttributes(array('conf_gen_id'=>Yii::app()->user->getConfigId()));
		$this->renderPartial('/confglossarysettings/_settings', array('aGlos'=>$aGlos));
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
				$this->_model=ConfGlossarySettings::model()->findbyPk($_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}
}
