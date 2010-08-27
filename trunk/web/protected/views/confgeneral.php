<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'conf-general-confgeneral-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'company_name'); ?>
		<?php echo $form->textField($model,'company_name'); ?>
		<?php echo $form->error($model,'company_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model,'phone'); ?>
		<?php echo $form->error($model,'phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'website'); ?>
		<?php echo $form->textField($model,'website'); ?>
		<?php echo $form->error($model,'website'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textField($model,'address'); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'city'); ?>
		<?php echo $form->textField($model,'city'); ?>
		<?php echo $form->error($model,'city'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'state'); ?>
		<?php echo $form->textField($model,'state'); ?>
		<?php echo $form->error($model,'state'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'zip'); ?>
		<?php echo $form->textField($model,'zip'); ?>
		<?php echo $form->error($model,'zip'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'default_currency'); ?>
		<?php echo $form->textField($model,'default_currency'); ?>
		<?php echo $form->error($model,'default_currency'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'header'); ?>
		<?php echo $form->textField($model,'header'); ?>
		<?php echo $form->error($model,'header'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'footer'); ?>
		<?php echo $form->textField($model,'footer'); ?>
		<?php echo $form->error($model,'footer'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'privacy_policy'); ?>
		<?php echo $form->textField($model,'privacy_policy'); ?>
		<?php echo $form->error($model,'privacy_policy'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->