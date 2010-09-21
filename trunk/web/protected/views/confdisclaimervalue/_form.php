<div id="discval<?php echo $model->id ?>" class="form">

	<div class="row floatleft" style='margin-left:10px;'>
		<?php echo MCHtml::activeTextArea($model,'value',array('rows'=>'1', 'cols'=> 54, 'preName'=>$model->id)); ?>
	</div>

	<div class="row floatleft">
		<?php 
		echo CHtml::button('Delete', 
				array(
					'style'=>'margin:9px 0 0 9px;',
					'onclick'=>"jQuery.ajax({
										'url':'".yii::app()->controller->createUrl('confdisclaimervalue/delete', array('val_id'=>$model->id))."',
										'cache':false,
										'success':function(){ onSuccess(".$model->id.") }});
										busy();
										return false;"))
		?>
	</div>
	<div class='clear'></div>
</div>