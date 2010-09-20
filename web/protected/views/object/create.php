<?php
$this->breadcrumbs=array(
	'Objects'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Object', 'url'=>array('index')),
	array('label'=>'Manage Object', 'url'=>array('admin')),
);
?>

<h1>Create Object</h1>

<?php echo CHtml::button(
	'Add New Object', 
	array(
		'onClick'=>'location.replace("/object/edit/'. (isset($_GET['id']) ? $_GET['id'] : '') . '")', 
		'class'=>'floatleft'))?>

<?php echo CHtml::form(Yii::app()->createUrl('/appraisal/property'), 'get', array('id'=>'search_form', 'class'=>'floatleft'))?>
	<?php echo CHtml::dropDownList(
		'f',
		'', 
		Object::getSearchField(), 
		array(	
			'onchange'=>
				'', 
			)
	)?>
	
	<?php echo CHtml::textField('s', '', array('style'=>'width:150px;'))?>
<?php echo CHtml::endForm()?>
<?php echo CHtml::submitButton('Search', array('name'=>'', "onClick"=>"submitSearch()", 'class'=>'floatleft'))?>

<?php echo CHtml::textField('go_to', '', array('style'=>'width:50px;', 'class'=>'floatleft'))?>

<?php echo CHtml::button('Go to', array('onClick'=>'goTo()', 'class'=>'floatleft'))?>

<?php if($prevLink = $model->getPrevLink()):?>
	<?php echo CHtml::button(
		'<< Previous', 
		array(
			'onClick'=>'location.replace("' . Yii::app()->createUrl("object/create", array_merge($_GET, array("object"=>$prevLink->id))) . '")', 
			'class'=>'floatleft'))?>
<?php endif;?>

<?php if($nextLink = $model->getNextLink()):?>
	<?php echo CHtml::button(
		'Next >>', 
		array(
			'onClick'=>'location.replace("' . Yii::app()->createUrl("object/create", array_merge($_GET, array("object"=>$nextLink->id))) . '")', 
			'class'=>'floatleft'))?>
<?php endif;?>
<div class="clear"></div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

<script type='text/javascript'>

	function goTo() {
		var goToVal = $("#go_to").val();
		if(goToVal =='') {
			alert('Please entered Id!');
			return false;
		}
		var regex = /^[0-9]+$/;
	    if(!regex.test(goToVal)) {
		    alert('Only integer!');
		    return false;
	    }
	    location.replace('/object/'+goToVal);
	}

	function submitSearch() {
		if($('#s').val() == ''){ 
			alert("Field cann't be empty"); 
			return false;
		} else { 
			$("#search_form").submit();
		}
	}
	
</script>