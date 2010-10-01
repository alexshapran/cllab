<div id='allcategories'><?php
$this->renderPartial('/confcategory/_allcategories', array('aParentCategories'=>$aParentCategories, 'aChildCats'=>$aChildCats, 'oNewCategory'=>$oNewCategory));
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
			
			echo CHtml::ajaxSubmitButton('Save',
										Yii::app()->controller->createUrl('/confgeneral/submitattributeorder'), 
										array(	'success'=>'unbusy()'),
										array(
												'onclick'=>'busy(); $("#attrOrder").val( $(".ui-sortable").sortable("toArray").toString() )'
										));
		echo CHtml::endForm();
	?>
</div>
<script>
function changeView(id)
{
	$("#catForm" + id).toggleClass("hidden");
	$("#catName" + id).toggleClass("hidden"); 
	$("#catButtons" + id).toggleClass("hidden");
}
</script>