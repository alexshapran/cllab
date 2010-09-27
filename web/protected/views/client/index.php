<h1>Clients</h1>

<?php echo CHtml::button('Add Client', 
				array('onclick'=> 'window.location = "'.Yii::app()->controller->createUrl("/client/create").'"' )) ?>

<?php echo CHtml::beginForm( $this->createUrl('/client/index'), 'POST');

		$attributeList = Client::getAllAttributes();

			echo CHtml::dropDownList('search_field', 
									null, 
									$attributeList, 
									array(	'class' => 	'searchField floatleft',
											'prompt'=>	'Search All Fields'
									));
			echo CHtml::textField('search_text','',array());
			echo CHtml::submitButton('Search');
			echo CHtml::endForm(); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
	'columns'=>array('name', array(	'name' => 'date_added', 
									'value' => 'date( "m/j/Y" , strtotime($data->date_added))',
									'htmlOptions'	=>	array('style'=>'width:65px;')),
						array(	'class'=>'CButtonColumn',
								'template'=>'{update}&nbsp;|&nbsp;{delete}',
								'deleteButtonImageUrl'=>false,
								'updateButtonImageUrl'=>false,
								'deleteButtonLabel'=>'delete',
								'updateButtonLabel'=>'update')),
	'enablePagination'=>false,
	'summaryText'=>false
)); ?>
