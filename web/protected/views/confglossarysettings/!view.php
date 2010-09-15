<?php
$this->breadcrumbs=array(
	'Conf Glossary Settings'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List ConfGlossarySettings', 'url'=>array('index')),
	array('label'=>'Create ConfGlossarySettings', 'url'=>array('create')),
	array('label'=>'Update ConfGlossarySettings', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ConfGlossarySettings', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ConfGlossarySettings', 'url'=>array('admin')),
);
?>

<h1>View ConfGlossarySettings #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'value',
		'conf_gen_id',
	),
)); ?>
