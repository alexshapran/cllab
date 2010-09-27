<?php
$dataProvider = new CActiveDataProvider('Account');
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'accountsTable',
	'summaryText'=>false,
	'dataProvider'=>$dataProvider,
	'ajaxUpdate'=>true,
	'columns' => array('value',
						array(	'class'			=>'CButtonColumn',
								'htmlOptions'	=>array('class'=>'buttonsUpdateDelete'),
								'template'		=>'{update} | {delete}',
								'updateButtonUrl'	=>'Yii::app()->controller->createUrl("account/update", array("id"=>$data->id))',
								'deleteButtonUrl'	=>'Yii::app()->controller->createUrl("account/delete", array("id"=>$data->id))',
								'updateButtonLabel' =>'edit',
								'deleteButtonLabel' =>'delete',
								'updateButtonImageUrl'=>false,
								'deleteButtonImageUrl'=>false,
						)),
	'hideHeader' => true
	));
?>