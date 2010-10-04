<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'conf-general-form',
	'enableAjaxValidation'=>true,
)); ?>

<script type='text/javascript'>
function displayEdit(id)
{
	$('#purpForm'+id).toggleClass('hidden');
	$('#span'+id).toggleClass('hidden');  
	$('#edit'+id).toggleClass('hidden');
}
</script>

	<div id="confgen_form_left">
			<div class="confgen_row">
				<?php echo $form->labelEx($model,'company_name'); ?>
				<?php echo $form->textField($model,'company_name',array('size'=>30,'maxlength'=>255)); ?>
			</div>
			<div class="confgen_row">
				<?php echo $form->labelEx($model,'phone'); ?>
				<?php echo $form->textField($model,'phone',array('size'=>30,'maxlength'=>255)); ?>
			</div>
			<div class="confgen_row">			
				<?php echo $form->labelEx($model,'email'); ?>
				<?php echo $form->textField($model,'email',array('size'=>30,'maxlength'=>255)); ?>
			</div>
			<div class="confgen_row">			
				<?php echo $form->labelEx($model,'website'); ?>
				<?php echo $form->textField($model,'website',array('size'=>30,'maxlength'=>255)); ?>
			</div>
			<div class="confgen_row">	
				<?php echo $form->labelEx($model,'address'); ?>
				<?php echo $form->textField($model,'address',array('size'=>30,'maxlength'=>255)); ?>
			</div>
			<div class="confgen_row">			
				<?php echo $form->labelEx($model,'city'); ?>
				<?php echo $form->textField($model,'city',array('size'=>30,'maxlength'=>255)); ?>
			</div>
			<div class="confgen_row">							
				<?php echo $form->labelEx($model,'state'); ?>
				<?php echo $form->textField($model,'state',array('size'=>30,'maxlength'=>255)); ?>
			</div>
			<div class="confgen_row">	
				<?php echo $form->labelEx($model,'zip'); ?>
				<?php echo $form->textField($model,'zip',array('size'=>30,'maxlength'=>45)); ?>
			</div>		
			<div class="confgen_row">	
				<?php echo $form->labelEx($model,'default_currency'); ?>
				<?php echo $form->textField($model,'default_currency',array('size'=>10,'maxlength'=>45)); ?>
			</div>
	</div>	
	
	
	<div id="confgen_form_right">
			<?php echo $form->labelEx($model,'header'); ?>
			<div class="confgen_row">
				<?php echo $form->textArea($model,'header',array('rows'=>6, 'cols'=>65)); ?>
			</div>
			<?php echo $form->labelEx($model,'footer'); ?>		
			<div class="confgen_row">
				<?php echo $form->textArea($model,'footer',array('rows'=>6, 'cols'=>65)); ?>
			</div>
	</div>
	
	
	<div class="clear"></div>
	
	<!-- Begin PP -->
		<div id="privacy_policy">
		<div class="row">
			<?php echo $form->labelEx($model,'privacy_policy'); ?>
			<?php echo $form->textArea($model,'privacy_policy',array('rows'=>10, 'cols'=>101)); ?>
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
			<div class='confgeneralsect'>
			Type of Value - Configure Options
			</div>
	<?php
			echo CHtml::Button('Add new', array('onClick'=>"location.replace('".Yii::app()->controller->createUrl("conftypeofvalue/update")."')"));
			 
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
			<div class='confgeneralsect'>
			Purpose of Appraisal - Configure Options
			</div>
			<?php echo $this->renderPartial('_purpouseForm', 
											array('model'=>new ConfPurpose)); ?>
				<div id="allpurposes">
				<?php $this->renderPartial('/purpose/create', 
									array('aConfPurposeDataProvider'=>$aConfPurposeDataProvider)); ?>
				</div>
			</div>
		</div>
	<div class="clear" ></div>
</div><!-- form -->