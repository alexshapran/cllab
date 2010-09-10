<?php
$this->breadcrumbs=array(
	'Conf Disclaimer Values',
);

$this->menu=array(
	array('label'=>'Create ConfDisclaimerValue', 'url'=>array('create')),
	array('label'=>'Manage ConfDisclaimerValue', 'url'=>array('admin')),
);
?>

<h1>Conf Disclaimer Values</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
