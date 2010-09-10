<?php
$this->breadcrumbs=array(
	'Conf Scope Of Values',
);

$this->menu=array(
	array('label'=>'Create ConfScopeOfValue', 'url'=>array('create')),
	array('label'=>'Manage ConfScopeOfValue', 'url'=>array('admin')),
);
?>

<h1>Conf Scope Of Values</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
