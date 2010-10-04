<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
<?php Yii::app()->clientScript->registerScriptFile(CHtml::asset(Yii::getPathOfAlias('application.views').'/layouts/assets/jquery.form.js'));?>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body onLoad='displayLogin();'>
<div id='greybox'></div>
<div class="container">

	<div>
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

			<?php if(Yii::app()->user->hasFlash('success')): ?>
			    <div class="flash-success">
			        <?php echo Yii::app()->user->getFlash('success'); ?>
			    </div>
			<?php endif; ?>
			<?php if(Yii::app()->user->hasFlash('error')): ?>
			    <div class="flash-error">
			        <?php echo Yii::app()->user->getFlash('error'); ?>
			    </div>
			<?php endif; ?>
			
			
			<!--	Ajax Errors Widget		-->
			<?php 
				$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
					    'id'=>'ajaxErrors',
//					    additional javascript options for the dialog plugin
					    'options'=>array(
					        'title'=>'Error',
					        'autoOpen'=>false,
					    ),
						)); 
			?>
			
				<div id='errorText'></div>
				
				<div style='margin:30px auto; width:30px;'>
					<?php echo CHtml::button('Ok', array('onclick'=>'$("#ajaxErrors").dialog("close")')) ?>
				</div>

			<?php $this->endWidget('zii.widgets.jui.CJuiDialog'); ?>
			
			
			<!--	Ajax Message Widget		-->
			<?php 
				$this->beginWidget(	'zii.widgets.jui.CJuiDialog', 
									array(
								   		'id'=>'ajaxMessage',
									    'options'=>array(
								        				'title'=>'Message',
								        				'autoOpen'=>false,
    										 			),
											)
									); 
			?>
			
			<div id='messageText'></div>
			<div style='margin:30px auto; width:30px;'>
				<?php echo CHtml::button('Ok', array('onclick'=>'$("#ajaxMessage").dialog("close")')) ?>
			</div>

			<?php $this->endWidget('zii.widgets.jui.CJuiDialog'); ?>

<?php 
		$this->beginWidget(	'zii.widgets.jui.CJuiDialog', 
							array(
						   		'id'=>'loginbox_dialog',
							    'options'=>array(
						        				'title'=>'Collectors LAB&nbsp;&nbsp;&nbsp;appraisal manager',
						        				'autoOpen'=>false,
//												'width'=>'300px',
    								 			),
									)
							); 
?>
	<div style='padding:0 50px;'>
		<?php echo $content; ?>
	</div>
<?php $this->endWidget('zii.widgets.jui.CJuiDialog'); ?>
</div>

<script type='text/javascript'>
function displayLogin()
{
	$("#loginbox_dialog").dialog("open");
}
function displayAjaxError(text)
{
	$('#ajaxErrors').dialog('open');
	$('#errorText').html(text);
}
function displayAjaxMessage(text)
{
	$('#ajaxMessage').dialog('open');
	$('#messageText').html(text);
}
function busy()
{	
//	alert($("body").scrollTop());
	$("#greybox").css('top', $("body").scrollTop());
	$("#greybox").fadeIn(400);
}

function unbusy()
{
	$("#greybox").fadeOut(2000);
}

	// TRIM FUNCTIONS for JS
	
function ltrim(str) {
	var ptrn = /\s*((\S+\s*)*)/;
	return str.replace(ptrn, "$1");
}

function rtrim(str) {
	var ptrn = /((\s*\S+)*)\s*/;
	return str.replace(ptrn, "$1");
}

function trim(str) {
	return ltrim(rtrim(str));
}
</script>
</body>
</html>