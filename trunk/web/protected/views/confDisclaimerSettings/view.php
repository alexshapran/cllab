<?php
$this->breadcrumbs=array(
	'Conf Disclaimer Settings'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List ConfDisclaimerSettings', 'url'=>array('index')),
	array('label'=>'Create ConfDisclaimerSettings', 'url'=>array('create')),
	array('label'=>'Update ConfDisclaimerSettings', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ConfDisclaimerSettings', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ConfDisclaimerSettings', 'url'=>array('admin')),
);
?>

<h1>View ConfDisclaimerSettings #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'conf_gen_id',
	),
)); ?>
