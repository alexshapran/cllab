<?php
$this->breadcrumbs=array(
	'Appraisals'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Appraisal', 'url'=>array('index')),
	array('label'=>'Create Appraisal', 'url'=>array('create')),
	array('label'=>'View Appraisal', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Appraisal', 'url'=>array('admin')),
);
?>

<h1>Update Appraisal <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array( 'model'=>$model, 
												'aClient'=>$aClient,
												'oClient'=>$oClient, 
												'oBasicParams'=>$oBasicParams,
												'aPurpose'=>$aPurpose,
												'aValueTypes'=>$aValueTypes,
												'aReportTypes'=>$aReportTypes,
												'aImagesSize'=>$aImagesSize,
												'aDateTypes'=>$aDateTypes,
												'aReportSections'=>$aReportSections,)); ?>