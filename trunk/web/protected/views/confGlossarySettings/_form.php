<div id="glossaryform<?php echo $model->id ?>" class="form">
	<div class="row floatleft">
		<?php echo MCHtml::activeTextField($model,'name',array('size'=>16,'maxlength'=>255, 'preName'=>$model->id)); ?>
	</div>
	<div class="row floatleft" style='margin-left: 20px;'>
		<?php echo MCHtml::activeTextArea($model,'value',array('rows'=>2, 'cols'=>40, 'preName'=>$model->id)); ?>
	</div>
	<div class="row buttons floatleft" style='margin-left: 20px;'>
	<?php echo CHtml::button('Delete',
					array('onclick'=>"jQuery.ajax({
						'dataType':'json',
						'url':'".Yii::app()->controller->createUrl('/confglossarysettings/delete', array('id' => $model->id))."',
						'success': function(transport){ removeMe(transport); },
						'cache':false
						});
						return false;",
						'id'=>'deleteButton'.$model->id,
						'style'=>'margin-top:15px;')) ?>
	</div>
</div>