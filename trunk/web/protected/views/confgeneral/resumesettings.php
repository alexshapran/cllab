<div>
<h4>Resume</h4>
<div id='resumeSettings'>
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'conf-resume-settings-form',
		'enableAjaxValidation'=>true,
	)); ?>

		<?php
		if($aResumes){ 
		foreach($aResumes as $oResume) {
		$this->renderPartial('/confresumesettings/_form', array('model'=>$oResume));
		}} ?>


<div class='clear' id='addBefore'></div>

<div style='width:94px; margin: 20px auto;'>
	<?php 
		echo CHtml::ajaxLink(	'Add More',
								CController::createUrl('confresumesettings/create'),
								array(	'success'=>'function(transport){ addElement(transport); }',
										'dataType'=>'json'),
								array(	'id'=>'addMore',
										'onclick'=>'busy()')) ?>
</div>


<div class="row buttons" style='margin: 0 auto; width:20%;'>
	<?php echo CHtml::ajaxSubmitButton(
				'Save', 
				Yii::app()->controller->createUrl('/confresumesettings/update'),
				array('success'=>'saveComplete()'),
				array('onclick'=>'busy()')); ?>
</div>

<?php $this->endWidget(); ?>

</div>
</div>
<script type='text/javascript'>
function addElement(transport)
{
	if(transport.form)
		$("#addBefore").before(transport.form);
	
	unbusy();
}
function removeElement(transport)
{
	if(transport.complete)
		$("#resume" + transport.id).remove();

	unbusy();
}
function saveComplete()
{
	unbusy();
}
</script>