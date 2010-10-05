<?php

class ConfscopeofsettingsController extends Controller
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
				'actions'=>array('update', 'submit', 'delete'),
				'roles'=>array('Superadmin', 'Account Admin')
			),
			array('deny',  // deny all users
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
		$oCSOS = ConfScopeOfSettings::model()->findByPk($_GET['id']);
		if($oCSOS && $_GET['newtext'])
		{
			$oCSOS->name = $_GET['newtext'];
			$oCSOS->save();
		}
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 */
	public function actionDelete()
	{
		if(Yii::app()->request->isPostRequest)
		{
			$this->loadModel()->delete();
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}
	
	/**
	 * Manages all models.
	 */
	
	public function actionSubmit()
	{
		
		$aSOS = ConfScopeOfSettings::model()->findAllByAttributes(array('conf_gen_id'=>Yii::app()->user->getConfigId()));

		if($aSOS)
			foreach($aSOS as $oSetting)
				foreach($oSetting->confScopeOfValues as $oValue)
					if($_POST['ConfScopeOfValue'][$oValue->id])
					{
						$oValue->attributes = $_POST['ConfScopeOfValue'][$oValue->id];
						$oValue->save();
					}
	}
}
