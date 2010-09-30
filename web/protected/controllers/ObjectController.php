<?php

class ObjectController extends Controller
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
			
//			array('allow',  // allow all users to perform 'index' and 'view' actions
//				'actions'=>array('index', 'view', 'property'),
//				'roles'=>array('Superadmin'),
//y			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','GetChildrenCategory', 'AddComparableAjax', 'DeleteAjax'),
				'roles'=>array('Superadmin'),
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
		if(isset($_GET['object']))
			$model = Object::model()->findByPk($_GET['object']);
		if(!$model)
			$model = new Object;

		$aComparableSales = $model->getComparableSales();
		
		if(isset($_POST['Object'])) {
			$oAppraisal = Appraisal::getModel();
			$model->appraisal_id = $oAppraisal->id;
			$model->attributes=$_POST['Object'];
			if($model->validate()) {
				if($model->save()) {
					if(isset($_POST['ComparableSales']) || isset($_POST['NewImgId'])) {
						foreach($aComparableSales as $i => $obj) {
							if(isset($_POST['ComparableSales']) && isset($_POST['ComparableSales'][$obj->id]))
								$obj->description = $_POST['ComparableSales'][$obj->id];
									
							if(isset($_POST['NewImgId']) && isset($_POST['NewImgId'][$obj->id]))
								$obj->img_id = $_POST['NewImgId'][$obj->id];
								
							$obj->save();
						}
					}
					// if clicked save and create new redirect else save current and show it
					if(isset($_POST['save_location']) && $_POST['save_location'] == 'new') {
						$model=new Object;
						$this->createUrl('create/' . ($oAppraisal->alias ? $oAppraisal->alias : $oAppraisal->id));
					}
				}
			}
		}
		
		$this->render('create',array(
			'model'=>$model,
			'aComparableSales'=>$aComparableSales,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionEdit()
	{
		$model=new Object;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Object']))
		{
			$model->attributes=$_POST['Object'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('edit',array(
			'model'=>$model,
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
		$dataProvider=new CActiveDataProvider('Object');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Object('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Object']))
			$model->attributes=$_GET['Object'];

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
				$this->_model=Object::model()->findbyPk($_GET['id']);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='object-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionGetChildrenCategory() {
		if(isset($_POST['categoryId']) && intval($_POST['categoryId'])) {
			$arr = ConfCategory::getChildrenCategory($_POST['categoryId']);
			$html = '<option value=""> -Select- </option>';
			foreach($arr as $i => $obj) {
				$html .= "<option value='" . $obj->id . "'>" . $obj->name . '</option>'; 
			}
			$response = array('html' => $html);
			echo CJSON::encode($response);
		}
	}
	
	public function actionAddComparableAjax(){
		if(isset($_GET['object']) && intval($_GET['object'])) {
			$obj = new ComparableSales;
			$obj->object_id = $_GET['object'];
			$obj->save();
			$response = array('form'=>$this->renderPartial('/object/_comparable_sales', array('obj' => $obj),true, true));
			echo CJSON::encode($response);
			
		}
	}
	
	public function actionDeleteAjax(){
		if(isset($_GET['comparableSale']) && intval($_GET['comparableSale'])) {
			$obj = ComparableSales::model()->findByPk($_GET['comparableSale']);
			if($obj) {
				$id = $obj->id;
				if($obj->delete()){
					echo $id;
					die;	
				}
			}
		}
	}
}
