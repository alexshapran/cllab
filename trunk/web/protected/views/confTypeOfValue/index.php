<?php
$this->breadcrumbs=array(
	'Conf Type Of Values',
);

$this->menu=array(
	array('label'=>'Create ConfTypeOfValue', 'url'=>array('create')),
	array('label'=>'Manage ConfTypeOfValue', 'url'=>array('admin')),
);
?>

<h1>Conf Type Of Values</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
