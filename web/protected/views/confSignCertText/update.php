<?php
$this->breadcrumbs=array(
	'Conf Sign Cert Texts'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ConfSignCertText', 'url'=>array('index')),
	array('label'=>'Create ConfSignCertText', 'url'=>array('create')),
	array('label'=>'View ConfSignCertText', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ConfSignCertText', 'url'=>array('admin')),
);
?>

<h1>Update ConfSignCertText <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>