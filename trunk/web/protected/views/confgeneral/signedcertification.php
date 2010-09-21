<?php
echo CHtml::beginForm(Yii::app()->controller->createUrl('/confsigncerttext/submit'));

if($aSignCertSetts)
foreach($aSignCertSetts as $oSect)
{ ?>
<div id='section<?php echo $oSect->id ?>' style='border: 1px dotted grey; min-width: 100%; padding: 10px;'>
<?php $this->renderPartial('/confsigncerttext/create', array('oSect'=>$oSect)); ?>
</div>
<?php } ?>

<div style='width:38px; margin: 20px auto;'>
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