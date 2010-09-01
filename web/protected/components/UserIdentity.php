<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	protected $_id;

	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		/*$users=array(
			// username => password
			'demo'=>'demo',
			'admin'=>'admin',
			);
			if(!isset($users[$this->username]))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
			else */

		$account = User::model()->findByAttributes(array('username'=>$this->username) );

		if(!isset($account))
		$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif($account->password!==md5($this->password))
		$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
		{
			$this->errorCode=self::ERROR_NONE;
				
			// AUTH
			$auth=Yii::app()->authManager;
			$auth->revoke($account->privilege->value, $account->id);
			$auth->assign($account->privilege->value, $account->id);
			$auth->save();
			// AUTH END

			$this->_id = $account->id;
		}
		return !$this->errorCode;
	}

	public function getId(){
		return $this->_id;
	}

}