<?php
$this->breadcrumbs=array(
	'Conf Glossary Settings'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ConfGlossarySettings', 'url'=>array('index')),
	array('label'=>'Manage ConfGlossarySettings', 'url'=>array('admin')),
);
?>

<h1>Create ConfGlossarySettings</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>