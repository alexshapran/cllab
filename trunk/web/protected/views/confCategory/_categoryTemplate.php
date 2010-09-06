<?php // $model - current category (parent or child, no matter) ?>

<span>
<?php echo $model->name; ?>
<?php CHtml::ajaxButton('Edit', $url, array(), array()) ?>
<?php CHtml::ajaxButton('Delete', $url, array(), array()) ?>
<span>
<?php $this->renderPartial('/confCategory/_simpleCategoryForm', array('model'=>$model, 'aParCats'=>$aParentCategories)) ?>
</span>
</span>