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
<?php echo CHtml::link('Property', Yii::app()->controller->createUrl('/appraisal/property/' . $model->alias))?> &nbsp;&nbsp;
<?php echo CHtml::link('Cover Letter', Yii::app()->createUrl('/appraisalreport/coverletter/' . $model->alias))?> &nbsp;&nbsp;
<?php echo CHtml::link('Bio/Hist.Context', Yii::app()->createUrl('/appraisalreport/biohistcontext/' . $model->alias))?>&nbsp;&nbsp;
<?php echo CHtml::link('Market Analysis', Yii::app()->createUrl('/appraisalreport/marketanalysis/' . $model->alias))?>&nbsp;&nbsp;
<br />
Supporting Documents
<?php echo CHtml::link('Bibliography', Yii::app()->createUrl('/documents/bibliography/' . $model->alias))?>&nbsp;&nbsp;
<?php echo CHtml::link('Privacy Policy', Yii::app()->createUrl('/documents/privacypolicy/' . $model->alias))?>&nbsp;&nbsp;
<?php echo CHtml::link('Appendicies', Yii::app()->createUrl('/documents/appendicies/' . $model->alias))?>&nbsp;&nbsp;

<h1>Update Appraisal <?php echo $model->name; ?></h1>

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