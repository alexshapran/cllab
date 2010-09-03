<?php
$this->breadcrumbs=array(
	'Conf Sign Cert Settings'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ConfSignCertSettings', 'url'=>array('index')),
	array('label'=>'Manage ConfSignCertSettings', 'url'=>array('admin')),
);
?>

<h1>Create ConfSignCertSettings</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>