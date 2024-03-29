<?php
$this->breadcrumbs=array(
	'Objects'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Object', 'url'=>array('index')),
	array('label'=>'Create Object', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('object-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Objects</h1>

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
	'id'=>'object-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'appraisal_id',
		'category_id',
		'sub_category_id',
		'location',
		'location1',
		/*
		'location2',
		'client_ret',
		'value',
		'value2',
		'description',
		'provenance',
		'exhibited',
		'literature',
		'title',
		'maker_artist',
		'dimensions',
		'medium',
		'date_period',
		'markings',
		'condition',
		'acqusition_cost',
		'acqusition_date',
		'acqusition_source',
		'is_active',
		'notes',
		'export_order',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
