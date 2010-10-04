<div class='backlink'>
<?php echo CHtml::link('<< back', Yii::app()->controller->createUrl('/user/users')) ?>
</div>

<?php echo $this->renderPartial('_editform', array('model'=>$model, 'aAccounts'=>$aAcc, 'aPrivileges'=>$aPriv)); ?>

<?php if(Yii::app()->user->getRole() == 'Account Admin') { 
	$thisUser = Yii::app()->user->getModel();
	?>
<script type='text/javascript'>
$("#User_account_id").attr("disabled","disabled");
$("#User_privilege_id").attr("disabled","disabled");
</script>
<?php } ?>