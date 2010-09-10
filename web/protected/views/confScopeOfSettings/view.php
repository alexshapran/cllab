<?php
$this->breadcrumbs=array(
	'Conf Scope Of Settings'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List ConfScopeOfSettings', 'url'=>array('index')),
	array('label'=>'Create ConfScopeOfSettings', 'url'=>array('create')),
	array('label'=>'Update ConfScopeOfSettings', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ConfScopeOfSettings', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ConfScopeOfSettings', 'url'=>array('admin')),
);
?>

<h1>View ConfScopeOfSettings #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'allow_add_more',
		'add_has_name',
		'conf_gen_id',
	),
)); ?>
