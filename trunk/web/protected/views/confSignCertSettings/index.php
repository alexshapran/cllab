<?php
$this->breadcrumbs=array(
	'Conf Sign Cert Settings',
);

$this->menu=array(
	array('label'=>'Create ConfSignCertSettings', 'url'=>array('create')),
	array('label'=>'Manage ConfSignCertSettings', 'url'=>array('admin')),
);
?>

<h1>Conf Sign Cert Settings</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
