<?php
class WebUser extends CWebUser {
	private $_model = null;

	function getRole() {
		if($user = $this->getModel()){
			// в таблице User есть поле role
			return $user->privilege->value;
		}
	}

	private function getModel(){
		if (!$this->isGuest && $this->_model === null){
			$this->_model = User::model()->findByPk($this->id , array('select' => 'privilege_id' ) );
		}

		return $this->_model;
	}
}

?>