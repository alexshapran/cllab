<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'account-form',
	'enableAjaxValidation'=>false,
	'method' => 'post'
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class='floatleft'>
		<?php // echo $form->labelEx($model,'value'); ?>
		<?php echo $form->textField($model,'value',array('size'=>30,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'value'); ?>
	</div>

	<div class='floatleft' style='margin-left:20px;'>
		<?php echo CHtml::ajaxSubmitButton("Add new",
                              CController::createUrl('account/createAjax'), 
                              array('update'=>'#accountsTable'));
		 ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<div class='clear'></div>