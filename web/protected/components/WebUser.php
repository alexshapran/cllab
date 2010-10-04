<?php
class WebUser extends CWebUser {
	private $_model = null;

	function getRole() {
		if($user = $this->getModel()){
			return $user->privilege->value;
		}
	}

	public function getModel(){
/*		if (!$this->isGuest && $this->_model === null){
			$this->_model = User::model()->findByPk($this->id , array('select' => 'privilege_id' ) );
		}

		return $this->_model;*/
		return User::model()->findByPk($this->id);
	}

	/*
	 * @param		none
	 * @return		[int] General Config ID by the User_id->account_id
	 */
	public function getConfigId()
	{
		$model = $this->getModel();
		$oConfGeneral = ConfGeneral::model()->findByAttributes(array('account_id'=>$model->account_id));
		
		return $oConfGeneral->id;
	}
}

?>