<?php
$this->breadcrumbs=array(
	'Basic Report Parameters'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List BasicReportParameters', 'url'=>array('index')),
	array('label'=>'Create BasicReportParameters', 'url'=>array('create')),
	array('label'=>'Update BasicReportParameters', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete BasicReportParameters', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage BasicReportParameters', 'url'=>array('admin')),
);
?>

<h1>View BasicReportParameters #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'appraisal_id',
		'date_created',
		'client_name',
		'city',
		'year',
		'purposes_id',
		'types_of_value_id',
		'types_of_report_id',
		'primary_img_size_id',
		'sec_img_size_id',
		'currency_symbol',
		'eximmination_dates',
		'research_dates_from',
		'reseach_dates_to',
		'effective_valuation_date',
		'issue_date_report',
		'order_report_section',
	),
)); ?>
