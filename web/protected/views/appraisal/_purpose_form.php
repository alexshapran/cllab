<div class="client_popup_form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'purporse_form',
//	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'value'); ?>
		<?php echo $form->textField($model,'value',array('size'=>60,'maxlength'=>255, 'id'=>'purporse_value')); ?>
		<?php echo $form->error($model,'value'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::ajaxSubmitButton(
			'Save', 
			'/purpose/createajax',
			array(
				'dataType'=> 'json',
				'success'=> 'function (transport) { addPurpose(transport) }', 
				'error'=>'function (transport) {if (transport.status != 200) alert(\'Sorry, but some error occured. Try again please\');}',
			),
			array('id'=>'purporse_button_id', 'onClick'=>'checkValue()')
		); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
<script type="text/javascript">
	function checkValue(){
		var val = $("#purporse_value").val();
		if(val =='') {
			alert('Please entered Value!');
			return false;
		}
	}

	function addPurpose(transport) {
		if(transport.arrIdVal) {
			$("#BasicReportParameters_purposes_id").append( $('<option value="'+transport.arrIdVal.id+'">'+transport.arrIdVal.value+'</option>') );
			$("#BasicReportParameters_purposes_id").val(transport.arrIdVal.id); $("#Appraisal_client_id").change(); 
			alert("Purpose was succesfully added");
		}
		$("#add-purporse").dialog("close");
	}
</script>