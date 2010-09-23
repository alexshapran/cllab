<?php
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

<?php echo CHtml::button('Create New Appraisal', array('onclick'=>'window.location = "'.yii::app()->createUrl('/appraisal/').'"')) ?>

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
