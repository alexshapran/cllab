<?php
$this->breadcrumbs=array(
	'Conf Sign Cert Texts',
);

$this->menu=array(
	array('label'=>'Create ConfSignCertText', 'url'=>array('create')),
	array('label'=>'Manage ConfSignCertText', 'url'=>array('admin')),
);
?>

<h1>Conf Sign Cert Texts</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
