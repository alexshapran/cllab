<?php
$this->breadcrumbs=array(
	'Conf Sign Cert Settings'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List ConfSignCertSettings', 'url'=>array('index')),
	array('label'=>'Create ConfSignCertSettings', 'url'=>array('create')),
	array('label'=>'Update ConfSignCertSettings', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ConfSignCertSettings', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ConfSignCertSettings', 'url'=>array('admin')),
);
?>

<h1>View ConfSignCertSettings #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
	),
)); ?>
