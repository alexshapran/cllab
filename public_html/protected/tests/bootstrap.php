<?php

// change the following paths if necessary
$Yiit=dirname(__FILE__).'/../../../../Yii/framework/Yiit.php';
$config=dirname(__FILE__).'/../config/test.php';

require_once($Yiit);
require_once(dirname(__FILE__).'/WebTestCase.php');

Yii::createWebApplication($config);
