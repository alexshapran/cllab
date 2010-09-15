<?php
$this->breadcrumbs=array(
	'Conf Disclaimer Settings',
);

$this->menu=array(
	array('label'=>'Create ConfDisclaimerSettings', 'url'=>array('create')),
	array('label'=>'Manage ConfDisclaimerSettings', 'url'=>array('admin')),
);
?>

<h1>Conf Disclaimer Settings</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
