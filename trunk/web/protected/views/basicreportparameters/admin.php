<?php
$this->breadcrumbs=array(
	'Basic Report Parameters'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List BasicReportParameters', 'url'=>array('index')),
	array('label'=>'Create BasicReportParameters', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('basic-report-parameters-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Basic Report Parameters</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form hidden">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'basic-report-parameters-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'appraisal_id',
		'date_created',
		'client_name',
		'city',
		'year',
		/*
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
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
