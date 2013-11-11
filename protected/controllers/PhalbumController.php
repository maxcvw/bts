<?php

class PhalbumController extends Controller
{
	public $layout='//layouts/phalbum';

	//	public function actions()
	//	{
	//	}

	

	public function actionPhotoview()
	{
		//$photo_group_id = $_GET['photo_group_id'];
		//$condition = 'wx_id = '.Yii::app()->user->wx_id;
		//$model = Wxphotogroup::model()->findByPk($photo_group_id,$condition);
		$wx_id = Yii::app()->request->getParam('wxid');		
		$photo_group_id = Yii::app()->request->getParam('pgid');		
		$PhalbumDao = new PhalbumDao();
		$column_photo = $PhalbumDao->findphotolist($wx_id,$photo_group_id);
        //var_dump($column_photo);
		$this->render('photoview',array(
			'column_photo'=>$column_photo,));
	}

	


}