<?php

class WxacctDao {

	public function getWx($wx_id=null){
		$gp_user_id = Yii::app()->user->gp_user_id;
		if($wx_id===null)
		{
		$sql = 'select wx_id, wx_acct from {{wx_acct}} where gp_user_id = :gp_user_id';
		$command = Yii::app()->db->createCommand($sql);
		$command -> bindParam(':gp_user_id',$gp_user_id,PDO::PARAM_INT);
		return $row = $command-> queryRow();
		}
		else{
		$sql = 'select wx_id, wx_acct from {{wx_acct}} where gp_user_id = :gp_user_id and wx_id = :wx_id';
		$command = Yii::app()->db->createCommand($sql);
		$command -> bindParam(':gp_user_id',$gp_user_id,PDO::PARAM_INT);
		$command -> bindParam(':wx_id',$wx_id,PDO::PARAM_INT);
		return $row = $command-> queryRow();
		}
	}
	
}