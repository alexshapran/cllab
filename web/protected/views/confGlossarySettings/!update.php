<?php
$this->breadcrumbs=array(
	'Conf Glossary Settings'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ConfGlossarySettings', 'url'=>array('index')),
	array('label'=>'Create ConfGlossarySettings', 'url'=>array('create')),
	array('label'=>'View ConfGlossarySettings', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ConfGlossarySettings', 'url'=>array('admin')),
);
?>

<h1>Update ConfGlossarySettings <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>