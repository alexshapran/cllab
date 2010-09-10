<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'conf-resume-settings-form',
	'enableAjaxValidation'=>true,
)); ?>

	<div class="row">
		<?php echo $form->textArea($model, 'value', array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons" style='margin: 0 auto; width:20%;'>
		<?php echo CHtml::ajaxSubmitButton(
					'Save', 
					Yii::app()->controller->createUrl('/confresumesettings/update')); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->