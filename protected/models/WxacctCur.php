<?php

class WxacctCur extends CActiveRecord
{

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return '{{wx_acct_cur}}';
	}

	//public function attributeLabels()
	//	{
	//		return array(
	//			'gp_user_id' => 'ID',
	//			'wx_id' => '微信公众账号ID',
	//		);
	//	}

}
