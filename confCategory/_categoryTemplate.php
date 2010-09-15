<?php // $model - current category (parent or child, no matter) ?>
<div class='catName' id='catName<?php echo $model->id ?>'><?php echo $model->name; ?></div>
<?php 

$this->renderPartial('/confCategory/_simpleCategoryForm', 
						array('model'=>$model, 
						'aParCats'=>$aParentCategories)) ?>

<span id='catButtons<?php echo $model->id ?>' <?php if(!$model->parent_id) echo 'style="margin-left:18px;"' ?>>

<?php echo CHtml::Button('Edit', 
							array('onclick'=>'$("#catForm'.$model->id.'").toggleClass("hidden"); $("#catName'.$model->id.'").toggleClass("hidden"); $("#catButtons'.$model->id.'").toggleClass("hidden");')) ?>
<?php
//  такая же проблема, как в _simpleCategoryForm ( renderPartial не перегружает ajax, use jQuery)
//  echo CHtml::ajaxButton('Delete', Yii::app()->controller->createUrl("confcategory/ajaxdelete", array('id'=>$model->id)), array('update'=>'#allcategories'), array('id'=>'delButton'.$model->id)); ?>
<?php echo CHtml::button('Delete', array('id'=>'delButton'.$model->id, 'onclick'=>'jQuery.ajax({"url":"/index.php?r=confcategory/ajaxdelete&id='.$model->id.'","cache":false,"success":function(html){jQuery("#allcategories").html(html)}});return false;')); ?>
</span>