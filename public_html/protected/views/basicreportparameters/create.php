<?php
$this->breadcrumbs=array(
	'Basic Report Parameters'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List BasicReportParameters', 'url'=>array('index')),
	array('label'=>'Manage BasicReportParameters', 'url'=>array('admin')),
);
?>

<h1>Create BasicReportParameters</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>