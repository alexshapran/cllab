<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'conf-category-_categoryForm-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->hiddenField($model,'conf_gen_id'); ?>
	</div>

	<div class="row" style="float:left">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name'); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row" style="float:left">
		<?php echo $form->labelEx($model,'parent_id'); ?>
		<?php echo $form->listBox($model,'parent_id', CHtml::listData($aParCats,'id','name')); ?>
		<?php echo $form->error($model,'parent_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::ajaxSubmitButton('Add new', yii::app()->controller->createUrl("confcategory/ajaxcreate")); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->