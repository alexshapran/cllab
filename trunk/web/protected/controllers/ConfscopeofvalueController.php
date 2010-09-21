<?php

class ConfscopeofvalueController extends Controller
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
				'roles' => array('Superadmin'),
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
		$model=new ConfScopeOfValue;

		if($_GET['sos_id'])
		{
			$sOS =  ConfScopeOfSettings::model()->findByPk($_GET['sos_id']);
			$model->conf_sos_id = $sOS->id;
			$model->save();
			$this->renderPartial('/confscopeofsettings/_simpleset', array('model'=>$sOS), false, true);
		}
	}


	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 */
	public function actionDelete()
	{
		
		if($_GET['val_id'])
		{
			$model = ConfScopeOfValue::model()->findByPk($_GET['val_id']);
			$model->delete();
		}
	}
}
