<?php
$this->breadcrumbs=array(
	'Conf Disclaimer Values'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ConfDisclaimerValue', 'url'=>array('index')),
	array('label'=>'Create ConfDisclaimerValue', 'url'=>array('create')),
	array('label'=>'Update ConfDisclaimerValue', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ConfDisclaimerValue', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ConfDisclaimerValue', 'url'=>array('admin')),
);
?>

<h1>View ConfDisclaimerValue #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'value',
		'conf_disc_settings',
	),
)); ?>
