<?php echo CHtml::link('Market Analysis', Yii::app()->createUrl('/appraisalreport/marketanalysis/' . $model->alias))?>&nbsp;&nbsp;
<?php echo CHtml::link('Resume', Yii::app()->createUrl('/appraisalreport/resume/' . $model->alias))?>&nbsp;&nbsp;
<br />
Supporting Documents

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