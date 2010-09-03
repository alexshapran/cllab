<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('value')); ?>:</b>
	<?php echo CHtml::encode($data->value); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('conf_general_id')); ?>:</b>
	<?php echo CHtml::encode($data->conf_general_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('conf_sign_cert_settings_id')); ?>:</b>
	<?php echo CHtml::encode($data->conf_sign_cert_settings_id); ?>
	<br />


</div>