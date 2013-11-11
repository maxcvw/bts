<?php

class UserDao {

	public function getGpuserid(){
		$username = Yii::app()->user->name;
		$sql = 'select gp_user_id from {{user}} where username = :username';
		$command = Yii::app()->db->createCommand($sql);
		$command -> bindParam(':username',$username,PDO::PARAM_STR);
		return $row = $command-> queryRow();
	}
}