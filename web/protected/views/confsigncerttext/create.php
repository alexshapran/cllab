<?php echo $oSect->name ?>

<?php 
foreach ($oSect->confSignCertTexts as $oText)
	$this->renderPartial('/confsigncerttext/_value', array('model'=>$oText));
?>

<div id='divaddlink<?php echo $oSect->id ?>' style='margin: 0 auto; width:52px;'>
<?php echo CHtml::ajaxLink('Add More', 
							Yii::app()->controller->createUrl(	'/confsigncerttext/createajax', 
																array('settingId'=>$oSect->id)),
							array(
									'dataType'=> 'json',
									'success'=>'function(transport){ displayElement(transport) }'),
							
							array(	'id'=>'addLink'.$oSect->id,
									'onclick'=>'busy()',
									'name'=>"$oSect->id")); 
?>
</div>