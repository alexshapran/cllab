<div class="client_popup_form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'client_popup_form',
//	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name_on_report'); ?>
		<?php echo $form->textField($model,'name_on_report',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name_on_report'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'company'); ?>
		<?php echo $form->textField($model,'company',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'company'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'website'); ?>
		<?php echo $form->textField($model,'website',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'website'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address2'); ?>
		<?php echo $form->textField($model,'address2',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'address2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'city'); ?>
		<?php echo $form->textField($model,'city',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'city'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'zip'); ?>
		<?php echo $form->textField($model,'zip'); ?>
		<?php echo $form->error($model,'zip'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fax'); ?>
		<?php echo $form->textField($model,'fax',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'fax'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cell'); ?>
		<?php echo $form->textField($model,'cell',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'cell'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'note'); ?>
		<?php echo $form->textArea($model,'note',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'note'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::ajaxSubmitButton(
			'Save', 
			Yii::app()->controller->createUrl('client/AjaxAdd'),
			array(
				'dataType'=> 'json',
				'success'=> 'function (transport) { setClientSuccess(transport) }', 
				'error'=>'function (transport) {if (transport.status != 200) alert(\'Sorry, but some error occured. Try again please\');}',
			),
			array('id'=>'client_button_id')
		); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
<script type="text/javascript">
	function setClientSuccess(transport) {
		if(transport.form) {
			$(".client_popup_form").html(" ");
			$(".client_popup_form").html(transport.form);
		} 
		if(transport.result) {
			$("#Appraisal_client_id").append( $('<option value="'+transport.result.success.id+'">'+transport.result.success.name+'</option>') );
			$("#add-client-dialog").dialog("close");
			$("#Appraisal_client_id").val(transport.result.success.id); $("#Appraisal_client_id").change(); 
			alert("Client was succesfully added");
		}
	}
</script>