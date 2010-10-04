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
		
		<?php $iNewTinyId = 2; // user in add another?>
		<?php if($aResumes):?>
			<?php foreach($aResumes as $i => $oResume) { ?>
				<?php $iNewTinyId = $iNewTinyId+($i+1)?>
				<div class="tinymce" id="<?php echo $oResume->id ?>">
					Resume #<?php echo $i+1 ?>
					<?php $this->widget('application.extensions.tinymce.ETinyMce', 
					array(
						'name'=>"Resume[$oResume->id]",
						'value'=>$oResume->text,
						'htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'tinymce'))); ?>
				
					<?php 
						echo CHtml::ajaxButton('Delete',
											Yii::app()->controller->createUrl('appraisalreport/resumedelete', array('resume_id'=>$oResume->id)),
											array('success'=>'removeEl('.$oResume->id.')'),
											array( 'onClick' => "if(!confirm('Are you sure you want to delete this item?')) return false; ")
											);
					?>
					<br />
				</div>
				
			<?php } ?>
		<?php else:?>
		
		<?php endif;?>
		<?php echo  CHtml::link('Add another resume...', 'javascript:', array('onClick'=>'addAnother(); return false;', 'id'=>'add-another'))?>
		
		<input type="hidden" id="newTinyId" value="<?php echo $iNewTinyId?>" />
		
		<div class="row buttons">
			<?php echo CHtml::submitButton('Save'); ?>
		</div>
	
	<?php $this->endWidget(); ?>

</div>

<script type='text/javascript'>
	//<![CDATA[
	function addAnother(){
		var newId = getNewId();
		
		var htmlDiv = "<div class='tinymce'><textarea class='tinymce' id='new_"+newId+"' name='New_resume[]'></textarea><div><span><a href='javascript:$(\"#new_"+newId+"\").toggleModeTinyMCE([\"Text mode\", \"HTML mode\"])' style='color: navy; font-family: sans-serif; font-size: 8pt; background-color: rgb(240, 240, 238); border-style: solid; border-width: 0px 1px 1px; border-color: rgb(204, 204, 204); text-decoration: none; padding: 1px 3px 3px; margin: 2px 0pt 0pt;' id='Resume_2_switch'>Text mode</a></span></div></div>";

		$("#add-another").before(htmlDiv);
		jQuery("#new_"+newId).tinyMCE({'mode':'exact','elements':'new_','language':'en','readonly':false,'relative_urls':false,'remove_script_host':false,'convert_fonts_to_spans':true,'fullscreen_new_window':true,'media_use_script':true,'theme':'simple'}, 'html', true);
		
		return false;	
	}

	function getNewId() {
		var val = $('#newTinyId').val();
		var newVal = parseInt($('#newTinyId').val())+1;
		$('#newTinyId').val(newVal); 
		return val;
	}

	function removeEl(id) {
		$("#"+id).remove();
	}	
	//]]>
</script>

