<?php 
echo CHtml::beginForm('confglossarysettings/update', 'POST', array('id'=>'settingsform'));
if($aGlos)
{
	foreach($aGlos as $oItem)
		$this->renderPartial('/confglossarysettings/_form', array('model'=>$oItem));
} ?>
<div id='addnewbefore' class='clear'></div>
<?php 
echo CHtml::ajaxLink(
			'Add More',
			Yii::app()->controller->createUrl('/confglossarysettings/create'),
			array(
				'dataType'=> 'json',
				'success'=>'function(transport){ displayElement(transport) }'),
			array(	'id'=>'addMore',
					'onclick'=>'busy()')) ?><br /><br />
<?php
echo CHtml::ajaxSubmitButton(
			'Save', 
			Yii::app()->controller->createUrl('/confglossarysettings/update'), 
			array('success'=>'function(){ unbusy() }'), 
			array(	'id'=>'saveButton',
					'onclick'=>'busy()')); ?>
<?php echo CHtml::endForm(); ?>

<script type='text/javascript'>
function displayElement(transport)
{
	$('#addnewbefore').before(transport.form);
	unbusy();
}

function removeMe(transport)
{
	if(transport.result == 'done')
		$('#glossaryform' + transport.id).remove();
	unbusy();
}
</script>