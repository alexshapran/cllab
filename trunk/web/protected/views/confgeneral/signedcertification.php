<?php
echo CHtml::beginForm(Yii::app()->controller->createUrl('/confsigncerttext/submit'));

if($aSignCertSetts)
foreach($aSignCertSetts as $oSect)
{ ?>
<div class='scSection' id='section<?php echo $oSect->id ?>'>
<?php $this->renderPartial('/confsigncerttext/create', array('oSect'=>$oSect)); ?>
</div>
<?php } ?>

<div class='scSaveButton'>
<?php echo CHtml::ajaxSubmitButton(
				'Save', 
				Yii::app()->controller->createUrl('/confsigncerttext/submit'),
				array('success'=>'unbusy'),
				array(	'id' => 'submittext',
						'onclick'=>'busy()')); ?>
</div>
<?php echo CHtml::endForm(); ?>

<script type='text/javascript'>
function displayElement(transport)
{
	$('#divaddlink' + transport.id).before(transport.form);
	unbusy();
}
function hide(id)
{
	alert(id);
	alert($('#valueform'+ id));
	$('#valueform'+ id).remove();
	unbusy();
}
</script>