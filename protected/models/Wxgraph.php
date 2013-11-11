<?php

class Wxgraph extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return '{{wx_graph}}';
	}

	public function rules()
	{
		return array(
//		array('maintitle', 'required', 'message'=>'用户名不能为空'),
//		array('wx_acct_pw', 'required', 'message'=>'密码不能为空'),
//		array('wx_acct', 'unique', 'message'=>'微信账号已被托管'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'wx_id' => '微信公众账号ID',
		    'maintitle' => '标题',
		    'author' => '作者',
		    'content' => '正文',
			'update_date' => '更新时间',
		);
	}

}
