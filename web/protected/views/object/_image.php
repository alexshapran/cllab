<?php echo CHtml::beginForm(Yii::app()->controller->createUrl('image/createAjax'),'post',array('id' => 'uploadImgForm')); ?>
	<?php echo CHtml::activeFileField($model,'image'); ?>
	<?php echo CHtml::script("
		 	$('#uploadImgForm').ajaxForm({
		        dataType: 'json',
		    	success: function(transport) {uploadSuccess(transport);return false;},
		    	error: function(transport) {if (transport.status != 200) alert('Sorry, but some error occured. Try again please');}
			});");
	?>
	<input type="submit" value="Submit">
<?php echo CHtml::endForm(); ?>

<script type="text/javascript">
	function uploadSuccess(transport){
		if(transport.file){
			var imgPosition = $("#img_position").val();
			var img = '<img width="100" height="100" src="/uploads/images/'+transport.file+' />';
			$('#comparable_img_'+imgPosition).html("");
			$('#comparable_img_'+imgPosition).html(img);
			$('#NewImgId_'+imgPosition).val(transport.imgId);	
		}
		$("#upload_image").dialog("close");
	}
</script>

