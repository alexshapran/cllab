<?php
$this->breadcrumbs=array(
	'Conf Sign Cert Texts'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ConfSignCertText', 'url'=>array('index')),
	array('label'=>'Create ConfSignCertText', 'url'=>array('create')),
	array('label'=>'Update ConfSignCertText', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ConfSignCertText', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ConfSignCertText', 'url'=>array('admin')),
);
?>

<h1>View ConfSignCertText #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'value',
		'conf_general_id',
		'conf_sign_cert_settings_id',
	),
)); ?>
