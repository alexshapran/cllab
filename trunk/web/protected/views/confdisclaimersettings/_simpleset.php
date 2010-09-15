<span id='settLine<?php echo $model->id ?>'>
<span id='settName<?php echo $model->id ?>'><?php	echo $model->name; ?></span>
&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo CHtml::link('edit', 'javascript:', array(
		'onclick'=>'toggle('.$model->id.')',
		'id'=>'link'.$model->id)) ?>
</span>
<span id='settText<?php echo $model->id ?>' class='hidden'>
<?php echo CHtml::activeTextField($model, 'name', array('id'=>'newText'.$model->id)) ?>
<?php echo CHtml::button(	'Save',  
	array('onclick'=>"jQuery.ajax({	
	'method':'GET', 
	'success': function(){ toggle($model->id); $('#settName$model->id').html( $('#newText$model->id').val() ) } ,
	'url':'".Yii::app()->controller->createUrl('confdisclaimersettings/update')."&newtext='+$(\"#newText".$model->id."\").val()+'&id=".$model->id."',
	'cache':false}); return false;")); ?>
</span>

<?php foreach($model->confDisclaimerValues as $oValue) { ?>
<?php 
if($oValue){
	$this->renderPartial('/confdisclaimervalue/_form', array('model'=>$oValue));
} ?>
<?php } ?>

<div style='width:30%; margin:0 auto 20px;'>
<?php echo CHtml::link('Add More', 'javascript:',
			array('onclick'=>"jQuery.ajax({
			'url':'".Yii::app()->controller->createUrl('/confdisclaimervalue/create')."&sos_id=".$model->id."',
								'cache':false,
								'success':function(html){jQuery(\"#block".$model->id."\").html(html)}});
								return false;")) ?>
								
<?php 
//	echo CHtml::ajaxLink(
//		'Add More', 
//		Yii::app()->controller->createUrl('/confscopeofvalue/create', array('sos_id'=>$model->id)), 
//		array('update'=>'#block'.$model->id), array('id'=>'addmore'.$model->id))
		?>
</div>