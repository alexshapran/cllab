<?php
$this->breadcrumbs=array(
	'Conf Disclaimer Settings'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ConfDisclaimerSettings', 'url'=>array('index')),
	array('label'=>'Create ConfDisclaimerSettings', 'url'=>array('create')),
	array('label'=>'View ConfDisclaimerSettings', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ConfDisclaimerSettings', 'url'=>array('admin')),
);
?>

<h1>Update ConfDisclaimerSettings <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>