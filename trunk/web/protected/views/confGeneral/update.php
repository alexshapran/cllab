<div id="configuration_tabs">
	<ul>
		<li><?php echo CHtml::link('General Parametsrs', Yii::app()->controller->createUrl('/confgeneral/update/')); ?></li>
		<li><?php echo CHtml::link('Fonts & Images', Yii::app()->controller->createUrl('/confgeneral/fontsandimages')); ?></li>
		<li><?php echo CHtml::link('Property Settings',Yii::app()->controller->createUrl('/confgeneral/propertysettings')); ?></li>
		<li><?php echo CHtml::link('Signed Certification Settings', Yii::app()->controller->createUrl('/confgeneral/signedcertification')); ?></li>
		<li><?php echo CHtml::link('Scope of Work Settings', Yii::app()->controller->createUrl('/confgeneral/scopeofsettings') ); ?></li>
		<li><?php echo CHtml::link('Disclaimer Settings', Yii::app()->controller->createUrl('/confgeneral/disclaimersettings') ) ; ?></li>
		<li><?php echo CHtml::link('Resume Settings', Yii::app()->controller->createUrl('/confgeneral/resumesettings')); ?></li>
		<li><?php echo CHtml::link('Glossary Settings', Yii::app()->controller->createUrl('/confgeneral/glossarysettings')); ?></li>
	</ul>
</div>

<?php
//$this->breadcrumbs=array(
	//'Conf Generals'=>array('index'),
	//$model->id=>array('view','id'=>$model->id),
	//'Update',
//);

//$this->menu=array(
//	array('label'=>'List ConfGeneral', 'url'=>array('index')),
//	array('label'=>'Create ConfGeneral', 'url'=>array('create')),
//	array('label'=>'View ConfGeneral', 'url'=>array('view', 'id'=>$model->id)),
//	array('label'=>'Manage ConfGeneral', 'url'=>array('admin')),
//);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model, 
								'aConfTypeDataProvider'=> $aConfTypeDataProvider, 
								'aConfPurposeDataProvider'=> $aConfPurposeDataProvider)); ?>