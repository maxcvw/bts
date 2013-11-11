<?php

class Wxphotogroup extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return '{{wx_photo_group}}';
	}

	public function rules()
	{
		return array(
		array('maintitle', 'required', 'message'=>'名称不能为空'),
		array('maintitle', 'length', 'max'=>30),
		array('content', 'length', 'max'=>300),
		);
	}

}
