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
		array('deny',  // deny all users
				'users'=>array('*'),
		),
		);
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

			$response = array(
							'form' 	=> $this->renderPartial('/confsigncerttext/_value', array('model'=>$model), true, true),
							'id'	=> $model->conf_sign_cert_settings_id );
			
			echo CJSON::encode($response);
		}
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionSubmit()
	{
		if(isset($_POST['ConfSignCertText']))
			foreach($_POST['ConfSignCertText'] as $oText)
			{
				$model = ConfSignCertText::model()->findByPk($oText['id']);
				if($model)
				{
					$model->value = $oText['value'];
					$model->save();
				}
			}
		
		//$this->redirect(Yii::app()->controller->createUrl('/confgeneral/signedcertification'));
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
//		if($sect_id)
//			$this->actionMakeout($sect_id);
	}

	/**
	 * Lists all models.
	 */
	private function actionMakeout($sectId)
	{
		$oSect = ConfSignCertSettings::model()->findByPk($sectId);
		$this->renderPartial('create', array('oSect'=>$oSect));
	}
}
