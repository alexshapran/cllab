<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('object-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php echo CHtml::button(
	'Add New Object', 
	array(
		'onClick'=>'location.replace("/object/new/'. ($oAppraisal->alias ? $oAppraisal->alias : $oAppraisal->id) . '")', 
		'class'=>'floatleft'))?>

<?php echo CHtml::form(Yii::app()->createUrl('/appraisal/property/' . $oAppraisal->alias), 'get', array('id'=>'search_form', 'class'=>'floatleft'))?>
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
<div class="clear"></div>
<br />
<?php  //var_dump(Yii::app()->getRequest()->requestUri);die;?>
<span class=''>Order By:</span>&nbsp;
<?php echo CHtml::dropDownList(
	'orderBy',
	'', 
	array('all'=>'Search All Fields', 'id'=>'ID','cat_location'=>'Category, Location','loc_category'=>'Location, Category'), 
	array(	
		'class'=>'',
		'onchange'=>
			'location.replace("'.Yii::app()->controller->createUrl(	'appraisal/property/' . $oAppraisal->alias, array_merge($_GET, array('orderBy'=>''))) . '"+$("#orderBy").attr("value"))', 
		)
)?>
&nbsp;&nbsp;
<?php echo CHtml::button('Apply Export Order', array('onClick'=>'location.replace("'.Yii::app()->controller->createUrl(	'appraisal/property/' . $oAppraisal->alias, array_merge($_GET, array('exp'=>'order'))) . '")'))?>

&nbsp;&nbsp;
<?php echo CHtml::link('Configure Order Settings', '/confgeneral')?>

<?php echo CHtml::button('Renumber', array('onClick'=>'', 'class'=>''))?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'object-grid',
	'dataProvider'=>$aObjects,
	'columns'=>array(
		'id',
		'location',
		array(
             'name'=>'category_id',
             'value'=>'$data->category ? $data->category->name : ""',
         ),
        'maker_artist',
		'title',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{edit} | {delete}',
			'buttons'=>array(
           		'edit'=>array(
	                'label'=>'edit',
					'url'=>'Yii::app()->createUrl("object/create", array_merge($_GET, array("object"=>$data->id)))',
      			),
      			'delete'=>array(
	                'label'=>'delete',
      				'imageUrl'=>'',    
      			),
      		),
		),
	),
)); ?>
<span>Items per page</span>&nbsp;
	<?php echo CHtml::dropDownList(
	'pager',
	'', 
	Yii::app()->params['itemsPerPage'], 
	array(	
		'onchange'=>
			'location.replace("'.Yii::app()->controller->createUrl(	'appraisal/property', array_merge($_GET, array('pager'=>''))) . '"+$("#pager").attr("value"))', 
		)
	)?>
	
<script type='text/javascript'>
	//<![CDATA[
	<?php if(isset($_GET['orderBy'])) { ?>
		$("#orderBy").val(<?php echo "'". $_GET['orderBy'] . "'" ?>);
	<?php } ?>

	<?php if(isset($_GET['pager'])) { ?>
		$("#pager").val(<?php echo "'". $_GET['pager'] . "'" ?>);
	<?php } ?>

	<?php if(isset($_GET['f'])) { ?>
		$("#f").val(<?php echo "'". $_GET['f'] . "'" ?>);
	<?php } ?>

	<?php if(isset($_GET['s'])) { ?>
		$("#s").val(<?php echo "'". $_GET['s'] . "'" ?>);
	<?php } ?>

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
	    location.replace('<?php echo Yii::app()->createUrl("object/create", array_merge($_GET, array("object"=>'')))?>'+goToVal);
	}

	function submitSearch() {
		if($('#s').val() == ''){ 
			alert("Field cann't be empty"); 
			return false;
		} else { 
			$("#search_form").submit();
		}
	}
	//]]>
</script>
