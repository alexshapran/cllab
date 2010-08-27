<?php
$this->breadcrumbs=array(
	'Conf Generals'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ConfGeneral', 'url'=>array('index')),
	array('label'=>'Manage ConfGeneral', 'url'=>array('admin')),
);
?>

<h1>Create ConfGeneral</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>