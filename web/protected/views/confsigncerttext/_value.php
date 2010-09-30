<div 	id='valueform<?php echo $model->id ?>' 
		style='border: 1px dashed grey; min-width: 100%; padding: 10px;'>

	<?php echo MCHtml::activeTextArea(	$model, 
										'value', 
										array(	'cols'=>70, 
												'preName'=>$model->id)); ?>

	<?php echo MCHTML::activeHiddenField($model, 'id', array('preName'=>$model->id)) ?>

<?php 
echo CHtml::ajaxButton(
					'Delete',
					Yii::app()->controller->createUrl(	'confsigncerttext/deleteajax', 
														array('textId'=>$model->id)),

					array('success'=>'function(){ hide('.$model->id.')}'),
					array(	'style'=>'margin: 16px 0 0 5px; position: absolute',
							'onclick'=>'if(!confirm("Are you sure?")) return false; busy()',
							'id'=>'delButton'.$model->id)) ?>
</div>