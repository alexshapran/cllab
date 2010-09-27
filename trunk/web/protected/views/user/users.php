<?php $filterBy = isset($_GET['filterBy']) ? $_GET['filterBy'] : 0 ?>

<div style='min-width:600px;'>
<?php echo CHtml::button('Add User', array('onClick'=>'location.replace(\''.yii::app()->createUrl("user/update").'\')')) ?>
<?php echo CHtml::dropDownList('sortBy','', 
								CHtml::listData($accounts, 'id', 'value'), 
								array(	
									'prompt'=> $filterBy ? 'Disable filter' : 'Filter by Account', 
									'onchange'=>'location.replace("'.Yii::app()->controller->createUrl(	'/user/users', array(	'filterBy'=>'')).'"+$("#sortBy").attr("value"))', 
																												'class'=>'floatright' )) ?>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'accountsTable',
	'summaryText'=>false,
	'dataProvider'=>$aUsers,
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
</div>
<?php if($filterBy) { ?>
	<script type='text/javascript'>
		$("#sortBy").val(<?php echo $filterBy ?>);
	</script>
<?php } ?>