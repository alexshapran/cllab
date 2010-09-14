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
<script type='text/javascript'>
function toggle(a)
{
	if(a)
	{
		$("#settLine"+a).toggleClass("hidden"); 
		$("#settText"+a).toggleClass("hidden");
	}
}
</script>
<?php echo CHtml::beginForm('/confscopeofsettings/submit','POST') ?>
<?php
if($aDiscSettings)
	foreach($aDiscSettings as $oSet)
	{ ?>
		<div id='block<?php echo $oSet->id ?>'>
		<?php $this->renderPartial('/confdisclaimersettings/_simpleset', array('model' => $oSet)); ?>
		</div>
<?php } ?>
<div style='width:30%; margin: 30px auto;'>
<?php echo CHtml::ajaxSubmitButton('Save', 
						Yii::app()->controller->createUrl('/confdisclaimersettings/submit')); ?>
</div>
<?php echo CHtml::endForm(); ?>