<?php
$this->breadcrumbs=array(
	'Users',
);

//$this->menu=array(
//array('label'=>'Create User', 'url'=>array('create')),
//array('label'=>'Manage User', 'url'=>array('admin')),
//);
?>

<h3>Users</h3>
<?php echo CHtml::button('Add User', array('onClick'=>'location.replace(\''.yii::app()->createUrl("user/update").'\')')) ?>

<?php
$dataProvider = new CActiveDataProvider('User');
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'accountsTable',
	'summaryText'=>false,
	'dataProvider'=>$dataProvider,
	'ajaxUpdate'=>true,
	'columns' => array('username','name','date_added',
						array('name'=>'account_id', 'value'=>'$data->account->value'),
						array('name'=>'privilege_id', 'value'=>'$data->privilege->value'),
						array(	'class'			=>'CButtonColumn',
								'template'		=>'{update} {delete}',
								'updateButtonUrl'	=>'Yii::app()->controller->createUrl("user/update", array("id"=>$data->id))',
								'deleteButtonUrl'	=>'Yii::app()->controller->createUrl("user/delete", array("id"=>$data->id))' 
						)),
	'hideHeader' => false
	));
?>