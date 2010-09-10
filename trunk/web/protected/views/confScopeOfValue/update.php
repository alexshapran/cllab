<?php
$this->breadcrumbs=array(
	'Conf Scope Of Values'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ConfScopeOfValue', 'url'=>array('index')),
	array('label'=>'Create ConfScopeOfValue', 'url'=>array('create')),
	array('label'=>'View ConfScopeOfValue', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ConfScopeOfValue', 'url'=>array('admin')),
);
?>

<h1>Update ConfScopeOfValue <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>