<?php
$this->breadcrumbs=array(
	'Conf Type Of Values'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ConfTypeOfValue', 'url'=>array('index')),
	array('label'=>'Create ConfTypeOfValue', 'url'=>array('create')),
	array('label'=>'View ConfTypeOfValue', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ConfTypeOfValue', 'url'=>array('admin')),
);
?>

<h1>Update ConfTypeOfValue <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>