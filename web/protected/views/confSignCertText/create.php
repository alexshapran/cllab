<?php echo $oSect->name ?>
<?php foreach ($oSect->confSignCertTexts as $oText) { ?>
<div style='border: 1px dashed grey; min-width: 100%; padding: 10px;'>
<?php echo MCHtml::activeTextArea($oText, 'value', array('cols'=>70, 'preName'=>$oText->id)); ?>
<?php echo MCHTML::activeHiddenField($oText, 'id', array('preName'=>$oText->id)) ?>

<?php echo CHtml::button('Delete', 
		array(	'onclick' => "jQuery.ajax({
								'url':'".Yii::app()->controller->createUrl('confsigncerttext/deleteajax', array('textId'=>$oText->id))."',
								'cache':false,
								'success':function(html){jQuery(\"#section".$oSect->id."\").html(html)}});return false;",
				'style'=>'margin: 16px 0 0 5px; position: absolute')) ?>
</div>
<?php }; ?>
<div style='margin: 0 auto; width:52px;'>
<?php echo CHtml::ajaxLink('Add More', 
								Yii::app()->controller->createUrl('/confsigncerttext/createajax', 
								array('settingId'=>$oSect->id)), 
								array('update'=>'#section'.$oSect->id), 
								array(	'id'=>'addLink'.$oSect->id)); ?>
</div>