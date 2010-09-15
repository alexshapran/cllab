<?php
$this->breadcrumbs=array(
	'Basic Report Parameters'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List BasicReportParameters', 'url'=>array('index')),
	array('label'=>'Create BasicReportParameters', 'url'=>array('create')),
	array('label'=>'View BasicReportParameters', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage BasicReportParameters', 'url'=>array('admin')),
);
?>

<h1>Update BasicReportParameters <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>