<div class='append'>
<?php
	if($oAppend)
	{
		echo CHtml::beginForm( Yii::app()->controller->createUrl('/documents/appendicies').'/'.$oAppraisal->alias,'POST'); ?>
		<?php echo CHtml::activeCheckBox($oAppend, 'is_active'); ?>&nbsp;&nbsp;&nbsp;Active<br /><br />
		Section Title:&nbsp;&nbsp;<?php echo CHtml::activeTextField($oAppend, 'text', array('size'=>'60')) ?>
		<div>
		<br />
		List Addendums:<br />
		<ol class='addendums'>
			<?php
			if($oAppend->sdAppendicesLists) 
				foreach($oAppend->sdAppendicesLists as $oApp) { ?>
					<?php $this->renderPartial('_appsimple', array('model'=>$oApp)); ?>
				<?php } ?>
		</ol>
		</div>
		<div>
		<?php echo CHtml::ajaxLink(
							'Add more...', 
							Yii::app()->controller->createUrl(	'documents/createappend', 
																array('add_id'=>$oAppend->id)),
							array(
								'dataType'=>'json',
								'success'=>'function(transport){addli(transport); }'),
							array(	'id'=>'addMore',
									'onclick'=>'busy()')) ?>
		</div>
		<div>
		<?php echo CHtml::submitButton('Save'); ?>
		</div>
	<?php echo CHtml::endForm(); ?>
<?php } ?>
</div>

<script type='text/javascript'>
function addli(transport)
{
	if(transport.form)
		$(".addendums").append(transport.form);
	unbusy();
}
</script>