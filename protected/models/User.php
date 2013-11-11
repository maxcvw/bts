<?php

/**
 * This is the model class for table "{{user}}".
 *
 * The followings are the available columns in table '{{user}}':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $profile
 *
 * The followings are the available model relations:
 * @property Post[] $posts
 */
class User extends CActiveRecord
{
	public $password2;

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{user}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
		array('username', 'required', 'message'=>'用户名不能为空'),
		array('username', 'unique', 'message'=>'用户名已存在'),
		array('password', 'required', 'message'=>'密码不能为空'),
		array('username, password', 'length', 'max'=>20),
		array('password2', 'compare', 'compareAttribute'=>'password', 'operator' => '==', 'message'=>'两次密码输入不一致'),
		array('email', 'email', 'message'=>'邮箱格式错误'),
		// The following rule is used by search().
		// @todo Please remove those attributes that should not be searched.
		// array('id, username, password, email, profile', 'safe', 'on'=>'search'),
		);
	}


	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'gp_user_id' => 'ID',
			'username' => '用户名',
			'password' => '密码',
		    'password2' => '再次输入密码',
		    'email' => '电子邮箱',
		);
	}

}
