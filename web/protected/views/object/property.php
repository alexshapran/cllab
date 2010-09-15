<?php
$this->breadcrumbs=array(
	'Objects'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Object', 'url'=>array('index')),
	array('label'=>'Create Object', 'url'=>array('create')),
);

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

<h1>Manage Objects</h1>

<?php echo CHtml::button('Add New Object', array('onClick'=>'', 'class'=>'floatleft'))?>

<?php echo CHtml::form(Yii::app()->createUrl('/object/property'), 'get', array('id'=>'search_form', 'class'=>'floatleft'))?>
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
<?php echo CHtml::dropDownList(
	'orderBy',
	'', 
	array('all'=>'Search All Fields', 'id'=>'ID','cat_location'=>'Category, Location','loc_category'=>'Location, Category'), 
	array(	
		'onchange'=>
			'location.replace("'.Yii::app()->controller->createUrl(	'object/property', array_merge($_GET, array('orderBy'=>''))) . '"+$("#orderBy").attr("value"))', 
		)
)?>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'object-grid',
	'dataProvider'=>$aObjects,
	'columns'=>array(
		'id',
		'location',
		array(
             'name'=>'category_id',
             'value'=>'$data->category->name',
         ),
        'maker_artist',
		'title',
		array(
			'class'=>'CButtonColumn',
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
			'location.replace("'.Yii::app()->controller->createUrl(	'object/property', array_merge($_GET, array('pager'=>''))) . '"+$("#pager").attr("value"))', 
		)
	)?>
	
<script type='text/javascript'>

	<?php if(isset($_GET['orderBy'])) { ?>
		$("#orderBy").val(<?php echo "'". $_GET['orderBy'] . "'" ?>);
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
