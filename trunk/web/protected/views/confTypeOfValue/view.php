<?php
$this->breadcrumbs=array(
	'Conf Type Of Values'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List ConfTypeOfValue', 'url'=>array('index')),
	array('label'=>'Create ConfTypeOfValue', 'url'=>array('create')),
	array('label'=>'Update ConfTypeOfValue', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ConfTypeOfValue', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ConfTypeOfValue', 'url'=>array('admin')),
);
?>

<h1>View ConfTypeOfValue #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'definition',
		'source',
	),
)); ?>
