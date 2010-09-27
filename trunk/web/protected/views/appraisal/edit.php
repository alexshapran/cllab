<h1>Update Appraisal <?php echo $model->name; ?></h1>

<?php echo $this->renderPartial('_form', array( 'model'=>$model, 
												'oClient'=>$oClient, 
												'oBasicParams'=>$oBasicParams,
												'aPurpose'=>$aPurpose,
												'aValueTypes'=>$aValueTypes,
												'aReportTypes'=>$aReportTypes,
												'aImagesSize'=>$aImagesSize,
												'aDateTypes'=>$aDateTypes,
												'aReportSections'=>$aReportSections,)); ?>