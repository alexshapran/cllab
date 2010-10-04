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

		if($oConfGeneral)
		{
			$oPurpose = ConfPurpose::model()->findByAttributes(array('conf_gen_id'=>$oConfGeneral->id));
	
			$aConfTypeDataProvider = new CActiveDataProvider(
											'ConfTypeOfValue',
											array(
												'criteria'=>array(
															'condition'=>'conf_gen_id = '.$oConfGeneral->id)));

			$aConfPurposeDataProvider = new CActiveDataProvider('ConfPurpose',
													array(
														'criteria'=>array(
																	'condition'=>'conf_gen_id = '.$oConfGeneral->id),
																	'pagination'=>false));
	
			if(isset($_POST['ConfGeneral']))
			{
				$oConfGeneral->attributes=$_POST['ConfGeneral'];
				if($oConfGeneral->save())
					Yii::app()->user->setFlash('success', 'Saved!');
				else
					$errors = $oConfGeneral->getErrors();
			
				if(!isset($errors))
					yii::app()->user->setFlash('success','Successfully saved!');
				else 
				{
						$out='';
						foreach($errors as $key=>$erText)
						{
								$out.= '<br /><b>'.$key.'</b> : '.$erText[0];
						}
								
					yii::app()->user->setFlash('error','Not saved!'.$out);
				}
			}
	
			$this->render('update',array(
									'model'=>$oConfGeneral,
									'aConfTypeDataProvider'=> $aConfTypeDataProvider,
									'aConfPurposeDataProvider'=> $aConfPurposeDataProvider,
			));
		}
	}

	/** Provides to Config Fonts and Images Settings
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
	 * @param		array() ConfGeneral[]
	 * @return
	 */

	public function actionFontsandimagessubmit()
	{
		// Saving General Font
		$errs = array();
		$oConfGeneral = ConfGeneral::model()->findByPk(Yii::app()->user->getConfigId());
		if(isset($_POST['ConfGeneral']['global_font_type']))
			$oConfGeneral->global_font_type = $_POST['ConfGeneral']['global_font_type'];
		
		if(!$oConfGeneral->save())
			$errs[] = $oConfGeneral->getErrors();
		// Saving General Font END

		// Saving Fonts Configuration
		$aFontsConf = $oConfGeneral->confFonts;
		foreach($aFontsConf as $oFc)
		{
			if(isset($_POST['ConfFonts'][$oFc->section]))
				$oFc->attributes = $_POST['ConfFonts'][$oFc->section];
			
			if(!$oFc->save())
				$errs[] = $oFc->getErrors();
		}
		// Saving Fonts Configuration END

		// Saving Image Configuration
		$aImageConf = $oConfGeneral->confImgs;

		foreach($aImageConf as $oImage)
		{
			if(isset($_POST['ConfImg'][$oImage->size]))
				$oImage->attributes = $_POST['ConfImg'][$oImage->size];
			
			if(!$oImage->save())
			{
				$errs[$oImage->size] = $oImage->getErrors();
			}
		}
		// Saving Image Configuration END

		
			if(!$errs)
				yii::app()->user->setFlash('success','Successfully saved!');
			else 
			{
				$out = '';
				foreach($errs as $key=>$erGroup)
					foreach($erGroup as $erText)
							$out .= '<br /><b>'.$key.'</b> : '.$erText[0];
				yii::app()->user->setFlash('error','Not saved!'.$out);
			}
		
		Yii::app()->controller->redirect(Yii::app()->controller->createUrl('/confgeneral/fontsandimages'));
	}


	/**
	 * @param		array()
	 * @return		null
	 */
	
	public function actionSubmitattributeorder() 
	{
		$errors = 0;
		if(isset($_POST['attrOrder']));
		{
			$aOrder = explode(',',$_POST['attrOrder']);
			$Attributes = Yii::app()->params['attributeExportOrder'];
			$newAttrSorted = array();
			
			foreach($aOrder as $key)
				$newAttrSorted[$key] = $Attributes[$key];

			$oConfGen = ConfGeneral::model()->findByPk(Yii::app()->user->getConfigId());
			if($oConfGen)
			{
				$oConfGen->attr_exp_order = serialize($newAttrSorted);
				if(!$oConfGen->save())
					$errors = 1;
			}
 
		}
		
/*		if(!$errors)
			Yii::app()->user->setFlash('success', 'Saved!');
		else
			Yii::app()->user->setFlash('error', 'Not saved!');*/
	}
	
	/** Provides anybody to config Property Settings
	 * @param
	 * @return
	 */
		
	public function actionPropertysettings()
	{
		$oNewCategory = new ConfCategory;
		$aParentCategories = ConfCategory::model()->findAllByAttributes(array(	'parent_id'=>NULL, 
																				'conf_gen_id'=>Yii::app()->user->getConfigId()));
		$aChildCats = array();

		foreach ($aParentCategories as $oParent)
			$aChildCats[$oParent->id] = ConfCategory::model()->findAllByAttributes(array('parent_id'=>$oParent->id));

		$oGenConfig = ConfGeneral::model()->findByPk(Yii::app()->user->getConfigId());

		$this->render('propertysettings', array('oNewCategory'=>$oNewCategory,
												'aParentCategories'=>$aParentCategories, 
												'aChildCats'=>$aChildCats,
												'oGenConfig' => $oGenConfig ));
	}

	/** Signed Certifications Settings
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
	 */
	
	public function actionDisclaimersettings() 
	{ 	
		$this->render('discsettings', array('aDiscSettings' => ConfGeneral::getDisclaimerSettings()));
	}
	
	/**
	 * Configuration - Disclaimer Settings
	 */
	
	public function actionResumesettings() 
	{
		$aResumes = ConfResumeSettings::model()->findAllByAttributes(array('conf_gen_id'=>Yii::app()->user->getConfigId()));
		$this->render('resumesettings', array('aResumes' => $aResumes));
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


}
