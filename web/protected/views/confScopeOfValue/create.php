<?php
$this->breadcrumbs=array(
	'Conf Scope Of Values'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ConfScopeOfValue', 'url'=>array('index')),
	array('label'=>'Manage ConfScopeOfValue', 'url'=>array('admin')),
);
?>

<h1>Create ConfScopeOfValue</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>