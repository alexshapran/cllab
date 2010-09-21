<script type='text/javascript'>
function toggle(a)
{
	if(a)
	{
		$("#settLine"+a).toggleClass("hidden"); 
		$("#settText"+a).toggleClass("hidden");
	}
}
function addField(response)
{
	if(response.form)
	{
		$("#addBefore" + response.id).before(response.form);
	}
	unbusy();
}
</script>
<?php echo CHtml::beginForm('/confscopeofsettings/submit','POST') ?>
<?php
if($aScopeOfSettings)
	foreach($aScopeOfSettings as $oSet)
	{ ?>
		<div id='block<?php echo $oSet->id ?>'>
		<?php $this->renderPartial('/confscopeofsettings/_simpleset', array('model' => $oSet)); ?>
		</div>
<?php } ?>

<div style='width:30%; margin: 30px auto;'>
<?php echo CHtml::ajaxSubmitButton(
				'Save', 
				Yii::app()->controller->createUrl('/confscopeofsettings/submit'),
				array('success'=>'unbusy'),
				array('onclick'=>'busy()')); ?>
</div>
<?php 
echo CHtml::endForm(); ?>