<div id="discval<?php echo $model->id ?>" class="form" >

	<div class="row floatleft" style='margin-left:10px;'>
		<?php echo MCHtml::activeTextArea($model,'value',array('rows'=>'1', 'cols'=> 54, 'preName'=>$model->id)); ?>
	</div>

	<div class="row floatleft">
		<?php 
		echo CHtml::ajaxButton('Delete',
							Yii::app()->controller->createUrl('confdisclaimervalue/delete', array('val_id'=>$model->id)),
							array(	'success'=>'function(){ onSuccess('.$model->id.'); }'),
							array(	'style'=>'margin:9px 0 0 9px;',
									'onclick'=>'if(!confirm("Are you sure?")) return false; busy()')
							);
		?>
	</div>
	<div class='clear'></div>
</div>