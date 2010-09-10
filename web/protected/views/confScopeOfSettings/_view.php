<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('allow_add_more')); ?>:</b>
	<?php echo CHtml::encode($data->allow_add_more); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('add_has_name')); ?>:</b>
	<?php echo CHtml::encode($data->add_has_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('conf_gen_id')); ?>:</b>
	<?php echo CHtml::encode($data->conf_gen_id); ?>
	<br />


</div>