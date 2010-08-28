<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'conf-general-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	<div id="confgen_form_left">
				
			<div class="row">
				<?php echo $form->labelEx($model,'company_name'); ?>
				<?php echo $form->textField($model,'company_name',array('size'=>30,'maxlength'=>255)); ?>
				<?php echo $form->error($model,'company_name'); ?>
			</div>
			<div class="row">
				<?php echo $form->labelEx($model,'phone'); ?>
				<?php echo $form->textField($model,'phone',array('size'=>30,'maxlength'=>255)); ?>
				<?php echo $form->error($model,'phone'); ?>
			</div>
			<div class="row">		
				<?php echo $form->labelEx($model,'company_name'); ?>
				<?php echo $form->textField($model,'company_name',array('size'=>30,'maxlength'=>255)); ?>
				<?php echo $form->error($model,'company_name'); ?>
			</div>
			<div class="row">				
				<?php echo $form->labelEx($model,'phone'); ?>
				<?php echo $form->textField($model,'phone',array('size'=>30,'maxlength'=>255)); ?>
				<?php echo $form->error($model,'phone'); ?>
			</div>
			<div class="row">			
				<?php echo $form->labelEx($model,'email'); ?>
				<?php echo $form->textField($model,'email',array('size'=>30,'maxlength'=>255)); ?>
				<?php echo $form->error($model,'email'); ?>
			</div>
			<div class="row">			
				<?php echo $form->labelEx($model,'website'); ?>
				<?php echo $form->textField($model,'website',array('size'=>30,'maxlength'=>255)); ?>
				<?php echo $form->error($model,'website'); ?>
			</div>		
			<div class="row">	
				<?php echo $form->labelEx($model,'address'); ?>
				<?php echo $form->textField($model,'address',array('size'=>30,'maxlength'=>255)); ?>
				<?php echo $form->error($model,'address'); ?>
			</div>
			<div class="row">			
				<?php echo $form->labelEx($model,'city'); ?>
				<?php echo $form->textField($model,'city',array('size'=>30,'maxlength'=>255)); ?>
				<?php echo $form->error($model,'city'); ?>
			</div>
			<div class="row">							
				<?php echo $form->labelEx($model,'state'); ?>
				<?php echo $form->textField($model,'state',array('size'=>30,'maxlength'=>255)); ?>
				<?php echo $form->error($model,'state'); ?>
			</div>
			<div class="row">	
				<?php echo $form->labelEx($model,'zip'); ?>
				<?php echo $form->textField($model,'zip',array('size'=>30,'maxlength'=>45)); ?>
				<?php echo $form->error($model,'zip'); ?>
			</div>		
			<div class="row">	
				<?php echo $form->labelEx($model,'default_currency'); ?>
				<?php echo $form->textField($model,'default_currency',array('size'=>10,'maxlength'=>45)); ?>
				<?php echo $form->error($model,'default_currency'); ?>
			</div>
	</div>	
	
	
	<div id="confgen_form_right">
			<?php echo $form->labelEx($model,'header'); ?>
			<div class="row">
				<?php echo $form->textArea($model,'header',array('rows'=>6, 'cols'=>65)); ?>
				<?php echo $form->error($model,'header'); ?>
			</div>
			<?php echo $form->labelEx($model,'footer'); ?>		
			<div class="row">
				<?php echo $form->textArea($model,'footer',array('rows'=>6, 'cols'=>65)); ?>
				<?php echo $form->error($model,'footer'); ?>
			</div>
	
	</div>
	
	
	<div id="clearboth"> </div>
		<div id="confgen_center">		
			<div id="type_of_value">
			Value
			</div>
			
			<div id="purpose_of_apparsial">
			Purpose of apparsial
			</div>
		</div>
	<div id="clearboth"> </div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'privacy_policy'); ?>
		<?php echo $form->textArea($model,'privacy_policy',array('rows'=>6, 'cols'=>105)); ?>
		<?php echo $form->error($model,'privacy_policy'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->