<?php
$this->breadcrumbs=array(
	'Conf Disclaimer Settings'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ConfDisclaimerSettings', 'url'=>array('index')),
	array('label'=>'Manage ConfDisclaimerSettings', 'url'=>array('admin')),
);
?>

<h1>Create ConfDisclaimerSettings</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>