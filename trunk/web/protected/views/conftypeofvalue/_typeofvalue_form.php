<div class="appraisal_info_form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'purporse_form',
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
		<?php echo $form->labelEx($model,'definition'); ?>
		<?php echo $form->textArea($model,'definition',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'definition'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'source'); ?>
		<?php echo $form->textArea($model,'source',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'source'); ?>
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::ajaxSubmitButton(
			'Save', 
			Yii::app()->controller->createUrl('conftypeofvalue/createajax'),
			array(
				'dataType'=> 'json',
				'success'=> 'function (transport) { setOnsuccess(transport) }', 
				'error'=>'function (transport) {if (transport.status != 200) alert(\'Sorry, but some error occured. Try again please\');}',
			),
			array('id'=>'popup_button_id')
		); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
<script type="text/javascript">
	function setOnsuccess(transport) {
		if(transport.form) {
			$(".purporse_form").html(" ");
			$(".purporse_form").html(transport.form);
		} 
		if(transport.result) {
			$("#BasicReportParameters_types_of_value_id").append( $('<option value="'+transport.result.success.id+'">'+transport.result.success.name+'</option>') );
			$("#add-typeOfValue").dialog("close");
			$("#BasicReportParameters_types_of_value_id").val(transport.result.success.id); $("#BasicReportParameters_types_of_value_id").change(); 
			alert("Type Of Value was succesfully added");
		}
	}
</script>