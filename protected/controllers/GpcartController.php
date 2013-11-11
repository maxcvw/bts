<?php

class GpcartController extends Controller
{
	public $layout='//layouts/gpwork';

	public function actionModechoose()
	{
		$this->render('modechoose');
	}


	public function actionPhotomode()
	{
		$photogroupDao = new WxPhotogroupDao();
		$photogrouprows = $photogroupDao->getPhotogroup();
		//var_dump($photogrouprows);

		$condition = 'status=1 and wx_id='.Yii::app()->user->wx_id;
		$photo_group_id = 0;
		if(isset($_GET['photo_group_id']))
		{
			$condition = $condition.' and photo_group_id='.$_GET['photo_group_id'];
			$photo_group_id=$_GET['photo_group_id'];
		}

		$dataProvider=new CActiveDataProvider('Wxphoto', array(
    'criteria'=>array(
        'condition'=>$condition,
        'order'=>'photo_id DESC',
		),
    'pagination'=>array(
        'pageSize'=>5,
		),
		));

		$this->render('photomode',
		array('photogrouprows'=>$photogrouprows,
		'photo_group_id'=>$photo_group_id,
		'dataProvider'=>$dataProvider,));

	}

	public function actionAjaxphotoupdate()
	{
		if(isset($_GET['photo_id']))
		{
			$photo_id = $_GET['photo_id'];
			
			if(Yii::app()->request->isPostRequest)
			{
				$condition = 'status=1 and wx_id = '.Yii::app()->user->wx_id
				.' and update_date=\''.$_POST["update_date"].'\'';
				$model = Wxphoto::model()->findByPk($photo_id,$condition);
				if(isset($model))
				{
				$model->maintitle=$_POST['maintitle'];
				$model->content=$_POST['content'];
				$model->update_date=date("Y-m-d H:i:s");
				$model->save();
				Yii::app()->user->setFlash('photoupdate','<span class = "text-success"><small>修改成功</small></span>');
				$this->renderPartial('_photomode',
				array('data'=>$model)
				);
				}
				else 
				{
					//乐观锁定相片信息可能已被更新,重新获取信息
					Yii::app()->user->setFlash('photoupdate','<span class = "text-danger"><small>相片信息可能已被更新请重新修改</small></span>');
					$newcondition = 'status=1 and wx_id = '.Yii::app()->user->wx_id;
					$newmodel = Wxphoto::model()->findByPk($photo_id,$newcondition);
					$this->renderPartial('_photomode',
					array('data'=>$newmodel)
					);
				}
			}
			else
			{
				$condition = 'wx_id = '.Yii::app()->user->wx_id;
				$model = Wxphoto::model()->findByPk($photo_id,$condition);

				$str = json_encode(
				array(
        		'photo'=>array(  
            	'maintitle' => $model->maintitle,
            	'content' => $model->content,
				'update_date' => $model->update_date,
				)
				)
				);
					
				echo $str;
			}
		}
	}
	
	public function actionPhotomodesort()
	{
		$condition = 'wx_id = '.Yii::app()->user->wx_id;
		$photo_id = 1;
		$phototemplist = Wxphoto::model()->findByPk($photo_id,$condition);
		$this->render('photomodesort',
		array('phototemplist'=>$phototemplist,));
	}

}