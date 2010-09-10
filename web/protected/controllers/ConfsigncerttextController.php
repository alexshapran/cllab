<?php
class ConfsigncerttextController extends Controller
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
				'actions'=>array('createajax', 'renderpartial', 'deleteajax', 'submit'),
				'roles'=>array('Superadmin')
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
	public function actionCreateajax()
	{

		$model=new ConfSignCertText;

		$model->conf_general_id = Yii::app()->user->getConfigId();
		
		
		if(isset($_GET['settingId']))
		{
		$model->conf_sign_cert_settings_id = $_GET['settingId'];
		$model->save();
		$this->actionMakeout($_GET['settingId']);
		}
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionSubmit()
	{
		if(isset($_POST['ConfSignCertText']))
		{
			foreach($_POST['ConfSignCertText'] as $oText)
			{
				$model = ConfSignCertText::model()->findByPk($oText['id']);
				if($model)
				{
					$model->value = $oText['value'];
					$model->save();
				}
			}
		}

		$this->redirect(Yii::app()->controller->createUrl('/confgeneral/signedcertification'));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 */
	public function actionDeleteajax()
	{
		if(isset($_GET['textId']))
		{
			$oText = ConfSignCertText::model()->findByPk($_GET['textId']);
			
			if($oText)
			{
				$sect_id = $oText->conf_sign_cert_settings_id;
				$oText->delete();
			}
				
		}

		if($sect_id)
		{
			$this->actionMakeout($sect_id);
		}
	}

	/**
	 * Lists all models.
	 */
	private function actionMakeout($sectId)
	{
		$oSect = ConfSignCertSettings::model()->findByPk($sectId);
		$this->renderPartial('create', array('oSect'=>$oSect));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ConfSignCertText('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ConfSignCertText']))
		$model->attributes=$_GET['ConfSignCertText'];

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
			$this->_model=ConfSignCertText::model()->findbyPk($_GET['id']);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='conf-sign-cert-text-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}