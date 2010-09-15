<?php
$this->breadcrumbs=array(
	'Basic Report Parameters',
);

$this->menu=array(
	array('label'=>'Create BasicReportParameters', 'url'=>array('create')),
	array('label'=>'Manage BasicReportParameters', 'url'=>array('admin')),
);
?>

<h1>Basic Report Parameters</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
