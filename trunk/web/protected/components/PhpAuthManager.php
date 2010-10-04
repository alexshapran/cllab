<?php 
class PhpAuthManager extends CPhpAuthManager{
    public function init()
    {
        if($this->authFile===null){
            $this->authFile=Yii::getPathOfAlias('application.config.auth').'.php';
        }

        parent::init();

//        $auth=Yii::app()->authManager;
//    	foreach($auth->getAuthAssignments($account->id) as $key=>$assign)
//		{
//			$auth->revoke($key, $account->id);
//		}
			
//        $this->assign(Yii::app()->user->role, Yii::app()->user->id);
    }
}?>