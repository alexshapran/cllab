<?php
$this->breadcrumbs=array(
	'Conf Type Of Values'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ConfTypeOfValue', 'url'=>array('index')),
	array('label'=>'Manage ConfTypeOfValue', 'url'=>array('admin')),
);
?>

<h1>Create ConfTypeOfValue</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>