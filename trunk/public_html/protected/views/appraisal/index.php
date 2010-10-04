<?php
	Yii::app()->clientScript->registerScript('search', "
	$('.search-button').click(function(){
		$('.search-form').toggle();
		return false;
	});
	$('.search-form form').submit(function(){
		$.fn.YiiGridView.update('appraisal-grid', {
			data: $(this).serialize()
		});
		return false;
	});
	");
?>

<?php echo Appraisal::createNewLink(); ?>

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
					'url'=>'Yii::app()->controller->createUrl("appraisal/edit", array("id"=>$data->alias))',
      			),
      			'delete'=>array(
	                'label'=>'delete',
      				'imageUrl'=>'',
      			),
      			'duplicate'=>array(
	                'label'=>'duplicate',
      				'url'=>'Yii::app()->controller->createUrl("appraisal/duplicate", array("id"=>$data->alias))',
      			),
      			
      		),
		),
	),
)); ?>
