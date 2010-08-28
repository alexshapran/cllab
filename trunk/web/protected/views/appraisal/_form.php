<div class="appraisal_info_form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'appraisal-form',
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
		<?php echo $form->labelEx($model,'date_created'); ?>
		<?php echo $form->textField($model,'date_created'); ?>
		<?php echo $form->error($model,'date_created'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'client_id'); ?>
		<?php echo $form->dropDownList($model,'client_id', CHtml::listData($aClient, 'id','name')); ?>
		<?php echo $form->error($model,'client_id'); ?>
	</div>
	
	<?php 
	 $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
      'id'=>'mydialog',
      // additional javascript options for the dialog plugin
      'options'=>array(
          'title'=>'Dialog box 1',
          'autoOpen'=>false,
      ),
  ));
 
      echo 'dialog content here';
 
  $this->endWidget('zii.widgets.jui.CJuiDialog');
 
  // the link that may open the dialog
  echo CHtml::link('open dialog', '#', array(
     'onclick'=>'$("#mydialog").dialog("open"); return false;',
  ));
 ?>
 
	<div class="clear"></div>

	<?php /*
			<script type="text/javascript" src="http://www.google.com/jsapi"></script>
			<script type="text/javascript">
			    google.load("jquery", "1.3.2");
			    google.load("jqueryui", "1.7.0");
			</script>
	
		
				<script type="text/javascript">
				$(function() {
					$("#datepicker").datepicker();
				});

				</script>
				<div class="demao" style="margin: 300px 0 0 0; clear: both; position: relative;">

			<p>Date: <input type="text" id="datepicker"></p>
		
		</div><!-- End demo -->
	*/?>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->


