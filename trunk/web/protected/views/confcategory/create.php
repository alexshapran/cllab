<?php
$this->breadcrumbs=array(
	'Conf Categories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ConfCategory', 'url'=>array('index')),
	array('label'=>'Manage ConfCategory', 'url'=>array('admin')),
);
?>

<h1>Create ConfCategory</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>