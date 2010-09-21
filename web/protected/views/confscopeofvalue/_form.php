<div id="scopevalue<?php echo $model->id ?>">
	<?php if($allowtitle) { ?>
	<div class="row floatleft">
		<?php echo MCHtml::activeTextField($model,'name',array('size'=>15,'maxlength'=>255, 'preName'=>$model->id)); ?>
	</div>
	<?php } ?>

	<div class="row floatleft" style='margin-left:10px;'>
		<?php echo MCHtml::activeTextArea($model,'value',array('rows'=>'1', 'cols'=> $allowtitle ? 40 : 54, 'preName'=>$model->id)); ?>
	</div>
		
	<div class="row floatleft">
		<?php echo MCHtml::activeHiddenField($model,'conf_sos_id', array('preName'=>$model->id)); ?>
	</div>
	
	<div class="row floatleft">
		<?php
			echo CHtml::ajaxButton(
					'Delete',
					Yii::app()->controller->createUrl('/confscopeofvalue/delete', array('val_id'=>$model->id)),
					array(	'success'=>'function(html){ unbusy(); $("#scopevalue'.$model->id.'").remove(); }'),
					array(	'style'=>'margin:9px 0 0 9px;',
							'onclick'=>'busy()'));
		?>
	</div>
	<div class='clear'></div>
</div>