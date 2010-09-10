<?php 
echo CHtml::beginForm();
if($aGlos)
{
	foreach($aGlos as $oItem)
		$this->renderPartial('/confglossarysettings/_form', array('model'=>$oItem));
} ?>
<div class='clear'></div>
<?php 
echo CHtml::ajaxLink(
			'Add More',
			Yii::app()->controller->createUrl('/confglossarysettings/create'),
			array('update'=>'#glossary_settings'),
			array('id'=>'addMore')) ?><br /><br />
<?php
echo CHtml::ajaxSubmitButton(
			'Save', 
			Yii::app()->controller->createUrl('/confglossarysettings/update'), 
			array(), 
			array('id'=>'saveButton')); ?>

<?php echo CHtml::endForm(); ?>