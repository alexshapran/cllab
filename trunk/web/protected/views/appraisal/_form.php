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
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
				'model'=>$oBasicParams,
			    'attribute'=>'date_created',
			    'options'=>array(
					'showAnim'=>'fold',
				),
			    'htmlOptions'=>array(
			    	'style'=>'width:100px',
				),
			 ));
		?>
		<?php echo $form->error($model,'date_created'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'client_id', array('style'=>'width:50px;')); ?>
		<?php  
			echo CHtml::button('Add New', array(
		    	'onclick'=>'$("#add-client-dialog").dialog("open"); return false;',
				'style'=>'width:85px;'
		    ));
	 	?>
		<?php echo $form->dropDownList($model,'client_id', CHtml::listData($aClient, 'id','name')); ?>
		<?php echo $form->error($model,'client_id'); ?>
	</div>
	
	<br />
	<h3>Basic Report Parameters</h3>
	
	<?php echo $form->hiddenField($oBasicParams,'order_report_section')?>
	<div class="row">
		<?php echo $form->labelEx($oBasicParams,'client_name'); ?>
		<?php echo $form->textField($oBasicParams,'client_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($oBasicParams,'client_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($oBasicParams,'city'); ?>
		<?php echo $form->textField($oBasicParams,'city',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($oBasicParams,'city'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($oBasicParams,'year'); ?>
		<?php echo $form->textField($oBasicParams,'year',array('size'=>60,'maxlength'=>255, 'style'=>'width:50px')); ?>
		<?php echo $form->error($oBasicParams,'year'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($oBasicParams,'purposes_id'); ?>
		<?php echo $form->dropDownList( $oBasicParams,
										'purposes_id', 
										CHtml::listData($aPurpose, 'id','value'),
										array('prompt'=>'-Select-')); ?>
		<?php echo $form->error($oBasicParams,'purposes_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($oBasicParams,'types_of_value_id'); ?>
		<?php echo $form->dropDownList( $oBasicParams,
										'types_of_value_id', 
										CHtml::listData($aValueTypes, 'id','name'),
										array('prompt'=>'-Select-')); ?>
		<?php echo $form->error($oBasicParams,'types_of_value_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($oBasicParams,'types_of_report_id'); ?>
		<?php echo $form->dropDownList( $oBasicParams,
										'types_of_report_id', 
										CHtml::listData($aReportTypes, 'id','value'),
										array('prompt'=>'-Select-')); ?>
		<?php echo $form->error($oBasicParams,'types_of_report_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($oBasicParams,'primary_img_size_id'); ?>
		<?php echo $form->dropDownList($oBasicParams,'primary_img_size_id', $aImagesSize); ?>
		<?php echo $form->error($oBasicParams,'primary_img_size_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($oBasicParams,'sec_img_size_id'); ?>
		<?php echo $form->dropDownList($oBasicParams,'sec_img_size_id', $aImagesSize); ?>
		<?php echo $form->error($oBasicParams,'sec_img_size_id'); ?>
	</div>
User value???
	<div class="row">
		<?php echo $form->labelEx($oBasicParams,'currency_symbol'); ?>
		<?php echo $form->textField($oBasicParams,'currency_symbol',array('size'=>45,'maxlength'=>45, 'style'=>'width:50px')); ?>
		<?php echo $form->error($oBasicParams,'currency_symbol'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($oBasicParams,'eximmination_dates'); ?>
		<?php echo $form->textField($oBasicParams,'eximmination_dates',array('size'=>45,'maxlength'=>45, 'style'=>'width:400px')); ?>
		<?php echo $form->error($oBasicParams,'eximmination_dates'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($oBasicParams,'research_dates_from'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
				'model'=>$oBasicParams,
			    'attribute'=>'research_dates_from',
			    'options'=>array(
					'showAnim'=>'fold',
				),
			    'htmlOptions'=>array(
			    	'style'=>'width:100px',
				),
			 ));
		?>
		&nbsp;-&nbsp;
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
				'model'=>$oBasicParams,
			    'attribute'=>'reseach_dates_to',
			    'options'=>array(
					'showAnim'=>'fold',
				),
			    'htmlOptions'=>array(
			    	'style'=>'width:100px',
				),
			 ));
		?>
		<?php //echo $form->textField($oBasicParams,'research_dates_from', array('style'=>'width:100px')); ?> 
		<?php //echo $form->textField($oBasicParams,'reseach_dates_to', array('style'=>'width:100px')); ?>
		<?php echo $form->error($oBasicParams,'research_dates_from'); ?>
	</div>

<?php /*
	<div class="row">
		<?php echo $form->labelEx($oBasicParams,'reseach_dates_to'); ?>
		<?php echo $form->textField($oBasicParams,'reseach_dates_to'); ?>
		<?php echo $form->error($oBasicParams,'reseach_dates_to'); ?>
	</div>
*/?>
	
	<div class="row">
		<?php echo $form->dropDownList( $oBasicParams,
										'date_type', 
										$aDateTypes, 
										array('style'=>'width:170px', 'prompt'=>'-Select Date Type-')); ?>
		&nbsp;&nbsp;
		<?php //echo $form->textField($oBasicParams,'date_type',array('style'=>'width:100px')); ?>
		<?php echo $form->error($oBasicParams,'date_type'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($oBasicParams,'effective_valuation_date'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
				'model'=>$oBasicParams,
			    'attribute'=>'effective_valuation_date',
			    'options'=>array(
					'showAnim'=>'fold',
				),
			    'htmlOptions'=>array(
			    	'style'=>'width:100px',
				),
			 ));
		?>
		<?php echo $form->error($oBasicParams,'effective_valuation_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($oBasicParams,'issue_date_report'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
				'model'=>$oBasicParams,
			    'attribute'=>'issue_date_report',
			    'options'=>array(
					'showAnim'=>'fold',
				),
			    'htmlOptions'=>array(
			    	'style'=>'width:100px',
				),
			 ));
		?>
		<?php echo $form->error($oBasicParams,'issue_date_report'); ?>
	</div>

	<div class="clear"></div>
	
	<br />
	<br />
	<br />
	<div class="order_report_sections">
		<?php 
			$this->widget('zii.widgets.jui.CJuiSortable', array(
				
				'items'=>$aReportSections,
				
//				'name'=>'order_report_sections',
			     // additional javascript options for the accordion plugin
			     'options'=>array(
			        'delay'=>'300',
					'name'=>'order_report_sections',
					'id'=>'order_report_sections'
			     ),
			));
		?>
	</div>
<br /><br />
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('onclick'=>'$("#BasicReportParameters_order_report_section").val($(".ui-sortable").sortable("toArray").toString());')); ?>
	</div>

<?php $this->endWidget(); ?>

<?php 
		$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
			'id'=>'add-client-dialog',
			'options'=>array(
				'title'=>'Add cLient form',
				'autoOpen'=>false,
				'width'=>'500px',
			),
		));
	?>
		
		<?php echo $this->renderPartial('_client_form', array('model' => $oClient )); ?>
 
	<?php $this->endWidget('zii.widgets.jui.CJuiDialog');?>

</div><!-- form -->


