<?php
$this->breadcrumbs=array(
	'Conf Resume Settings'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ConfResumeSettings', 'url'=>array('index')),
	array('label'=>'Manage ConfResumeSettings', 'url'=>array('admin')),
);
?>

<h1>Create ConfResumeSettings</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>