<?php
$this->breadcrumbs=array(
	'Conf Scope Of Settings'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ConfScopeOfSettings', 'url'=>array('index')),
	array('label'=>'Create ConfScopeOfSettings', 'url'=>array('create')),
	array('label'=>'View ConfScopeOfSettings', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ConfScopeOfSettings', 'url'=>array('admin')),
);
?>

<h1>Update ConfScopeOfSettings <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>