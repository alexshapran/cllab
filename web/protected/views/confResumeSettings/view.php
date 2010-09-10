<?php
$this->breadcrumbs=array(
	'Conf Resume Settings'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ConfResumeSettings', 'url'=>array('index')),
	array('label'=>'Create ConfResumeSettings', 'url'=>array('create')),
	array('label'=>'Update ConfResumeSettings', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ConfResumeSettings', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ConfResumeSettings', 'url'=>array('admin')),
);
?>

<h1>View ConfResumeSettings #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'value',
		'conf_gen_id',
	),
)); ?>
