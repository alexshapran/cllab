<?php
$this->breadcrumbs=array(
	'Clients',
);
?>

<h1>Clients</h1>


<?php echo CHtml::linkButton('Add Client', array('href'=>'')) ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
	'columns'=>array('name', array('name' => 'date_added', 'value' => 'date( "m/j/Y" , strtotime($data->date_added))' ),
						array(	'class'=>'CButtonColumn',
								'template'=>'{update}&nbsp;|&nbsp;{delete}',
								'deleteButtonImageUrl'=>false,
								'updateButtonImageUrl'=>false,
								'deleteButtonLabel'=>'update',
								'updateButtonLabel'=>'delete')),
	'enablePagination'=>false,
	'summaryText'=>false
)); ?>
