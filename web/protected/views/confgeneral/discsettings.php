<script type='text/javascript'>
function toggle(a)
{
	if(a)
	{
		$("#settLine"+a).toggleClass("hidden"); 
		$("#settText"+a).toggleClass("hidden");
	}
}
</script>
<?php echo CHtml::beginForm('/confscopeofsettings/submit','POST') ?>
<?php
if($aDiscSettings)
	foreach($aDiscSettings as $oSet)
	{ ?>
		<div id='block<?php echo $oSet->id ?>'>
		<?php $this->renderPartial('/confdisclaimersettings/_simpleset', array('model' => $oSet)); ?>
		</div>
<?php } ?>
<div style='width:30%; margin: 30px auto;'>
<?php echo CHtml::ajaxSubmitButton('Save', 
						Yii::app()->controller->createUrl('/confdisclaimersettings/submit')); ?>
</div>
<?php echo CHtml::endForm(); ?>