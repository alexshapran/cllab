<?php
$this->breadcrumbs=array(
	'Conf Categories',
);

$this->menu=array(
	array('label'=>'Create ConfCategory', 'url'=>array('create')),
	array('label'=>'Manage ConfCategory', 'url'=>array('admin')),
);
?>

<h1>Conf Categories</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
