<?php
$this->breadcrumbs=array(
	'Conf Scope Of Values'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List ConfScopeOfValue', 'url'=>array('index')),
	array('label'=>'Create ConfScopeOfValue', 'url'=>array('create')),
	array('label'=>'Update ConfScopeOfValue', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ConfScopeOfValue', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ConfScopeOfValue', 'url'=>array('admin')),
);
?>

<h1>View ConfScopeOfValue #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'value',
		'conf_sos_id',
	),
)); ?>
