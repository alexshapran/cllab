<div id='catForm<?php echo $model->id ?>' class="form hidden">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'conf-categoryForm'.$model->id,
	'enableAjaxValidation'=>true
)); ?>

	<?php echo $form->hiddenField($model, 'conf_gen_id', array('value'=>yii::app()->user->getConfigId())); ?>
	<?php echo $form->hiddenField($model, 'id'); ?>
	<div class="row">
	<?php echo $form->textField($model,'name', array('size'=>'12')); ?>
	</div>

	<?php if($model->parent_id) { ?>
	<div class="row" style='margin-left:10px;'>
	<?php echo $form->dropDownList($model,'parent_id', CHtml::listData($aParCats,'id','name'), array('style'=>'height:22px; min-width:89px;', 'prompt'=>'(NULL)')); ?>
	</div>
	<?php } ?>

	<div class="row" style='margin-left:10px;'>
		<?php // ajaxSubmit renderPartial не перегружает почему-то, поэтому используем обычный jQuery ?>
		<?php // echo CHtml::ajaxSubmitButton('Save', yii::app()->controller->createUrl("/confcategory/ajaxsave"), array('update'=>'#allcategories'), array('id'=>'saveButton'.$model->id, 'name'=>'saveButton'.$model->id)); ?>
		<?php echo CHtml::submitButton('Save', array('onClick' => 'jQuery.ajax({"type":"POST","url":"/index.php?r=confcategory/ajaxsave","cache":false,"data":jQuery(this).parents("form").serialize(), "success":function(html){jQuery("#allcategories").html(html)}}); return false; ')) ?>
		<?php echo CHtml::button('Cancel', array('onClick' => '')); ?>
	</div>
<?php $this->endWidget(); ?>
<div class='clear'></div>
</div><!-- form -->