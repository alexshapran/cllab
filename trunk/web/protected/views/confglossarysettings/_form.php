<div id="glossaryform<?php echo $model->id ?>" class="form">
	<div class="row floatleft">
		<?php echo MCHtml::activeTextField($model,'name',array('size'=>16,'maxlength'=>255, 'preName'=>$model->id)); ?>
	</div>
	<div class="row floatleft" style='margin-left: 20px;'>
		<?php echo MCHtml::activeTextArea($model,'value',array('rows'=>2, 'cols'=>40, 'preName'=>$model->id)); ?>
	</div>
	<div class="row buttons floatleft" style='margin-left: 20px;'>
	<?php
		echo CHtml::ajaxButton(
				'Delete',
				Yii::app()->controller->createUrl(	'/confglossarysettings/delete', 
													array('id' => $model->id)),
				array(	'dataType'=>'json',
						'success' => 'function(transport){ removeMe(transport); unbusy() }'),
				array(	'id'=>'deleteButton'.$model->id,
						'style'=>'margin-top:15px;',
						'onclick'=>'busy()')
				)
?>
	</div>
</div>