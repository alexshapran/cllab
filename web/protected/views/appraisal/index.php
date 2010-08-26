<?php
$this->breadcrumbs=array(
	'Appraisals',
);

$this->menu=array(
	array('label'=>'Create Appraisal', 'url'=>array('create')),
	array('label'=>'Manage Appraisal', 'url'=>array('admin')),
);
?>

<h1>Appraisals</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
