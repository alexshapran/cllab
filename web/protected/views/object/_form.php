<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'object-form',
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
		<?php echo $form->labelEx($model,'category_id'); ?>
		<?php echo $form->textField($model,'category_id'); ?>
		<?php echo $form->error($model,'category_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sub_category_id'); ?>
		<?php echo $form->textField($model,'sub_category_id'); ?>
		<?php echo $form->error($model,'sub_category_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'location'); ?>
		<?php echo $form->textArea($model,'location',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'location'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'location1'); ?>
		<?php echo $form->textArea($model,'location1',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'location1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'location2'); ?>
		<?php echo $form->textArea($model,'location2',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'location2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'client_ret'); ?>
		<?php echo $form->textField($model,'client_ret',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'client_ret'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'value'); ?>
		<?php echo $form->textField($model,'value',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'value'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'value2'); ?>
		<?php echo $form->textField($model,'value2',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'value2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'provenance'); ?>
		<?php echo $form->textArea($model,'provenance',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'provenance'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'exhibited'); ?>
		<?php echo $form->textArea($model,'exhibited',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'exhibited'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'literature'); ?>
		<?php echo $form->textArea($model,'literature',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'literature'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'maker_artist'); ?>
		<?php echo $form->textField($model,'maker_artist',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'maker_artist'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dimensions'); ?>
		<?php echo $form->textField($model,'dimensions',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'dimensions'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'medium'); ?>
		<?php echo $form->textField($model,'medium',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'medium'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_period'); ?>
		<?php echo $form->textField($model,'date_period',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'date_period'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'markings'); ?>
		<?php echo $form->textField($model,'markings',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'markings'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'condition'); ?>
		<?php echo $form->textField($model,'condition',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'condition'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'acquistion_cost'); ?>
		<?php echo $form->textField($model,'acquistion_cost',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'acquistion_cost'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'acqusition_date'); ?>
		<?php echo $form->textField($model,'acqusition_date'); ?>
		<?php echo $form->error($model,'acqusition_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'acqusition_source'); ?>
		<?php echo $form->textField($model,'acqusition_source',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'acqusition_source'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_active'); ?>
		<?php echo $form->textField($model,'is_active'); ?>
		<?php echo $form->error($model,'is_active'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'notes'); ?>
		<?php echo $form->textArea($model,'notes',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'notes'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->