<div class="row clear" id="resume<?php echo $model->id ?>">
	<?php echo MCHtml::activeTextArea($model, 'value', array('rows'=>6, 'cols'=>50, 'preName'=>$model->id, 'style'=>'float:left')); ?>
	<?php echo CHtml::ajaxButton('Delete', 
						Yii::app()->controller->createUrl('confresumesettings/delete', array('id'=>$model->id)), 
						array(	'success'=>'function(transport){ removeElement(transport) }',
								'dataType'=>'json'),
						array(	'onclick'=>'busy()',
								'style'=>'margin:40px 0 0 10px;')) ?>
</div><!-- form -->