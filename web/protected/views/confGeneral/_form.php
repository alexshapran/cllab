<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'conf-general-form',
	'enableAjaxValidation'=>false,
)); ?>

<script type='text/javascript'>
function displayEdit(id)
{
	$('#purpForm'+id).toggleClass('hidden');
	$('#span'+id).toggleClass('hidden');  
	$('#edit'+id).toggleClass('hidden');
}
</script>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	<div id="confgen_form_left">

			<div class="confgen_row">
				<?php echo $form->labelEx($model,'company_name'); ?>
				<?php echo $form->textField($model,'company_name',array('size'=>30,'maxlength'=>255)); ?>
				<?php echo $form->error($model,'company_name'); ?>
			</div>
			<div class="confgen_row">
				<?php echo $form->labelEx($model,'phone'); ?>
				<?php echo $form->textField($model,'phone',array('size'=>30,'maxlength'=>255)); ?>
				<?php echo $form->error($model,'phone'); ?>
			</div>
			<div class="confgen_row">		
				<?php echo $form->labelEx($model,'company_name'); ?>
				<?php echo $form->textField($model,'company_name',array('size'=>30,'maxlength'=>255)); ?>
				<?php echo $form->error($model,'company_name'); ?>
			</div>
			<div class="confgen_row">
				<?php echo $form->labelEx($model,'phone'); ?>
				<?php echo $form->textField($model,'phone',array('size'=>30,'maxlength'=>255)); ?>
				<?php echo $form->error($model,'phone'); ?>
			</div>
			<div class="confgen_row">			
				<?php echo $form->labelEx($model,'email'); ?>
				<?php echo $form->textField($model,'email',array('size'=>30,'maxlength'=>255)); ?>
				<?php echo $form->error($model,'email'); ?>
			</div>
			<div class="confgen_row">			
				<?php echo $form->labelEx($model,'website'); ?>
				<?php echo $form->textField($model,'website',array('size'=>30,'maxlength'=>255)); ?>
				<?php echo $form->error($model,'website'); ?>
			</div>		
			<div class="confgen_row">	
				<?php echo $form->labelEx($model,'address'); ?>
				<?php echo $form->textField($model,'address',array('size'=>30,'maxlength'=>255)); ?>
				<?php echo $form->error($model,'address'); ?>
			</div>
			<div class="confgen_row">			
				<?php echo $form->labelEx($model,'city'); ?>
				<?php echo $form->textField($model,'city',array('size'=>30,'maxlength'=>255)); ?>
				<?php echo $form->error($model,'city'); ?>
			</div>
			<div class="confgen_row">							
				<?php echo $form->labelEx($model,'state'); ?>
				<?php echo $form->textField($model,'state',array('size'=>30,'maxlength'=>255)); ?>
				<?php echo $form->error($model,'state'); ?>
			</div>
			<div class="confgen_row">	
				<?php echo $form->labelEx($model,'zip'); ?>
				<?php echo $form->textField($model,'zip',array('size'=>30,'maxlength'=>45)); ?>
				<?php echo $form->error($model,'zip'); ?>
			</div>		
			<div class="confgen_row">	
				<?php echo $form->labelEx($model,'default_currency'); ?>
				<?php echo $form->textField($model,'default_currency',array('size'=>10,'maxlength'=>45)); ?>
				<?php echo $form->error($model,'default_currency'); ?>
			</div>
	</div>	
	
	
	<div id="confgen_form_right">
			<?php echo $form->labelEx($model,'header'); ?>
			<div class="confgen_row">
				<?php echo $form->textArea($model,'header',array('rows'=>6, 'cols'=>65)); ?>
				<?php echo $form->error($model,'header'); ?>
			</div>
			<?php echo $form->labelEx($model,'footer'); ?>		
			<div class="confgen_row">
				<?php echo $form->textArea($model,'footer',array('rows'=>6, 'cols'=>65)); ?>
				<?php echo $form->error($model,'footer'); ?>
			</div>
	
	</div>
	
	
	<div class="clear"> </div>
	
	<!-- Begin PP -->
		<div id="privacy_policy">
		<div class="row">
			<?php echo $form->labelEx($model,'privacy_policy'); ?>
			<?php echo $form->textArea($model,'privacy_policy',array('rows'=>10, 'cols'=>101)); ?>
			<?php echo $form->error($model,'privacy_policy'); ?>
		</div> 
		
		<div id="confgen_button">	
			<div class="row buttons">
				<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Submit'); ?>
			</div>
		</div>
	</div>
	
	<!-- PP END -->
	<?php $this->endWidget(); ?>
	<div class='clear'></div>
	
	
		<div id="confgen_center">		
			<div id="type_of_value">
			
<div class="form">
<?php // $dataProvider = new CActiveDataProvider('ConfTypeOfValue'); ?>
<?php
//$form=$this->beginWidget('CActiveForm', array(
//	'id'=>'ConfTypeOfValue-form',
//	'enableAjaxValidation'=>false,
//	'action' => 'ConfTypeOfValue/create',
//	'method' => 'post'
//)); 
?>

	<?php // echo $form->errorSummary($model); ?>

	<div style='float:left;'>
		<?php // echo $form->labelEx($model,'value'); ?>
		<?php // echo $form->textField($model,'id',array('size'=>30,'maxlength'=>255)); ?>
		<?php // echo $form->error($model,'id'); ?>
	</div>

	<div style='float:left; margin-left:20px;'>
		<?php //echo CHtml::ajaxSubmitButton("Add new",
                //              CController::createUrl('account/createAjax'), 
                  //            array('update'=>'#accountsTable'));
		 ?>
	</div>

<?php // $this->endWidget(); ?>

</div>
			<?php
			echo CHtml::Button('Add new', array('onClick'=>"location.replace('".yii::app()->controller->createUrl("conftypeofvalue/create")."')"));
			 
			$this->widget('zii.widgets.grid.CGridView', array(
				'id'=>'ConfTypeOfValueTable',
				'summaryText'=>false,
				'dataProvider'=>$aConfTypeDataProvider,
				'ajaxUpdate'=>true,
				'columns' => array('name',
									array(	'class'			=>'CButtonColumn',
											'template'		=>'{update} {delete}',
											'updateButtonUrl'	=>'Yii::app()->controller->createUrl("conftypeofvalue/update", array("id"=>$data->id))',
											'deleteButtonUrl'	=>'Yii::app()->controller->createUrl("conftypeofvalue/delete", array("id"=>$data->id))' 
									)),
				'hideHeader' => true
				));
			?>
	
			</div>
			
			
			
			<div id="purpose_of_apparsial">
			<?php echo $this->renderPartial('_purpouseForm', array('model'=>new ConfPurpose)); ?>
				<div id="allpurposes">
				<?php $this->renderPartial('/purpose/create', array('aConfPurposeDataProvider'=>$aConfPurposeDataProvider)); ?>
				</div>
<?php // $this->endWidget(); ?>
			</div>
			
			
		</div>
		
	<div class="clear"></div>
	

	


</div><!-- form -->
