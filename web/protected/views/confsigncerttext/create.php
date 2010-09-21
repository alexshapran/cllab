<?php echo $oSect->name ?>
<?php foreach ($oSect->confSignCertTexts as $oText) { ?>
<?php $this->renderPartial('/confsigncerttext/_value', array('model'=>$oText)); ?>
<?php }; ?>
<div id='divaddlink<?php echo $oSect->id ?>' style='margin: 0 auto; width:52px;'>
<?php echo CHtml::ajaxLink('Add More', 
							Yii::app()->controller->createUrl('/confsigncerttext/createajax', array('settingId'=>$oSect->id)),
							array(	//'update'=>'#section'.$oSect->id,
								'dataType'=> 'json',
								'success'=>'function(transport){ displayElement(transport) }' ),
							array(	'id'=>'addLink'.$oSect->id,
									'onclick'=>'busy()')); ?>
</div>

<script type='text/javascript'>
function displayElement(transport)
{
	$('#divaddlink' + transport.id).before(transport.form);
	unbusy();
}
function hide(id)
{
	$('#valueform'+id).remove();
	unbusy();
}
</script>