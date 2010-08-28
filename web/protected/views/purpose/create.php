<?php
$this->breadcrumbs=array(
	'Purposes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Purpose', 'url'=>array('index')),
	array('label'=>'Manage Purpose', 'url'=>array('admin')),
);
?>

<h1>Create Purpose</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>