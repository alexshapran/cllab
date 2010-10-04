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

		if(isset($_POST['Account']))
		{
			$response = array();
			$model->attributes=$_POST['Account'];
			if(!$model->save())
			{
				$errors = $model->getErrors();
				$out='';
				foreach($errors as $key=>$erText)
						$out.= '<br /><b>'.$key.'</b> : '.$erText[0];
				
				$response['errors'] = $out;
			}
			else
			{
				$this->createConfig($model->id);
				$response['form'] = $this->renderPartial('_accounts', true, true);
			}
		echo CJSON::encode($response);
		}
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionUpdate()
	{
		$model=$this->loadModel();

		if(isset($_POST['Account']))
		{
			$model->attributes=$_POST['Account'];
			if($model->save())
			{
				yii::app()->user->setFlash('success','Successfully saved!');
				$this->redirect(array('user/accounts'));
			}
			else
			{
				yii::app()->user->setFlash('error','Not saved!');
			}
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
	 * Creates new Configuration with default settings and sling it 
	 * to nearly created Account with $acc_id
	 * @param	int $acc_id
	 * @return	
	 */
	
	protected function createConfig( $acc_id )
	{
		$confGen = new ConfGeneral;
		$confGen->attributes = Yii::app()->params['defConfGen'];
		$confGen->account_id = $acc_id;
		$confGen->attr_exp_order = serialize(Yii::app()->params['attributeExportOrder']);	
		
		if($confGen->save());
		{
//				Saves Fonts config
			foreach (Yii::app()->params['defConfFont'] as $defFont)
			{
				$fontConf = new ConfFonts;
				$fontConf->attributes = $defFont;
				$fontConf->conf_gen_id = $confGen->id;
				$fontConf->save();
			}

//				Saves Images config
			foreach(Yii::app()->params['defImageSize'] as $defImage)
			{
				$imageConf = new ConfImg;
				$imageConf->attributes = $defImage;
				$imageConf->conf_gen_id = $confGen->id;
				$imageConf->save();
			}
//				Saves Scope of Settings config
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

//				Saves Disclaimer Settings config
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

}
