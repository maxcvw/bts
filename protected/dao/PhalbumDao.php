<?php

class PhalbumDao {

public function findphotolist($wx_id,$photo_group_id){
	    $sql = 'select photo_url from {{wx_photo}} where wx_id = :wx_id and photo_group_id= :photo_group_id';		
		$command = Yii::app()->db->createCommand($sql);
		$command -> bindParam(':wx_id',$wx_id,PDO::PARAM_INT);
		$command -> bindParam(':photo_group_id',$photo_group_id,PDO::PARAM_INT);
		return $column = $command-> queryColumn();
	}

	
	
}