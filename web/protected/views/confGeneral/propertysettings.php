<?php
$this->breadcrumbs=array(
	'Conf Generals'=>array('index'),
	$model->id,
);

//$this->menu=array(
//	array('label'=>'List ConfGeneral', 'url'=>array('index')),
//	array('label'=>'Create ConfGeneral', 'url'=>array('create')),
//	array('label'=>'Update ConfGeneral', 'url'=>array('update', 'id'=>$model->id)),
//	array('label'=>'Delete ConfGeneral', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
//	array('label'=>'Manage ConfGeneral', 'url'=>array('admin')),
//);
?>

<?php
$this->renderPartial('_categoryForm', array('model'=>$oNewCategory, 'aParCats'=>$aParentCategories)); 
?>