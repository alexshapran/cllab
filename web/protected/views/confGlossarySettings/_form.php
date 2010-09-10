<div class="form">
	<div class="row floatleft">
		<?php echo MCHtml::activeTextField($model,'name',array('size'=>16,'maxlength'=>255, 'preName'=>$model->id)); ?>
	</div>
	<div class="row floatleft" style='margin-left: 20px;'>
		<?php echo MCHtml::activeTextArea($model,'value',array('rows'=>2, 'cols'=>40, 'preName'=>$model->id)); ?>
	</div>
	<div class="row buttons floatleft" style='margin-left: 20px;'>
	<?php echo CHtml::button('Delete',
					array('onclick'=>"jQuery.ajax({
						'url':'".Yii::app()->controller->createUrl('/confglossarysettings/delete', array('id' => $model->id))."',
						'cache':false,
						'success':function(html){jQuery(\"#glossary_settings\").html(html)}});
						return false;")) ?>
	</div>
</div>