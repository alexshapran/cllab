<?php
$this->breadcrumbs=array(
	'Conf Sign Cert Settings'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ConfSignCertSettings', 'url'=>array('index')),
	array('label'=>'Create ConfSignCertSettings', 'url'=>array('create')),
	array('label'=>'View ConfSignCertSettings', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ConfSignCertSettings', 'url'=>array('admin')),
);
?>

<h1>Update ConfSignCertSettings <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>