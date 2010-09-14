<?php
$this->breadcrumbs=array(
	'Conf Generals'=>array('index'),
$model->id,
);

//$this->menu=array(
//	array('label'=>'List ConfGeneral', 'url'=>array('index')),
//	array('label'=>'Create ConfGeneral', 'url'=>array('create')),
//	array('label'=>'Update ConfGeneral', 'url'=>array('update', 'id'=>$model->id)),
//	array('label'=>'Delete ConfGeneral', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
//	array('label'=>'Manage ConfGeneral', 'url'=>array('admin')),
//);
?>

<div id='allcategories'><?php
$this->renderPartial('/confCategory/_allCategories', array('aParentCategories'=>$aParentCategories, 'aChildCats'=>$aChildCats, 'oNewCategory'=>$oNewCategory));
?></div>
<div id='attr_exp_order'>
<?php
echo CHtml::beginForm('/confgeneral/submitattributeorder', 'POST');
$this->widget('zii.widgets.jui.CJuiSortable', array(
    'items'=> unserialize($oGenConfig->attr_exp_order),
    // additional javascript options for the accordion plugin
    'htmlOptions'=> array('style'=>'cursor:pointer;', 'id'=>'attrExpOrder'),
    'options'=>array(
        'delay'=>'300',
    ),
));
echo CHtml::hiddenField('attrOrder','',array('id'=>'attrOrder'));

echo CHtml::ajaxSubmitButton(	'Save',
								Yii::app()->controller->createUrl('/confgeneral/submitattributeorder'), 
								array(),
								array(
										'onclick'=>'$("#attrOrder").val( $(".ui-sortable").sortable("toArray").toString() )'
								));
echo CHtml::endForm();
 ?>
</div>