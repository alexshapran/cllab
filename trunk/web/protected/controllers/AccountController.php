<?php

class AccountController extends Controller
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
				'actions'=>array('createAjax','update', 'delete', 'createConfig'),
				'roles'=>array('Superadmin')
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
	public function actionCreateAjax()
	{
		$model=new Account;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Account']))
		{
			$model->attributes=$_POST['Account'];
			$model->date_created = time();
			if(!$model->save())
			{
				$data = array();
				$data['errors'] = $model->getErrors();
				$this->renderPartial('_errors', $data, false, true);
			}
			else
			{
				self::createConfig($model->id);
				$dataProvider = new CActiveDataProvider('Account');
				$data['dataProvider'] = $dataProvider;
				$this->renderPartial('_accounts', $data);
			}
		}
		else
		{
			$dataProvider = new CActiveDataProvider('Account');
			$data['dataProvider'] = $dataProvider;
			$this->renderPartial('_accounts', $data);
		}

/*		$this->render('create',array(
			'model'=>$model,
		));*/
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

		if(isset($_POST['Account']))
		{
			$model->attributes=$_POST['Account'];
			if($model->save())
				$this->redirect(array('user/accounts'));
		}

		$this->render('update',array(
			'model'		=>$model,
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
			$this->loadModel()->delete();
			$dataProvider = new CActiveDataProvider('Account');
			$data['dataProvider'] = $dataProvider;
			$this->renderPartial('_accounts', $data);
		}
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Account');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Account('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Account']))
			$model->attributes=$_GET['Account'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	
	/**
	 * 
	 * @author	Malichenko Oleg [e-mail : aluminium1989@hotmail.com]
	 * @param	int $model_id
	 * @return	
	 */
	
	protected function createConfig( $acc_id )
	{
		$confGen = new ConfGeneral;
		$confGen->attributes = Yii::app()->params['defConfGen'];
		$confGen->account_id = $acc_id;
		$confGen->attr_exp_order = implode(', ', Yii::app()->params['attributeExportOrder']);
		
		if($confGen->save());
		{
			foreach (Yii::app()->params['defConfFont'] as $defFont)
			{
				$fontConf = new ConfFonts;
				$fontConf->attributes = $defFont;
				$fontConf->conf_gen_id = $confGen->id;
				$fontConf->save();
			}

			foreach(Yii::app()->params['defImageSize'] as $defImage)
			{
				$imageConf = new ConfImg;
				$imageConf->attributes = $defImage;
				$imageConf->conf_gen_id = $confGen->id;
				$imageConf->save();
			}
			foreach (Yii::app()->params['defScopeOfSettings'] as $sOS)
			{
				$scopeSet = new ConfScopeOfSettings;
				$scopeSet->attributes = $sOS;
				$scopeSet->conf_gen_id = $confGen->id;
				
				if($scopeSet->save())
				{
					$q = 1;
					if(isset($sOS['num_of_def_fields']))
						$q = $sOS['num_of_def_fields'];
	
					while($q > 0)
					{
						$scopeVal = new ConfScopeOfValue;
						$scopeVal->conf_sos_id = $scopeSet->id;
						$scopeVal->save();
						--$q;
					}
				}
			}

			foreach(Yii::app()->params['Disclaimer Settings'] as $name)
			{
				$setting = new ConfDisclaimerSettings;
				$setting->name = $name;
				$setting->conf_gen_id = $confGen->id;
				$setting->save();
				
				$value = new ConfDisclaimerValue;
				$value->conf_disc_settings = $setting->id;
				$value->save();
			}
			

			$resume = new ConfResumeSettings;
			$resume->conf_gen_id = $confGen->id;
			$resume->save();
		}
		
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
				$this->_model=Account::model()->findbyPk($_GET['id']);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='account-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}