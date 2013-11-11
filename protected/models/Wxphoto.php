<?php

class WxPhoto extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return '{{wx_photo}}';
	}

	public function rules()
	{
		return array(
//		array('maintitle', 'required', 'message'=>'用户名不能为空'),
//		array('wx_acct_pw', 'required', 'message'=>'密码不能为空'),
//		array('wx_acct', 'unique', 'message'=>'微信账号已被托管'),
		);
	}

}
