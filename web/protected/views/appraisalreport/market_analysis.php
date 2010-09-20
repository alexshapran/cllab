<?php echo Appraisal::createNewLink()?>

<h2><?php echo $oAppraisal->name ?></h2>

<div class="appraisal-report">

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'appraisal-report-form',
		'enableAjaxValidation'=>false,
	)); ?>
	
		<div class="row">
			<?php $labels = $model->attributeLabels(); echo $labels['is_active']?>
			<?php echo $form->checkBox($model, 'is_active'); ?>
			<?php echo $form->error($model,'is_active'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($model,'title'); ?>
			<?php echo $form->textField($model, 'title'); ?>
			<?php echo $form->error($model,'title'); ?>
		</div>
	
		<div class="tinymce">
			<?php // echo $form->labelEx($model,'text'); ?><br />
			<?php $this->widget('application.extensions.tinymce.ETinyMce', 
				array(
					'model'=>$model, 
					'attribute'=>'text',
					/*'editorTemplate'=>'full',**/
					'htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'tinymce'))); ?>
			<?php echo $form->error($model,'text'); ?>
		</div>
		
		<div class="row buttons">
			<?php echo CHtml::submitButton('Save'); ?>
		</div>
	
	<?php $this->endWidget(); ?>

</div>