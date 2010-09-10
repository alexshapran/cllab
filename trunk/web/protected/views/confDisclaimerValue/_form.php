<div class="form">

	<div class="row floatleft" style='margin-left:10px;'>
		<?php echo MCHtml::activeTextArea($model,'value',array('rows'=>'1', 'cols'=> 54, 'preName'=>$model->id)); ?>
	</div>

	<div class="row floatleft">
	<?php 
	echo CHtml::button('Delete', 
			array(
				'style'=>'margin:9px 0 0 9px;',
				'onclick'=>"jQuery.ajax({
									'url':'/index.php?r=confscopeofvalue/delete&val_id=".$model->id."',
									'cache':false,
									'success':function(html){jQuery(\"#block".$model->conf_disc_settings."\").html(html)}});
									return false;"))
	?>
		<?php
//		echo CHtml::ajaxButton('Delete', 
//			Yii::app()->controller->createUrl('/confscopeofvalue/delete', array('val_id'=>$model->id)), 
//			array('update'=>'#block'.$model->conf_sos_id),
//			array('style'=>'margin:9px 0 0 9px;', 'id'=>'deleteValue'.$model->id)) ?>
	</div>
	<div class='clear'></div>
</div>