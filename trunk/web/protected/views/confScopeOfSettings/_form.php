<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'conf-scope-of-settings-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'allow_add_more'); ?>
		<?php echo $form->textField($model,'allow_add_more'); ?>
		<?php echo $form->error($model,'allow_add_more'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'add_has_name'); ?>
		<?php echo $form->textField($model,'add_has_name'); ?>
		<?php echo $form->error($model,'add_has_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'conf_gen_id'); ?>
		<?php echo $form->textField($model,'conf_gen_id'); ?>
		<?php echo $form->error($model,'conf_gen_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->