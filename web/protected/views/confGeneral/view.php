<?php
$this->breadcrumbs=array(
	'Conf Generals'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ConfGeneral', 'url'=>array('index')),
	array('label'=>'Create ConfGeneral', 'url'=>array('create')),
	array('label'=>'Update ConfGeneral', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ConfGeneral', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ConfGeneral', 'url'=>array('admin')),
);
?>

<h1>View ConfGeneral #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'company_name',
		'phone',
		'email',
		'website',
		'address',
		'city',
		'state',
		'zip',
		'default_currency',
		'header',
		'footer',
		'privacy_policy',
	),
)); ?>
