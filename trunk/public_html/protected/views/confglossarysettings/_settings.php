<?php 
echo CHtml::beginForm('confglossarysettings/update', 'POST', array('id'=>'settingsform'));

if($aGlos)
{
	foreach($aGlos as $oItem)
		$this->renderPartial('/confglossarysettings/_form', array('model'=>$oItem));
} ?>
<div id='addnewbefore' class='clear'></div>
<div style='margin: 0 auto; width:60px; '>
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
				array('success'=>'function(){ unbusy(); displayAjaxMessage("Successfully saved!"); }'), 
				array(	'id'=>'saveButton',
						'onclick'=>'busy()')); ?>
</div>
<?php echo CHtml::endForm(); ?>

<script type='text/javascript'>
function displayElement(transport)
{
	if(transport.form)
		$('#addnewbefore').before(transport.form);
	else
		displayAjaxMessage(transport.error);

	unbusy();
}

function removeMe(transport)
{
	if(transport.result == 'done')
	{
		$('#glossaryform' + transport.id).remove();
		displayAjaxMessage('Successfully removed!');
	}
	else
	{
		displayAjaxError('Cann\'t remove this item!');
	}
	unbusy();
}
</script>