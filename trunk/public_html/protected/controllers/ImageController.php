<?php

class ImageController extends Controller
{

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
				'actions'=>array('createAjax'),
				'roles'=>array('Superadmin', 'Account Admin', 'User')
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
	public function actionCreateAjax() {

		$response = array();
		$form = new AjaxUploadImageForm;
        if(isset($_POST['AjaxUploadImageForm']))
        {
//            $form->attributes = $_POST['AjaxUploadImageForm'];
            if($form->validate()) {
            	$form->image = CUploadedFile::getInstance($form,'image');
            	$model = new Image;
            	$model->_file = $form->image;
            	$model->loadImage();
	            if($model->save()) {
	            	$response['file'] = $model->name;
	            	$response['imgId'] = $model->id;
	                // redirect to success page
	            }	
            }else{
            	$response = array('error'=>CHtml::errorSummary($model));
            }
        }
		if (!$response) {
			$response = array('error'=>$this->renderPartial('/object/_image', array('model' => new AjaxUploadImageForm),true, true));	
		}
        
        foreach ($response as $key=>$val) {
			$response[$key] = rawurlencode($response[$key]);
		}
		echo CJavaScript::jsonEncode($response);
		die;
        
        //$this->render('create', array('model'=>$model));
		
	}
}
