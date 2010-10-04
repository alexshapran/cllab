<div class="object_form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'object-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	
	
	<div class="row">
		<?php echo $form->labelEx($model,'category_id'); ?>
		<?php echo $form->dropDownList( $model,
										'category_id', 
										CHtml::listData(ConfCategory::getParentCategories(), 'id','name'),
										array(
											'prompt'=>'-Select-',
											'onChange'=>'loadSubCatefory($("#Object_category_id").attr("value"));'
										)); ?>
		<?php echo $form->error($model,'category_id'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'sub_category_id'); ?>
		<?php echo $form->dropDownList( $model,
										'sub_category_id', 
										array(),
										array(
											'prompt'=>'-Select-',
										)); ?>
		<?php echo $form->error($model,'sub_category_id'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'location'); ?>
		???<?php //echo $form->textArea($model,'location',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'location'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'location1'); ?>
		???<?php //echo $form->textArea($model,'location1',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'location1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'location2'); ?>
		???<?php // echo $form->textArea($model,'location2',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'location2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'client_ret'); ?>
		<?php echo $form->textField($model,'client_ret',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'client_ret'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'value'); ?>
		<?php echo $form->textField($model,'value',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'value'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'value2'); ?>
		<?php echo $form->textField($model,'value2',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'value2'); ?>
	</div>



	<div class="tinymce">
		<?php echo $form->labelEx($model,'description'); ?><br />
		<?php $this->widget('application.extensions.tinymce.ETinyMce', 
			array(
				'model'=>$model, 
				'attribute'=>'description',
				'htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'tinymce'))); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>
	
	<div class="tinymce">
		<?php echo $form->labelEx($model,'provenance'); ?><br />
		<?php $this->widget('application.extensions.tinymce.ETinyMce', 
			array(
				'model'=>$model, 
				'attribute'=>'provenance',
				'htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'tinymce'))); ?>
		<?php echo $form->error($model,'provenance'); ?>
	</div>
	
	<div class="tinymce">
		<?php echo $form->labelEx($model,'exhibited'); ?><br />
		<?php $this->widget('application.extensions.tinymce.ETinyMce', 
			array(
				'model'=>$model, 
				'attribute'=>'exhibited',
				'htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'tinymce'))); ?>
		<?php echo $form->error($model,'exhibited'); ?>
	</div>
	
	<div class="tinymce">
		<?php echo $form->labelEx($model,'literature'); ?><br />
		<?php $this->widget('application.extensions.tinymce.ETinyMce', 
			array(
				'model'=>$model, 
				'attribute'=>'literature',
				'htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'tinymce'))); ?>
		<?php echo $form->error($model,'literature'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'insert_page_break'); ?>
		<?php echo $form->checkBox($model, 'insert_page_break'); ?>
		<?php echo $form->error($model,'insert_page_break'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'maker_artist'); ?>
		<?php echo $form->textField($model,'maker_artist',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'maker_artist'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dimensions'); ?>
		<?php echo $form->textField($model,'dimensions',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'dimensions'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'medium'); ?>
		<?php echo $form->textField($model,'medium',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'medium'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_period'); ?>
		<?php echo $form->textField($model,'date_period',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'date_period'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'markings'); ?>
		<?php echo $form->textField($model,'markings',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'markings'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'condition'); ?>
		<?php echo $form->textField($model,'condition',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'condition'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'acqusition_cost'); ?>
		<?php echo $form->textField($model,'acqusition_cost',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'acqusition_cost'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'acqusition_date'); ?>
		<?php echo $form->textField($model,'acqusition_date'); ?>
		<?php echo $form->error($model,'acqusition_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'acqusition_source'); ?>
		<?php echo $form->textField($model,'acqusition_source',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'acqusition_source'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_active'); ?>
		<?php echo $form->checkBox($model, 'is_active'); ?>
		<?php echo $form->error($model,'is_active'); ?>
	</div>

	<div class="tinymce">
		<?php echo $form->labelEx($model,'notes'); ?><br />
		<?php $this->widget('application.extensions.tinymce.ETinyMce', 
			array(
				'model'=>$model, 
				'attribute'=>'notes',
				'htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'tinymce'))); ?>
		<?php echo $form->error($model,'notes'); ?>
	</div>
	
	<div class="comparable_sales">
		<img style="float:left" src="/uploads/images/thumbnail_50_50_p/0c1c708c5c" />
		<?php foreach($aComparableSales as $id => $obj) { ?>
			<?php $this->renderPartial('_comparable_sales', array('obj'=>$obj))?>
		<?php } ?>
		<?php echo CHtml::hiddenField('img_position','', array('id'=>'img_position'))?>
		
		<?php 
			 echo CHtml::ajaxLink(
				'Add more',
				yii::app()->controller->createUrl('AddComparableAjax', array('object'=>$model->id)),
				array(
					'dataType'=>'json',
					'success'=>'function (transport) { insertSales(transport) }')
				);
		?>
	</div>
	
	<?php echo CHtml::hiddenField('save_location', '', array('id'=>'save_location'))?>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton('Save'); ?>
		<?php echo CHtml::submitButton('Save & Add More', array('onCLick'=>'$("#save_location").val("new")')); ?>
	</div>

<?php $this->endWidget(); ?>

<?php 
	$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
		'id'=>'upload_image',
		'options'=>array(
			'title'=>'Upload New Image',
			'autoOpen'=>false,
		),
	));
?>
	
	<?php echo $this->renderPartial('/object/_image', array('model' => new AjaxUploadImageForm)); ?>
 
<?php $this->endWidget('zii.widgets.jui.CJuiDialog');?>

</div><!-- form -->

<script type='text/javascript'>

	$(document).ready(function() {
		<?php if($model->category_id) { ?>
			$("#Object_category_id").change();
		<?php } ?>
	});

	function loadSubCatefory(catId) {
		$.ajax({
		  url: '<?php echo Yii::app()->controller->createUrl('getChildrenCategory') ?>',
		  data: 'categoryId='+catId,
		  type: 'post',
		  dataType: 'json',
		  success: function(transport) {
			  $("#Object_sub_category_id").html("");
			  $("#Object_sub_category_id").html(transport.html);
			  <?php if($model->sub_category_id) { ?>
				  $("#Object_sub_category_id").val(<?php echo $model->sub_category_id ?>);
			  <?php } ?>
		  }
		});
	}

	function insertSales(transport) {
		if(transport.form) {
			$("#img_position").before(transport.form);
		}
	}
	
	function deleteSale(transport) {
		if(transport) {
			$("#cs_"+transport).remove();
		}
	}
	
</script>