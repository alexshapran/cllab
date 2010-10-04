<?php
$this->breadcrumbs=array(
	'Privileges'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Privilege', 'url'=>array('index')),
	array('label'=>'Manage Privilege', 'url'=>array('admin')),
);
?>

<h1>Create Privilege</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>