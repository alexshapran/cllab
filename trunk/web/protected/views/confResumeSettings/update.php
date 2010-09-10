<?php
$this->breadcrumbs=array(
	'Conf Resume Settings'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ConfResumeSettings', 'url'=>array('index')),
	array('label'=>'Create ConfResumeSettings', 'url'=>array('create')),
	array('label'=>'View ConfResumeSettings', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ConfResumeSettings', 'url'=>array('admin')),
);
?>

<h1>Update ConfResumeSettings <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>