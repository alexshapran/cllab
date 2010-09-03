<?php
$this->breadcrumbs=array(
	'Conf Categories'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ConfCategory', 'url'=>array('index')),
	array('label'=>'Create ConfCategory', 'url'=>array('create')),
	array('label'=>'View ConfCategory', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ConfCategory', 'url'=>array('admin')),
);
?>

<h1>Update ConfCategory <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>