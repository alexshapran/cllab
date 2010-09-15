<?php
$this->breadcrumbs=array(
	'Conf Categories'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List ConfCategory', 'url'=>array('index')),
	array('label'=>'Create ConfCategory', 'url'=>array('create')),
	array('label'=>'Update ConfCategory', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ConfCategory', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ConfCategory', 'url'=>array('admin')),
);
?>

<h1>View ConfCategory #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'parent_id',
		'name',
	),
)); ?>
