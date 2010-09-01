<?php
$this->breadcrumbs=array(
	'Conf Generals'=>array('index'),
	$model->id,
);

//$this->menu=array(
//	array('label'=>'List ConfGeneral', 'url'=>array('index')),
//	array('label'=>'Create ConfGeneral', 'url'=>array('create')),
//	array('label'=>'Update ConfGeneral', 'url'=>array('update', 'id'=>$model->id)),
//	array('label'=>'Delete ConfGeneral', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
//	array('label'=>'Manage ConfGeneral', 'url'=>array('admin')),
//);
?>

<h1>Edit Fonts and Images #<?php echo $confGeneral->id; ?></h1>
<?php echo CHtml::beginForm(Yii::app()->controller->createUrl("/confgeneral/fontsandimagessubmit"), 'post') ?>
Global Font Type :	
				<?php
				echo CHtml::activeDropDownList(
					$confGeneral,
					'global_font_type',
					Yii::app()->params['fontTypes']); ?>
<br />
<br />
<?php foreach ($fontsConf as $unit) { ?>
<div style='border: dotted grey 1px; float:left; min-width:150px; padding:10px;'>
<h3><?php echo $unit->section ;
?></h3>
Font Size 	
				<?php
				echo MCHtml::activeDropDownList(
					$unit,
					'size',
					Yii::app()->params['fontSize'], array('preName'=>$unit->section));
//					CHtml::listData($unit, $unit->size, $unit->size)); 
				// CHtml::dropDownList($unit->section,Yii::app()->params['fontSize']) ?>
<br />
				<?php echo MCHtml::activeCheckBox(
					$unit,
					'bold', array('preName'=>$unit->section));
				?>  Bold
<br />				
				<?php echo MCHtml::activeCheckBox(
					$unit,
					'italics', array('preName'=>$unit->section)); 
				?> Italics
<br />
				<?php echo MCHtml::activeCheckBox(
					$unit,
					'underline', array('preName'=>$unit->section)); 
				?> Underline
				
				<?php echo MCHtml::activeHiddenField(
					$unit,
					'conf_gen_id', array('value'=>$unit->conf_gen_id, 'preName'=>$unit->section)) ?>
</div>
<?php } ?>

<hr>

<div style='border: dotted grey 1px; min-width:300px; padding:10px; clear:both'>
<h3>Image Sizes</h3>
<?php foreach($imageConf as $img) { ?>
<div style='border: dotted grey 1px; float:left; min-width:120px; padding:10px;'>
<h3><?php echo $img->size ?></h3>
Max Height: <?php echo MCHtml::activeTextField($img, 'max_height', array('size'=>'3', 'style'=>'height:12px;', 'preName'=>"$img->size")) ?><br />
Max Width: <?php echo MCHtml::activeTextField($img, 'max_width', array('size'=>'3', 'style'=>'margin-left:5px; height:12px;', 'preName'=>"$img->size")) ?>
</div>
<?php } ?>
<div class='clear' style='margin: 30px auto; width:6%'><?php echo CHtml::submitButton('Save', array('style'=>'margin-top:40px')) ?></div>
<?php echo CHtml::endForm(); ?>
</div>