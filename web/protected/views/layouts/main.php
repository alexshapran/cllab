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

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<div id='greybox'></div>
<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<div id="mainmenu">   
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Manage Appraisals ', 'url'=>array('/appraisal')),
				array('label'=>'Manage Clients', 'url'=>array('/client')),
				array('label'=>'Configuration', 'url'=>array( '/confgeneral/update' )), 
				array('label'=>'Admin', 'url'=>array('/user/accounts') ),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div><!-- mainmenu -->

	<div id="menulevel2">
	<?php
	$menu = $this->generateMenu();
	if($menu)
	{
		$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>'',
			));
			$this->widget('zii.widgets.CMenu', array(
				'items'=>$menu,
				'htmlOptions'=>array('class'=>'menu_level2'),
			));
		$this->endWidget();
	}
	?>
	</div>
	
	<div id="menulevel3">
	<?php
	$menu = $this->generateSubMenu();
	if($menu)
	{
		$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>'',
			));
			$this->widget('zii.widgets.CMenu', array(
				'items'=>$menu,
				'htmlOptions'=>array('class'=>'menu_level3'),
			));
		$this->endWidget();
	}
	?>
	</div>

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
		
	<?php $this->widget('zii.widgets.CBreadcrumbs', array(
		'links'=>$this->breadcrumbs,
	)); ?><!-- breadcrumbs -->

	<?php echo $content; ?>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->
<script type='text/javascript'>
function busy()
{
	$("#greybox").fadeIn(400);
}

function unbusy()
{
	$("#greybox").fadeOut(2000);
}

	// TRIM FUNCTIONS for JS
	
//Убирает пробельные символы слева
function ltrim(str) {
	var ptrn = /\s*((\S+\s*)*)/;
	return str.replace(ptrn, "$1");
}
// Убирает пробельные символы справа
function rtrim(str) {
	var ptrn = /((\s*\S+)*)\s*/;
	return str.replace(ptrn, "$1");
}
// Убирает пробельные символы с обоих концов
function trim(str) {
	return ltrim(rtrim(str));
}
</script>
</body>
</html>