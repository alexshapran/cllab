<?php

class ConfgeneralController extends Controller
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
				'actions'=>array('index', 'view', 'fontsandimages', 'fontsandimagessubmit', 'propertysettings'),
				'roles'=>array('Superadmin'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
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
	public function actionCreate()
	{
		$model=new ConfGeneral;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ConfGeneral']))
		{
			$model->attributes=$_POST['ConfGeneral'];
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
		//var_dump(yii::app()->user->getConfigId());
		
		$oUserModel = User::model()->findByPk(Yii::app()->user->getId());
		$oConfGeneral = ConfGeneral::model()->findByPk($oUserModel->account_id);
		
		//TODO: HERE MUST BE if(!$model)
		
		
		$oPurpose = ConfPurpose::model()->findByAttributes(array('conf_gen_id'=>$oConfGeneral->id));
		
		
		$aConfTypeDataProvider = new CActiveDataProvider('ConfTypeOfValue', 
															array(	
																'criteria'=>
																	array('condition'=>'conf_gen_id = '.$oConfGeneral->id)));

		$aConfPurposeDataProvider = new CActiveDataProvider('ConfPurpose', 
															array(	
																'criteria'=>
																	array('condition'=>'conf_gen_id = '.$oConfGeneral->id),
																'pagination'=>false));
		//::model()->findByAttributes(array('conf_gen_id'=>$oConfGeneral->id));;

		if(isset($_POST['ConfGeneral']))
		{
			$model->attributes=$_POST['ConfGeneral'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$oConfGeneral,
			'aConfTypeDataProvider'=> $aConfTypeDataProvider,
			'aConfPurposeDataProvider'=> $aConfPurposeDataProvider,
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
		$dataProvider=new CActiveDataProvider('ConfGeneral');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
	
	/* Provides to manage Fonts and Images settings
	 * @author	Malichenko Oleg [e-mail : aluminium1989@hotmail.com]
	 * @param		
	 * @return		
	 */
	
	public function actionFontsandimages() 
	{
		$oConfGeneral = ConfGeneral::model()->findByPk(Yii::app()->user->getConfigId());
		
		$aFontsConf = ConfFonts::model()->findAllByAttributes(array('conf_gen_id'=>yii::app()->user->getConfigId() ));
		$aImageConf = ConfImg::model()->findAllByAttributes(array('conf_gen_id'=>yii::app()->user->getConfigId() ));
		
		$this->render('fontsandimages', array('aImageConf'=>$aImageConf, 'aFontsConf'=>$aFontsConf, 'confGeneral'=>$oConfGeneral));
	}
	
	
	/*
	 * @author	Malichenko Oleg [e-mail : aluminium1989@hotmail.com]
	 * @param		array() ConfGeneral[]
	 * @return		
	 */
	
	public function actionFontsandimagessubmit() 
	{
		// Saving General Font
		$oConfGeneral = ConfGeneral::model()->findByPk(Yii::app()->user->getConfigId());		
		if(isset($_POST['ConfGeneral']['global_font_type']))
			$oConfGeneral->global_font_type = $_POST['ConfGeneral']['global_font_type'];
		$oConfGeneral->save();
		// Saving General Font END		
		
		// Saving Fonts Configuration
		$aFontsConf = ConfFonts::model()->findAllByAttributes(array('conf_gen_id'=>yii::app()->user->getConfigId() ));		
		foreach($aFontsConf as $oFc)
		{
			if(isset($_POST['ConfFonts'][$oFc->section]))
				$oFc->attributes = $_POST['ConfFonts'][$oFc->section];

			$oFc->save();
		}
		// Saving Fonts Configuration END

		// Saving Image Configuration
		$aImageConf = ConfImg::model()->findAllByAttributes(array('conf_gen_id'=>yii::app()->user->getConfigId() ));

		foreach($aImageConf as $oImage)
		{
			if(isset($_POST['ConfImg'][$oImage->size]))
				$oImage->attributes = $_POST['ConfImg'][$oImage->size];
				
			$oImage->save();
		}
		// Saving Image Configuration END
		
		Yii::app()->controller->redirect(Yii::app()->controller->createUrl('/confgeneral/fontsandimages'));
	}

	
	/* Provides anybody to config Property Settings
	 * @author	Malichenko Oleg [e-mail : aluminium1989@hotmail.com]
	 * @param		
	 * @return		
	 */
	
	public function actionPropertysettings() 
	{
		$oNewCategory = new ConfCategory;
		$aParentCategories = ConfCategory::model()->findByAttributes(array('parent_id'=>NULL));
		$this->render('propertysettings', array('oNewCategory'=>$oNewCategory, 'aParentCategories'=>$aParentCategories));
	}
	
	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ConfGeneral('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ConfGeneral']))
			$model->attributes=$_GET['ConfGeneral'];

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
				$this->_model=ConfGeneral::model()->findbyPk($_GET['id']);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='conf-general-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
