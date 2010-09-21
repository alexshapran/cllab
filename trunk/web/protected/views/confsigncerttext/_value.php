<div id='valueform<?php echo $model->id ?>' style='border: 1px dashed grey; min-width: 100%; padding: 10px;'>
<?php echo MCHtml::activeTextArea($model, 'value', array('cols'=>70, 'preName'=>$model->id)); ?>
<?php echo MCHTML::activeHiddenField($model, 'id', array('preName'=>$model->id)) ?>


<?php //								'success': function(html){jQuery(\"#section".$model->conf_sign_cert_settings_id."\").html(html)}});return false;", ?>
<?php echo CHtml::button('Delete', 
		array(	'onclick' => " busy(); jQuery.ajax({
								'url':'".Yii::app()->controller->createUrl('confsigncerttext/deleteajax', array('textId'=>$model->id))."',
								'cache':false,
								'success':function(){ hide(".$model->id.")} })",
				'style'=>'margin: 16px 0 0 5px; position: absolute')) ?>
</div>