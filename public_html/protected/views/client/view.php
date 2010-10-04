<h1>View Client #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'name_on_report',
		'date_added',
		'company',
		'email',
		'website',
		'address',
		'address2',
		'city',
		'zip',
		'phone',
		'fax',
		'cell',
		'note',
	),
)); ?>
