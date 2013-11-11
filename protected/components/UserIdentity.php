<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
//		$sql = "select gp_user_id from {{user}}"
//		." where username = '"
//		.$this->username
//		."' and password = '"
//		.$this->password
//		."'";
		$sql = "select gp_user_id from {{user}}"
		." where username = :username and password = :password";
		$params = array(
		':username'=>$this->username,
		':password'=>$this->password,
		);
		
		$model = User::model()->findBySql($sql,$params);
		if(!isset($model))
		{
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		}
		else
		{
			$this->errorCode=self::ERROR_NONE;
		}
		return !$this->errorCode;
	}
}