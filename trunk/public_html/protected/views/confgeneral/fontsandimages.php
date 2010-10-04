<h4>Edit Fonts and Images #<?php echo $confGeneral->id; ?></h4>
<?php echo CHtml::beginForm(Yii::app()->controller->createUrl("/confgeneral/fontsandimagessubmit"), 'post') ?>
Global Font Type :	
				<?php
				echo CHtml::activeDropDownList(
					$confGeneral,
					'global_font_type',
					Yii::app()->params['fontTypes']); ?>
					
<div class='allFonts'>
	<?php foreach ($aFontsConf as $unit) { ?>
		<div class='simpleFont'>
			<h3><?php echo $unit->section ; ?></h3>
			Font Size 	
			<?php
				echo MCHtml::activeDropDownList(
					$unit,
					'size',
					Yii::app()->params['fontSize'], array('preName'=>$unit->section));?>
			<br />
			<?php echo MCHtml::activeCheckBox(
						$unit,
						'bold', array('preName'=>$unit->section));?>  Bold
			<br />				
			<?php echo MCHtml::activeCheckBox(
						$unit,
						'italics', array('preName'=>$unit->section));?> Italics
			<br />
			<?php echo MCHtml::activeCheckBox(
						$unit,
						'underline', array('preName'=>$unit->section));?> Underline
			
			<?php echo MCHtml::activeHiddenField(
						$unit,
						'conf_gen_id', array('value'=>$unit->conf_gen_id, 'preName'=>$unit->section)) ?>
		</div>
	<?php } ?>
</div>

<div class='forHr'><hr /></div>

<div class='allImages'>
	<h3>Image Sizes</h3>
	<?php foreach($aImageConf as $img) { ?>
		<div class='simpleImage'>
			<h3><?php echo $img->size ?></h3>
			Max Height: <?php echo MCHtml::activeTextField(
											$img, 
											'max_height', 
											array(	'size'=>'3',
													'class'=>'maxheight', 
													'preName'=>"$img->size")) ?><br />
			Max Width: <?php echo MCHtml::activeTextField(
											$img, 
											'max_width', 
											array(	'size'=>'3', 
													'class'=>'maxwidth',
													'preName'=>"$img->size")) ?>
		</div>
	<?php } ?>
		<div class='faiSaveButton clear'>
			<?php echo CHtml::submitButton('Save', array('style'=>'margin-top:40px')) ?>
		</div>
	<?php echo CHtml::endForm(); ?>
</div>