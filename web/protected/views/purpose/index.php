<?php
$this->breadcrumbs=array(
	'Purposes',
);

$this->menu=array(
	array('label'=>'Create Purpose', 'url'=>array('create')),
	array('label'=>'Manage Purpose', 'url'=>array('admin')),
);
?>

<h1>Purposes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
