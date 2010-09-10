<?php
$this->breadcrumbs=array(
	'Conf Scope Of Settings',
);

$this->menu=array(
	array('label'=>'Create ConfScopeOfSettings', 'url'=>array('create')),
	array('label'=>'Manage ConfScopeOfSettings', 'url'=>array('admin')),
);
?>

<h1>Conf Scope Of Settings</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
