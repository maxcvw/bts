<?php

class Wxacct extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return '{{wx_acct}}';
	}

	public function rules()
	{
		return array(
		array('wx_acct', 'required', 'message'=>'用户名不能为空'),
		array('wx_acct_pw', 'required', 'message'=>'密码不能为空'),
		array('wx_acct', 'unique', 'message'=>'微信账号已被托管'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'gp_user_id' => 'ID',
			'wx_id' => '微信公众账号ID',
		    'wx_acct' => '微信公众账号',
		    'wx_acct_pw' => '微信公众账号密码',
		    'content' => '描述',
		    'status' => '状态',
			'create_date' => '创建时间',
		);
	}

}
