<?php

$this->widget('zii.widgets.grid.CGridView', array(
	'id'			=>'accountsTable',
	'dataProvider'	=>$dataProvider,
	'ajaxUpdate'	=>true,
	'columns' 		=> array('value',
						array(	'class'			=>'CButtonColumn',
								'template'		=>'{update} {delete}',
								'updateButtonUrl'	=>'Yii::app()->controller->createUrl("account/update", array("id"=>$data->id))',
								'deleteButtonUrl'	=>'Yii::app()->controller->createUrl("account/delete", array("id"=>$data->id))' 
						)),
	'hideHeader' => true
	));
?>