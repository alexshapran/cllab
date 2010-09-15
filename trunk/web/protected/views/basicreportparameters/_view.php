<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('appraisal_id')); ?>:</b>
	<?php echo CHtml::encode($data->appraisal_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_created')); ?>:</b>
	<?php echo CHtml::encode($data->date_created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('client_name')); ?>:</b>
	<?php echo CHtml::encode($data->client_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('city')); ?>:</b>
	<?php echo CHtml::encode($data->city); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('year')); ?>:</b>
	<?php echo CHtml::encode($data->year); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('purposes_id')); ?>:</b>
	<?php echo CHtml::encode($data->purposes_id); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('types_of_value_id')); ?>:</b>
	<?php echo CHtml::encode($data->types_of_value_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('types_of_report_id')); ?>:</b>
	<?php echo CHtml::encode($data->types_of_report_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('primary_img_size_id')); ?>:</b>
	<?php echo CHtml::encode($data->primary_img_size_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sec_img_size_id')); ?>:</b>
	<?php echo CHtml::encode($data->sec_img_size_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('currency_symbol')); ?>:</b>
	<?php echo CHtml::encode($data->currency_symbol); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('eximmination_dates')); ?>:</b>
	<?php echo CHtml::encode($data->eximmination_dates); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('research_dates_from')); ?>:</b>
	<?php echo CHtml::encode($data->research_dates_from); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reseach_dates_to')); ?>:</b>
	<?php echo CHtml::encode($data->reseach_dates_to); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('effective_valuation_date')); ?>:</b>
	<?php echo CHtml::encode($data->effective_valuation_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('issue_date_report')); ?>:</b>
	<?php echo CHtml::encode($data->issue_date_report); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('order_report_section')); ?>:</b>
	<?php echo CHtml::encode($data->order_report_section); ?>
	<br />

	*/ ?>

</div>