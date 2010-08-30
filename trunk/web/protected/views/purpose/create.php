<?php 
$dataProviderPurpose = new CActiveDataProvider('Purpose', array('pagination'=>false));
$this->widget('zii.widgets.grid.CGridView', array(
					'id'=>'PurposeTable',
					'summaryText'=>false,
					'dataProvider'=>$dataProviderPurpose,
					'ajaxUpdate'=>true,
					'columns' => array('value',
array(	'class'			=>'CButtonColumn',
												'template'		=>'{update} {delete}',
												'updateButtonUrl'	=>'Yii::app()->controller->createUrl("purpose/update", array("id"=>$data->id))',
												'deleteButtonUrl'	=>'Yii::app()->controller->createUrl("purpose/delete", array("id"=>$data->id))' 
												)),
					'hideHeader' => true
												));?>