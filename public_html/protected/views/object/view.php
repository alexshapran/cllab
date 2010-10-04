<?php
$this->breadcrumbs=array(
	'Objects'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Object', 'url'=>array('index')),
	array('label'=>'Create Object', 'url'=>array('create')),
	array('label'=>'Update Object', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Object', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Object', 'url'=>array('admin')),
);
?>

<h1>View Object #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'appraisal_id',
		'category_id',
		'sub_category_id',
		'location',
		'location1',
		'location2',
		'client_ret',
		'value',
		'value2',
		'description',
		'provenance',
		'exhibited',
		'literature',
		'title',
		'maker_artist',
		'dimensions',
		'medium',
		'date_period',
		'markings',
		'condition',
		'acqusition_cost',
		'acqusition_date',
		'acqusition_source',
		'is_active',
		'notes',
		'export_order',
	),
)); ?>
