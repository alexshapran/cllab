<span id='settLine<?php echo $model->id ?>'>
<span id='settName<?php echo $model->id ?>'><?php echo $model->name; ?></span>
&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo CHtml::link('edit', 'javascript:', array(
		'onclick'=>'toggle('.$model->id.')',
		'id'=>'link'.$model->id)) ?>
</span>
<span id='settText<?php echo $model->id ?>' class='hidden'>
	<?php echo CHtml::activeTextField($model, 'name', array('id'=>'newText'.$model->id)) ?>
	<?php // 
		echo CHtml::button(	'Save',  
			array('onclick'=>"busy(); jQuery.ajax({	
			'method':'GET', 
			'success': function(){ unbusy(); toggle($model->id); $('#settName$model->id').html( $('#newText$model->id').val() ) } ,
			'url':'".Yii::app()->controller->createUrl('/confscopeofsettings/update')."?newtext='+$(\"#newText".$model->id."\").val()+'&id=".$model->id."',
			'cache':false}); return false;")); ?>
</span>

<?php 
	foreach($model->confScopeOfValues as $oValue)
		if($oValue)
			$this->renderPartial('/confscopeofvalue/_form', array(	
																'model'=>$oValue, 
																'allowtitle'=>$model->add_has_name));
?>

<div class='sosAddBefore' id='addBefore<?php echo $model->id ?>'>
	<?php if($model->allow_add_more) { ?>
	<?php 
			echo CHtml::ajaxLink(
					'Add More',
					Yii::app()->controller->createUrl('/confscopeofvalue/create', array('sos_id'=>$model->id)),
					array(	'dataType'=>'json',
							'success'=>'function(transport){ addField(transport); }'),
					array('click'=>'busy()')
					);
	?>
	<?php } ?>
</div>