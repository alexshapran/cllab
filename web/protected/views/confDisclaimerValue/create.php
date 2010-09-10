<?php
$this->breadcrumbs=array(
	'Conf Disclaimer Values'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ConfDisclaimerValue', 'url'=>array('index')),
	array('label'=>'Manage ConfDisclaimerValue', 'url'=>array('admin')),
);
?>

<h1>Create ConfDisclaimerValue</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>