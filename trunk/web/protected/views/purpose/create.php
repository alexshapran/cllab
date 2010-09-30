<?php
$this->widget('zii.widgets.grid.CGridView', array(
					'id'=>'PurposeTable',
					'summaryText'=>false,
					'dataProvider'=>$aConfPurposeDataProvider,
					'ajaxUpdate'=>true,
					'columns' => array(
array(	'name'=>'value',
		'type'=>'raw', 
		'value'=>'"<span id=\"span".$data->id."\">$data->value</span>".
		CHtml::beginForm(Yii::app()->controller->createUrl("/purpose/update"), "post",
							array("class"=>"hidden", "id"=>"purpForm$data->id")).
		CHtml::activeTextField($data, "value").
		CHtml::activeHiddenField($data, "id").
		CHtml::ajaxSubmitButton("Save", Yii::app()->controller->createUrl("/purpose/update"), 
											array("update"=>"#allpurposes") ).
		CHtml::endForm()'),

array(	'name'=>'buttons',
		'type'=>'raw',
		'htmlOptions'=>array('style'=>'width:55px;'),
		'value'=>	'CHtml::link("edit", "javascript:", 
										array(	"onclick"=>"displayEdit($data->id)", 
												"id"=>"edit$data->id")) ." | ".
					CHtml::ajaxLink(	"delete", 
										Yii::app()->createUrl(	"/purpose/delete", 
																array(	"id"=>"$data->id")),
					 array(	"update"=>"#allpurposes"), 
					 		array(	"id"=>"delete$data->id",
 									"onclick"=>"if(! confirm(\"Do you want to delete this item?\")) return false;") )'
	 )
	 ),
					'hideHeader' => true ));
?>