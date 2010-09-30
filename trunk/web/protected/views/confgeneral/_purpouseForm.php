<!-- Simple form to add Purposes  -->
<div class="form">

<?php $form = $this->beginWidget('CActiveForm', array(
	'id'=>'account-form',
	'enableAjaxValidation'=>false,
	'method' => 'post'
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div style='float:left;'>
		<?php // echo $form->labelEx($model,'value'); ?>
		<?php echo $form->textField($model,'value',array('size'=>30,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'value'); ?>
	</div>

	<div style='float:left; margin-left:20px;'>
		<?php echo CHtml::ajaxSubmitButton("Add new",
                              CController::createUrl('purpose/createajax'),
                              array( //'update'=>'#allpurposes',
                              		'dataType'=>'json',
                              		'success'=>'function(transport) { addPurpose(transport); } '),
                              array('onclick'=>'busy()'));
		 ?>
	</div>
<?php $this->endWidget(); ?>

<script type='text/javascript'>
function addPurpose(transport)
{
	if(transport.gridView)
		$('#allpurposes').html(transport.gridView);
	else
	{
		displayAjaxError(transport.error);
	}

	unbusy();
}
</script>

</div><!-- form -->
<div class='clear'></div>