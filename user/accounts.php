<?php
$this->breadcrumbs=array(
	'Users',
);

//$this->menu=array(
//array('label'=>'Create User', 'url'=>array('create')),
//array('label'=>'Manage User', 'url'=>array('admin')),
//);
?>

<h3>Accounts</h3>

<?php echo $this->renderPartial('_smallform', array('model'=>$model)); ?>
<?php echo $this->renderPartial('/account/_accounts') ?>