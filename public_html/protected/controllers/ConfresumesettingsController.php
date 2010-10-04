<?php

class ConfresumesettingsController extends Controller
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
				'actions'=>array('update', 'create', 'delete'),
				'roles'=>array('Superadmin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/** Create resume field
	 * @param	none	
	 * @return	html	
	 */
	
	public function actionCreate() 
	{
		$model = new ConfResumeSettings;
		$model->conf_gen_id = yii::app()->user->getConfigId();
		if($model->save())
			$response['form'] = $this->renderPartial('_form', array('model'=>$model), true, true);
		
			echo CJSON::encode($response);
	}
	
	/** delete Resume
	 * @param	resume_id	
	 * @return	boolean
	 */
	
	public function actionDelete() 
	{
		$response['complete']=false;
		if($_GET['id'])
		{
			$model = ConfResumeSettings::model()->findByPk($_GET['id']);
			$response['id'] = $model->id;

			if($model->delete())
				$response['complete']=true;
		}

		echo CJSON::encode($response);
	}
	
	
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionUpdate()
	{
		$aResume = ConfResumeSettings::model()->findAllByAttributes(array('conf_gen_id'=>Yii::app()->user->getConfigId()));
		
		foreach($aResume as $oRes)
		if( $_POST['ConfResumeSettings'][$oRes->id] && $oRes->value = $_POST['ConfResumeSettings'][$oRes->id]['value'] )
			$oRes->save();
	}
}