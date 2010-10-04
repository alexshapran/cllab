<?php

class ConfdisclaimervalueController extends Controller
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
				'actions'=>array('create', 'delete'),
				'roles'=>array('Superadmin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new ConfDisclaimerValue;

		if($_GET['sos_id'])
		{
			$sOS = ConfDisclaimerSettings::model()->findByPk($_GET['sos_id']);
			$model->conf_disc_settings = $sOS->id;
			
			if($model->save())
				$response = array(
					'form'=>$this->renderPartial(	'/confdisclaimervalue/_form', 
													array('model'=>$model), 
													true, true),
					'id'=>$model->conf_disc_settings
				);
			
			echo CJSON::encode($response);
		}
	}
	/**
	 * @param	int $val_id
	 * @return 
	 */		
	
	public function actionDelete() 
	{
		if ($_GET['val_id'])
			$model = Confdisclaimervalue::model()->findByPk($_GET['val_id']);
		if($model)
			$model->delete();
				
	}
}