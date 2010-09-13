<div class='backlink'>
<?php echo CHtml::link('<< back', Yii::app()->controller->createUrl('/user/users')) ?>
</div>

<?php echo $this->renderPartial('_editform', array('model'=>$model, 'aAccounts'=>$aAcc, 'aPrivileges'=>$aPriv)); ?>