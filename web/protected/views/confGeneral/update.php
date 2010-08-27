<?php
$this->breadcrumbs=array(
	'Conf Generals'=>array('index'),
	//$model->id=>array('view','id'=>$model->id),
	//'Update',
);

//$this->menu=array(
//	array('label'=>'List ConfGeneral', 'url'=>array('index')),
//	array('label'=>'Create ConfGeneral', 'url'=>array('create')),
//	array('label'=>'View ConfGeneral', 'url'=>array('view', 'id'=>$model->id)),
//	array('label'=>'Manage ConfGeneral', 'url'=>array('admin')),
//);
?>

<!--  <h1>Update ConfGeneral <?php // echo $model->id; ?></h1>	 -->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>