<?php
$this->breadcrumbs=array(
	'Appraisals'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Appraisal', 'url'=>array('index')),
	array('label'=>'Manage Appraisal', 'url'=>array('admin')),
);
?>

<h1>Create Appraisal</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>