<?php
$this->breadcrumbs=array(
	'Appraisals'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Appraisal', 'url'=>array('index')),
	array('label'=>'Create Appraisal', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('appraisal-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>



<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'appraisal-grid',
	'dataProvider'=>$model->search(),
	'cssFile'=>'/css/gridview/styles.css',
	'hideHeader'=>false,
	'columns'=>array(
		'name',
		'date_created',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{edit} | {delete} | {duplicate}',
			'buttons'=>array(
           		'edit'=>array(
	                'label'=>'edit',
					'url'=>'Yii::app()->controller->createUrl("appraisal/edit", array("id"=>$data->id))',
      			),
      			'delete'=>array(
	                'label'=>'delete',
      				'imageUrl'=>'',    
      			),
      			'duplicate'=>array(
	                'label'=>'duplicate',
      				'url'=>"Yii::app()->createUrl('appraisial')",
      			),
      			
      		),
		),
	),
)); ?>
