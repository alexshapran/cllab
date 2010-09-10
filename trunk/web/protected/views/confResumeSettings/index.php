<?php
$this->breadcrumbs=array(
	'Conf Resume Settings',
);

$this->menu=array(
	array('label'=>'Create ConfResumeSettings', 'url'=>array('create')),
	array('label'=>'Manage ConfResumeSettings', 'url'=>array('admin')),
);
?>

<h1>Conf Resume Settings</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
