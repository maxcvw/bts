<?php

class WxPhotogroupDao {

	public function getPhotogroup(){
		$wx_id = Yii::app()->user->wx_id;

		$sql = 'select photo_group_id, maintitle from {{wx_photo_group}} where wx_id = :wx_id and status = 1';
		$command = Yii::app()->db->createCommand($sql);
		$command -> bindParam(':wx_id',$wx_id,PDO::PARAM_INT);
		return $rows = $command-> queryAll();

	}
	
}