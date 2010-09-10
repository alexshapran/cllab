<?php
$this->breadcrumbs=array(
	'Conf Scope Of Settings'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ConfScopeOfSettings', 'url'=>array('index')),
	array('label'=>'Manage ConfScopeOfSettings', 'url'=>array('admin')),
);
?>

<h1>Create ConfScopeOfSettings</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>