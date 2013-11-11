<?php

class WxacctCurDao {

public function findWxacctCur(){
	    $gp_user_id = Yii::app()->user->gp_user_id;
		$sql = 'select wx_id, wx_acct from {{wx_acct_cur}} where gp_user_id = :gp_user_id';
		$command = Yii::app()->db->createCommand($sql);
		$command -> bindParam(':gp_user_id',$gp_user_id,PDO::PARAM_INT);
		return $row = $command-> queryRow();
	}

	public function setWxacctCur($wx_id, $wx_acct){
		$gp_user_id = Yii::app()->user->gp_user_id;
		$sql = 'insert into {{wx_acct_cur}} (gp_user_id, wx_id, wx_acct) values (:gp_user_id, :wx_id, :wx_acct)';
		$command = Yii::app()->db->createCommand($sql);
		$command -> bindParam(':gp_user_id',$gp_user_id,PDO::PARAM_INT);
		$command -> bindParam(':wx_id',$wx_id,PDO::PARAM_INT);
		$command -> bindParam(':wx_acct',$wx_acct,PDO::PARAM_STR);
		return $rowCount = $command-> execute();
	}

	public function updateWxacctCur($wx_id, $wx_acct){
		$gp_user_id = Yii::app()->user->gp_user_id;
		$sql = 'update {{wx_acct_cur}} set wx_id = :wx_id, wx_acct = :wx_acct where gp_user_id = :gp_user_id';
		$command = Yii::app()->db->createCommand($sql);
		$command -> bindParam(':gp_user_id',$gp_user_id,PDO::PARAM_INT);
		$command -> bindParam(':wx_id',$wx_id,PDO::PARAM_INT);
		$command -> bindParam(':wx_acct',$wx_acct,PDO::PARAM_STR);
		return $rowCount = $command-> execute();
	}

//	public function deleteWxacctCur(){
//		$username = Yii::app()->user->name;
//		$sql = 'delete from {{wx_acct_cur}} where username = :username';
//		$command = Yii::app()->db->createCommand($sql);
//		$command -> bindParam(':username',$username,PDO::PARAM_STR);
//		return $rowCount = $command-> execute();
//	}
	
}