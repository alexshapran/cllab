<?php
$this->breadcrumbs=array(
	'Objects'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Object', 'url'=>array('index')),
	array('label'=>'Create Object', 'url'=>array('create')),
	array('label'=>'View Object', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Object', 'url'=>array('admin')),
);
?>

<h1>Update Object <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>