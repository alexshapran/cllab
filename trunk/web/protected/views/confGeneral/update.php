<div id="configuration_tabs">
	<ul>
		<li><?php echo CHtml::link('General Parametsrs','/confgeneral/update/1'); ?></li>
		<li><?php echo CHtml::link('Fonts & Images','#'); ?></li>
		<li><?php echo CHtml::link('Property Settings','#'); ?></li>
		<li><?php echo CHtml::link('Signed Certification Settings','#'); ?></li>
		<li><?php echo CHtml::link('Scope of Work Settings','#'); ?></li>
		<li><?php echo CHtml::link('Disclaimer Settings','#'); ?></li>
		<li><?php echo CHtml::link('Resume Settings','#'); ?></li>
		<li><?php echo CHtml::link('Glossary Settings','#'); ?></li>
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

<!--  <h1>Update ConfGeneral <?php // echo $model->id; ?></h1>	 -->

<?php echo $this->renderPartial('_form', array('model'=>$model, 'oConfTypeOfValue'=> $oConfTypeOfValue, 'oPurpose'=> $oPurpose)); ?>

