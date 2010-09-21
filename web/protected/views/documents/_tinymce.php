<div class="tinymce">
	<?php $this->widget('application.extensions.tinymce.ETinyMce', 
		array(
			'model'=>$model, 
			'attribute'=>'text',
			/*'editorTemplate'=>'full',**/
			'htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'tinymce'))); ?>
</div>