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
				'actions'=>array(	'update', 'fontsandimages', 
									'fontsandimagessubmit', 'propertysettings', 
									'signedcertification', 'submitattributeorder',
									'scopeofsettings', 'disclaimersettings',
									'resumesettings', 'glossarysettings'),
				'roles'=>array('Superadmin'),
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
		$oUserModel = User::model()->findByPk(Yii::app()->user->getId());
		$oConfGeneral = $oUserModel->account->confGenerals[0];

		//TODO: HERE MUST BE if(!$model)

		if($oConfGeneral)
		{
		$oPurpose = ConfPurpose::model()->findByAttributes(array('conf_gen_id'=>$oConfGeneral->id));

		$aConfTypeDataProvider = new CActiveDataProvider('ConfTypeOfValue',
		array('criteria'=>array('condition'=>'conf_gen_id = '.$oConfGeneral->id)));
		
		$aConfPurposeDataProvider = new CActiveDataProvider('ConfPurpose',
		array('criteria'=>array('condition'=>'conf_gen_id = '.$oConfGeneral->id),
																'pagination'=>false));

		if(isset($_POST['ConfGeneral']))
		{
			$oConfGeneral->attributes=$_POST['ConfGeneral'];
			$oConfGeneral->save();
		}

		$this->render('update',array(
			'model'=>$oConfGeneral,
			'aConfTypeDataProvider'=> $aConfTypeDataProvider,
			'aConfPurposeDataProvider'=> $aConfPurposeDataProvider,
		));
		}
	}

	/** Provides to Config Fonts and Images Settings
	 * @author	Malichenko Oleg [e-mail : aluminium1989@hotmail.com]
	 * @param
	 * @return
	 */

	public function actionFontsandimages()
	{
		$oConfGeneral = ConfGeneral::model()->findByPk(Yii::app()->user->getConfigId());
		$aFontsConf = $oConfGeneral->confFonts;
		$aImageConf = $oConfGeneral->confImgs;

		$this->render('fontsandimages', array('aImageConf'=>$aImageConf, 'aFontsConf'=>$aFontsConf, 'confGeneral'=>$oConfGeneral));
	}


	/**
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
		$aFontsConf = $oConfGeneral->confFonts;
		foreach($aFontsConf as $oFc)
		{
			if(isset($_POST['ConfFonts'][$oFc->section]))
				$oFc->attributes = $_POST['ConfFonts'][$oFc->section];
			$oFc->save();
		}
		// Saving Fonts Configuration END

		// Saving Image Configuration
		$aImageConf = $oConfGeneral->confImgs;

		foreach($aImageConf as $oImage)
		{
			if(isset($_POST['ConfImg'][$oImage->size]))
				$oImage->attributes = $_POST['ConfImg'][$oImage->size];
			$oImage->save();
		}
		// Saving Image Configuration END

		Yii::app()->controller->redirect(Yii::app()->controller->createUrl('/confgeneral/fontsandimages'));
	}


	/**
	 * @author	Malichenko Oleg [e-mail : aluminium1989@hotmail.com]
	 * @param		array()
	 * @return		null
	 */
	
	public function actionSubmitattributeorder() 
	{
		if(isset($_POST['attrOrder']));
		{
			$aOrder = explode(',',$_POST['attrOrder']);
			$Attributes = Yii::app()->params['attributeExportOrder'];
			$newAttrSorted = array();
			
			foreach($aOrder as $key)
			{
				$newAttrSorted[$key] = $Attributes[$key];
			}

		$oConfGen = ConfGeneral::model()->findByPk(Yii::app()->user->getConfigId());
		if($oConfGen)
		{
			$oConfGen->attr_exp_order = serialize($newAttrSorted);
			$oConfGen->save();
		}
 
		}
	}
	
	/** Provides anybody to config Property Settings
	 * @author	Malichenko Oleg [e-mail : aluminium1989@hotmail.com]
	 * @param
	 * @return
	 */
		
	public function actionPropertysettings()
	{
		$oNewCategory = new ConfCategory;
		$aParentCategories = ConfCategory::model()->findAllByAttributes(array('parent_id'=>NULL));
		$aChildCats = array();

		foreach ($aParentCategories as $oParent)
			$aChildCats[$oParent->id] = ConfCategory::model()->findAllByAttributes(array('parent_id'=>$oParent->id));

		$oGenConfig = ConfGeneral::model()->findByPk(Yii::app()->user->getConfigId());

		$this->render('propertysettings', array('oNewCategory'=>$oNewCategory,
												'aParentCategories'=>$aParentCategories, 
												'aChildCats'=>$aChildCats,
//												'attExpOrder' => $attExpOrder,
												'oGenConfig' => $oGenConfig ));
	}

	/** Signed Certifications Settings
	 * @author	Malichenko Oleg [e-mail : aluminium1989@hotmail.com]
	 * @param
	 * @return
	 */

	public function actionSignedcertification()
	{
		$aSignCertSetts = ConfSignCertSettings::model()->findAll();
		$this->render('signedcertification', array('aSignCertSetts'=>$aSignCertSetts));
	}

	/**
	 * Manages all models.
	 */
	
	/**
	 * Configuration - Scope of Work Settings
	 * @author	Malichenko Oleg [e-mail : aluminium1989@hotmail.com]
	 * @param		
	 * @return		
	 */
	
	public function actionScopeofsettings() 
	{
		$aScopeOfSettings = ConfScopeOfSettings::model()->findAllByAttributes(array('conf_gen_id'=>Yii::app()->user->getConfigId()));
		$this->render('scopeofsettings', array('aScopeOfSettings' => $aScopeOfSettings));
	}
	

	/**
	 * Configuration - Disclaimer Settings
	 * @author	Malichenko Oleg [e-mail : aluminium1989@hotmail.com]
	 */
	
	public function actionDisclaimersettings() 
	{
		$aDiscSettings = ConfDisclaimerSettings::model()->findAllByAttributes(array('conf_gen_id'=>Yii::app()->user->getConfigId()));
		$this->render('discsettings', array('aDiscSettings' => $aDiscSettings));
	}
	
	/**
	 * Configuration - Disclaimer Settings
	 * @author	Malichenko Oleg [e-mail : aluminium1989@hotmail.com]
	 */
	
	public function actionResumesettings() 
	{
		$oResume = ConfResumeSettings::model()->findByAttributes(array('conf_gen_id'=>Yii::app()->user->getConfigId()));
		$this->render('resumesettings', array('oResume' => $oResume));
	}
	
	/**
	 *  Configuration - Glossary Settings.
	 */
	
	public function actionGlossarysettings()
	{
		$aGlos = ConfGlossarySettings::model()->findAllByAttributes(array('conf_gen_id'=>Yii::app()->user->getConfigId()));
		$this->render('glossarysettings', array('aGlos'=>$aGlos) );
	}

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
//	public function loadModel()
//	{
//		if($this->_model===null)
//		{
//			if(isset($_GET['id']))
//			$this->_model=ConfGeneral::model()->findbyPk($_GET['id']);
//			if($this->_model===null)
//			throw new CHttpException(404,'The requested page does not exist.');
//		}
//		return $this->_model;
//	}
}
