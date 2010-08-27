<?php
$this->breadcrumbs=array(
	'Conf Generals',
);

$this->menu=array(
	array('label'=>'Create ConfGeneral', 'url'=>array('create')),
	array('label'=>'Manage ConfGeneral', 'url'=>array('admin')),
);
?>

<h1>Conf Generals</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
