<?php
$this->breadcrumbs=array(
	'Conf Disclaimer Values'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ConfDisclaimerValue', 'url'=>array('index')),
	array('label'=>'Create ConfDisclaimerValue', 'url'=>array('create')),
	array('label'=>'View ConfDisclaimerValue', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ConfDisclaimerValue', 'url'=>array('admin')),
);
?>

<h1>Update ConfDisclaimerValue <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>