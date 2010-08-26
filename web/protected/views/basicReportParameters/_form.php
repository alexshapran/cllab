<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'basic-report-parameters-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'appraisal_id'); ?>
		<?php echo $form->textField($model,'appraisal_id'); ?>
		<?php echo $form->error($model,'appraisal_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_created'); ?>
		<?php echo $form->textField($model,'date_created'); ?>
		<?php echo $form->error($model,'date_created'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'client_name'); ?>
		<?php echo $form->textField($model,'client_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'client_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'city'); ?>
		<?php echo $form->textField($model,'city',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'city'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'year'); ?>
		<?php echo $form->textField($model,'year',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'year'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'purposes_id'); ?>
		<?php echo $form->textField($model,'purposes_id'); ?>
		<?php echo $form->error($model,'purposes_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'types_of_value_id'); ?>
		<?php echo $form->textField($model,'types_of_value_id'); ?>
		<?php echo $form->error($model,'types_of_value_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'types_of_report_id'); ?>
		<?php echo $form->textField($model,'types_of_report_id'); ?>
		<?php echo $form->error($model,'types_of_report_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'primary_img_size_id'); ?>
		<?php echo $form->textField($model,'primary_img_size_id',array('size'=>6,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'primary_img_size_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sec_img_size_id'); ?>
		<?php echo $form->textField($model,'sec_img_size_id',array('size'=>6,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'sec_img_size_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'currency_symbol'); ?>
		<?php echo $form->textField($model,'currency_symbol',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'currency_symbol'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'eximmination_dates'); ?>
		<?php echo $form->textArea($model,'eximmination_dates',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'eximmination_dates'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'research_dates_from'); ?>
		<?php echo $form->textField($model,'research_dates_from'); ?>
		<?php echo $form->error($model,'research_dates_from'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'reseach_dates_to'); ?>
		<?php echo $form->textField($model,'reseach_dates_to'); ?>
		<?php echo $form->error($model,'reseach_dates_to'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'effective_valuation_date'); ?>
		<?php echo $form->textField($model,'effective_valuation_date'); ?>
		<?php echo $form->error($model,'effective_valuation_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'issue_date_report'); ?>
		<?php echo $form->textField($model,'issue_date_report'); ?>
		<?php echo $form->error($model,'issue_date_report'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'order_report_section'); ?>
		<?php echo $form->textField($model,'order_report_section',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'order_report_section'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->