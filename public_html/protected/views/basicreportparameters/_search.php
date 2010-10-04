<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'appraisal_id'); ?>
		<?php echo $form->textField($model,'appraisal_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_created'); ?>
		<?php echo $form->textField($model,'date_created'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'client_name'); ?>
		<?php echo $form->textField($model,'client_name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'city'); ?>
		<?php echo $form->textField($model,'city',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'year'); ?>
		<?php echo $form->textField($model,'year',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'purposes_id'); ?>
		<?php echo $form->textField($model,'purposes_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'types_of_value_id'); ?>
		<?php echo $form->textField($model,'types_of_value_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'types_of_report_id'); ?>
		<?php echo $form->textField($model,'types_of_report_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'primary_img_size_id'); ?>
		<?php echo $form->textField($model,'primary_img_size_id',array('size'=>6,'maxlength'=>6)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sec_img_size_id'); ?>
		<?php echo $form->textField($model,'sec_img_size_id',array('size'=>6,'maxlength'=>6)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'currency_symbol'); ?>
		<?php echo $form->textField($model,'currency_symbol',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'eximmination_dates'); ?>
		<?php echo $form->textArea($model,'eximmination_dates',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'research_dates_from'); ?>
		<?php echo $form->textField($model,'research_dates_from'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'reseach_dates_to'); ?>
		<?php echo $form->textField($model,'reseach_dates_to'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'effective_valuation_date'); ?>
		<?php echo $form->textField($model,'effective_valuation_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'issue_date_report'); ?>
		<?php echo $form->textField($model,'issue_date_report'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'order_report_section'); ?>
		<?php echo $form->textField($model,'order_report_section',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->