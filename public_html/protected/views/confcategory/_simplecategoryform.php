<div id='catForm<?php echo $model->id ?>' class="form hidden">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'conf-categoryForm'.$model->id,
		'enableAjaxValidation'=>true
	)); ?>
	
		<?php echo $form->hiddenField($model, 'conf_gen_id', array('value'=>Yii::app()->user->getConfigId())); ?>
		<?php echo $form->hiddenField($model, 'id'); ?>
		<div class="row floatleft">
			<?php echo $form->textField($model,'name', array('size'=>'12')); ?>
		</div>
	
		<?php if($model->parent_id) { ?>
			<div class="row floatleft">
				<?php echo $form->dropDownList(	$model,
												'parent_id', 
												CHtml::listData($aParCats, 'id', 'name'), 
								                array('style'=>'height:22px; min-width:89px; margin: 2px 0 0 10px;', 'prompt'=>'(NULL)')); ?>
			</div>
		<?php } ?>
	
		<div class="row floatleft" style='margin: 2px 0 0 10px;'>
			<?php  echo CHtml::ajaxSubmitButton('Save', 
												Yii::app()->controller->createUrl("/confcategory/ajaxsave"), 
												array(	'dataType'=>'json',
														'success'=>'function(transport){ floodDiv(transport); }'), 
												array(	'id'=>'saveButton'.$model->id, 
														'name'=>'saveButton'.$model->id)); ?>

			<?php echo CHtml::button('Cancel', array('onClick' => '; changeView('.$model->id.')')); ?>
		</div>
	<?php $this->endWidget(); ?>
	<div class='clear'></div>
</div><!-- form -->