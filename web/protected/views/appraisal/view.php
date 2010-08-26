<?php
$this->breadcrumbs=array(
	'Appraisals'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Appraisal', 'url'=>array('index')),
	array('label'=>'Create Appraisal', 'url'=>array('create')),
	array('label'=>'Update Appraisal', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Appraisal', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Appraisal', 'url'=>array('admin')),
);
?>

<h1>View Appraisal #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'date_created',
		'client_id',
	),
)); ?>
