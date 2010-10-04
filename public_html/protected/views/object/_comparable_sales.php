<div id="cs_<?php echo $obj->id?>">
	<?php echo CHtml::hiddenField('NewImgId[' . $obj->id  . ']', '', array('id'=>'NewImgId_' . $obj->id))?>
	<?php if($obj->image): ?>
		<img width="100" height="100" class="floatleft" src="/uploads/images/<?php echo $obj->image->name?>" />;
	<?php else: ?>
		<div id="comparable_img_<?php echo $obj->id?>" class="floatleft">
			<?php echo CHtml::link(
				'Upload Image',
				'javascript:', 
				array('onClick'=>'
					$("#upload_image").dialog("open"); 
					$("#img_position").val("' . $obj->id  . '"); 
					return false;', 'id'=>'add-more')
				)?>
		</div>
	<?php endif; ?>
	<?php echo CHtml::textArea('ComparableSales[' . $obj->id  . ']', $obj->description, array('class'=>'floatleft'))?>
	<div class="clear"></div>
	<?php 
		 echo CHtml::ajaxLink(
			'Remove',
			Yii::app()->controller->createUrl('DeleteAjax', array('comparableSale'=>$obj->id)),
			array(
				'dataType'=>'json',
				'success'=>'function (transport) { deleteSale(transport) }')
			);
	?>
	<br />----------------------------------------------<br />
</div>

