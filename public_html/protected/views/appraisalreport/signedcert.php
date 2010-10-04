<h2><?php echo $oAppraisal->name ?></h2>

<div class="signed-cert">

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'signed-cert-form',
		'method'=>'POST',
		'action'=>Yii::app()->controller->createUrl('/appraisalreport/signedcert').'/'.$oAppraisal->alias,
		'enableAjaxValidation'=>false,
	)); ?>

		<div class="row">
			<?php echo $form->checkBox($model, 'is_active'); ?>
			<?php echo $form->labelEx($model,'is_active'); ?>
			<?php echo $form->error($model,'is_active'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'sect_title'); ?>:
			<?php echo $form->textField($model, 'sect_title', array('size'=>'80')); ?>
			<?php echo $form->error($model,'sect_title'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'intro_text'); ?>:
			<?php echo $form->textField($model, 'intro_text', array('size'=>'80')); ?>
			<?php echo $form->error($model,'intro_text'); ?>
		</div>

		<?php
			if($aSignedCertText)
			{
				$selected_values = unserialize($model->selected_values);
				
				$last_categ_id = 0;
					foreach($aSignedCertText as $text)
					{?>
						<div>
							<?php
								if($last_categ_id != $text->conf_sign_cert_settings_id)
								{
									$last_categ_id = $text->conf_sign_cert_settings_id; ?> 
										<div class='confSignName'>
											<?php 	echo $text->confSignCertSettings->name;
													echo CHtml::ajaxButton('Add New', 
																			Yii::app()->controller->createUrl('confsigncerttext/createajax', 
																			array('settingId'=>$last_categ_id, 'needRedirect'=>'save')),
																			array('success'=>'function(transport){ window.location="'.Yii::app()->controller->createUrl("confgeneral/signedcertification").'#'.$last_categ_id.'"}')) ?>:
										</div>
								<?php }	?>
							<?php 	echo CHtml::checkBox("value[$text->id]", in_array($text->id, $selected_values)); 
									echo $text->value; ?>
						</div>
				<?php }
			} 
		?>

		<div class="row buttons">
			<?php echo CHtml::submitButton('Save'); ?>
		</div>
	
	<?php $this->endWidget(); ?>

</div>

