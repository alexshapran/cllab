<div class="form"><?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'htmlOptions' => array('autocomplete'=>'off'),
	'enableAjaxValidation'=>false,
)); ?>

<div class='userEdit'>
<?php echo $form->errorSummary($model); ?> <?php echo $form->labelEx($model,'username'); ?>
<?php echo $form->textField($model,'username',array('size'=>30,'maxlength'=>255)); ?>
<?php echo $form->error($model,'username'); ?>


<?php echo $form->labelEx($model,'password'); ?>
<?php echo $form->passwordField($model,'password',array('size'=>30,'maxlength'=>45)); ?>
<?php echo $form->error($model,'password'); ?>

<?php echo $form->labelEx($model,'password_repeat'); ?>
<?php echo $form->passwordField($model,'password_repeat',array('size'=>30,'maxlength'=>45)); ?>
<?php echo $form->error($model,'password_repeat'); ?>

<?php echo $form->labelEx($model,'name'); ?>
<?php echo $form->textField($model,'name',array('size'=>30,'maxlength'=>255)); ?>
<?php echo $form->error($model,'name'); ?>

<?php echo $form->labelEx($model,'account_id'); ?>
<?php echo $form->dropDownList($model, 'account_id', CHtml::listData($aAccounts, 'id','value'), array()) ?>
<?php echo $form->error($model,'account_id'); ?>


<?php echo $form->labelEx($model,'privilege_id'); ?>
<?php echo $form->dropDownList($model, 'privilege_id', CHtml::listData($aPrivileges, 'id','value'), array()) ?>
<?php echo $form->error($model,'privilege_id'); ?>

</div>

<div class="row buttons"><?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
</div>

<?php $this->endWidget(); ?></div>
<!-- form -->
