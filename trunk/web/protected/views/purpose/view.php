<?php
$this->breadcrumbs=array(
	'Purposes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Purpose', 'url'=>array('index')),
	array('label'=>'Create Purpose', 'url'=>array('create')),
	array('label'=>'Update Purpose', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Purpose', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Purpose', 'url'=>array('admin')),
);
?>

<h1>View Purpose #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'value',
	),
)); ?>
