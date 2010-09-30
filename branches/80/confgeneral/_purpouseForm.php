<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'account-form',
	'enableAjaxValidation'=>false,
//	'action' => 'account/create',
	'method' => 'post'
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div style='float:left;'>
		<?php // echo $form->labelEx($model,'value'); ?>
		<?php echo $form->textField($model,'value',array('size'=>30,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'value'); ?>
	</div>

		<?php echo $form->hiddenField($model, 'conf_gen_id', array('value'=>Yii::app()->user->getConfigId())) ?>

	<div style='float:left; margin-left:20px;'>
		<?php echo CHtml::ajaxSubmitButton("Add new",
                              CController::createUrl('purpose/createAjax'), 
                              array( //'update'=>'#allpurposes',
                              		'success'=>'function(transport) { addPurpose(transport) }'),
                              array('onclick'=>'busy()'));
		 ?>
	</div>
<?php $this->endWidget(); ?>

</div><!-- form -->
<div class='clear'></div>