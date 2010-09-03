<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'conf-sign-cert-text-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'value'); ?>
		<?php echo $form->textArea($model,'value',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'value'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'conf_general_id'); ?>
		<?php echo $form->textField($model,'conf_general_id'); ?>
		<?php echo $form->error($model,'conf_general_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'conf_sign_cert_settings_id'); ?>
		<?php echo $form->textField($model,'conf_sign_cert_settings_id'); ?>
		<?php echo $form->error($model,'conf_sign_cert_settings_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->