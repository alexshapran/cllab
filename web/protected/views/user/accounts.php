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
<?php
//$dataProvider = new CActiveDataProvider('Account');
//$this->widget('zii.widgets.grid.CGridView', array(
//	'id'=>'accountsTable',
//	'summaryText'=>false,
//	'dataProvider'=>$dataProvider,
//	'ajaxUpdate'=>true,
//	'columns' => array('value',
//						array(	'class'			=>'CButtonColumn',
//								'htmlOptions'	=>array('style'=>'width:63px;'),
//								'template'		=>'{update} | {delete}',
//								'updateButtonUrl'	=>'Yii::app()->controller->createUrl("account/update", array("id"=>$data->id))',
//								'deleteButtonUrl'	=>'Yii::app()->controller->createUrl("account/delete", array("id"=>$data->id))',
//								'updateButtonLabel' =>'edit',
//								'deleteButtonLabel' =>'delete',
//								'updateButtonImageUrl'=>false,
//								'deleteButtonImageUrl'=>false,
//						)),
//	'hideHeader' => true
//	));
?>