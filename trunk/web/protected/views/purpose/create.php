<?php
$dataProviderPurpose = new CActiveDataProvider('Purpose', array('pagination'=>false));
$this->widget('zii.widgets.grid.CGridView', array(
					'id'=>'PurposeTable',
					'summaryText'=>false,
					'dataProvider'=>$dataProviderPurpose,
					'ajaxUpdate'=>true,
					'columns' => array(
array(	'name'=>'value',
		'type'=>'raw', 
		'value'=>'"<span id=\"span".$data->id."\">$data->value</span>".
		CHtml::beginForm(Yii::app()->controller->createUrl("purpose/update"), "post",array("class"=>"hidden", "id"=>"purpForm$data->id")).
		CHtml::textField("value",$data->value,array()).
		CHtml::hiddenField("id",$data->id).
		CHtml::ajaxSubmitButton("Save", Yii::app()->controller->createUrl("purpose/update"), array("update"=>"#allpurposes") ).
		CHtml::endForm()' ),

array(	'name'=>'value',
		'type'=>'raw',
		'value'=>'"<span id=\"edit$data->id\" onclick=\"displayEdit($data->id)\">edit</span> | ".CHtml::ajaxLink("delete", Yii::app()->createUrl("purpose/delete", array("id"=>"$data->id")) )'
	 )
	 ),
					'hideHeader' => true
	 ));
	 ?>