<?php // $model - current category (parent or child, no matter) ?>
<div class='catName' id='catName<?php echo $model->id ?>'><?php echo $model->name; ?></div>
<?php 

$this->renderPartial('/confCategory/_simpleCategoryForm', 
						array('model'=>$model, 
						'aParCats'=>$aParentCategories)) ?>

<span id='catButtons<?php echo $model->id ?>' <?php if(!$model->parent_id) echo 'style="margin-left:18px;"' ?>>

<?php	echo CHtml::Button('Edit', 
							array('onclick'=>'changeView('.$model->id.')')) ?>
<?php
		echo CHtml::ajaxButton(
				'Delete', 
				Yii::app()->controller->createUrl("confcategory/ajaxdelete", array('id'=>$model->id)),
				array(	'dataType'=>'json',
						'success'=>'function(transport){ floodDiv(transport) }'), 
				array(	'id'=>'delButton'.$model->id,
						'onclick'=>'if(!confirm("Are you sure?")) return false; busy()')); ?>
</span>