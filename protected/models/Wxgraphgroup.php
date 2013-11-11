<?php

class Wxgraphgroup extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return '{{wx_graph_group}}';
	}

	public function rules()
	{
		return array(
		
		);
	}




}
