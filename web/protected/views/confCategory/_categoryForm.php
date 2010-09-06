<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'conf-category-_categoryForm-form',
	'enableAjaxValidation'=>false,
)); ?>
<!-- 	<p class="note">Fields with <span class="required">*</span> are required.</p>  -->
	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name'); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

		<?php echo $form->hiddenField($model, 'conf_gen_id', array('value'=>yii::app()->user->getConfigId())); ?>

	<div class="row" style='margin-left:30px;'>
		<label>Parent Category</label>
		<?php echo $form->dropDownList($model,'parent_id', CHtml::listData($aParCats,'id','name'), array('style'=>'height:22px; min-width:89px;', 'prompt'=>'(NULL)')); ?>
		<?php echo $form->error($model,'parent_id'); ?>
	</div>

	<div class="row buttons" style='margin:18px 0 0 30px;'>
		<?php echo CHtml::ajaxSubmitButton('Add new', yii::app()->controller->createUrl("confcategory/ajaxcreate"), array('update'=>'#allcategories')); ?>
	</div>
<?php $this->endWidget(); ?>
</div><!-- form -->