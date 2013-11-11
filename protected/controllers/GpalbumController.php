<?php

class GpalbumController extends Controller
{
	public $layout='//layouts/gpwork';

	//	public function actions()
	//	{
	//	}

	public function actionList()
	{
		$dataProvider=new CActiveDataProvider('Wxphotogroup', array(
    'criteria'=>array(
        'condition'=>'status=1 and wx_id='.Yii::app()->user->wx_id,
        'order'=>'photo_group_id DESC',
		),
    'countCriteria'=>array(
        'condition'=>'status=1 and wx_id='.Yii::app()->user->wx_id,
		// 'order' and 'with' clauses have no meaning for the count query
		),
    'pagination'=>array(
        'pageSize'=>20,
		),
		));
		$this->render('list',array(
		'dataProvider'=>$dataProvider,
		'pagerCssClass'=>'',
    	'template'=>"{summary}\n{items}\n{pager}",
		));
	}

	public function actionAlbumadd()
	{
		if(!isset($_GET['photo_group_id']))
		{
			$model = new Wxphotogroup();
			$model->status=1;
			$model->create_date=date("Y-m-d H:i:s");
			$model->photo_url='/gp/img/album0.jpg';
		}
		else
		{
			$photo_group_id = $_GET['photo_group_id'];
			$condition = 'wx_id = '.Yii::app()->user->wx_id;
			$model = Wxphotogroup::model()->findByPk($photo_group_id,$condition);
		}
		if(isset($_POST['Wxphotogroup']))
		{
			$model->attributes=$_POST['Wxphotogroup'];
			$model->wx_id=Yii::app()->user->wx_id;

			$model->update_date=date("Y-m-d H:i:s");
			if($model->save())
			{
				$this->redirect(array('/gpalbum/photoview','photo_group_id'=>$model->photo_group_id));
			}
			else
			{
				//echo "failure";
			}
		}
		$this->render('albumadd',array('model'=>$model));
	}

	public function actionAlbumcover()
	{
		$photo_group_id = $_GET['photo_group_id'];
		$condition = 'wx_id = '.Yii::app()->user->wx_id;
		$model = Wxphotogroup::model()->findByPk($photo_group_id,$condition);
		$this->render('albumcover',array('model'=>$model));
	}

	public function actionCoverupload()
	{
		$tmpfile = CUploadedFile::getInstanceByName('albumcover');//读取图像上传域,并使用系统上传组件上传
		
		$imgTool = new ImgTool();
		$imgTool->imgDeal($tmpfile);
		$result=$imgTool->result;
		$errormsg=$imgTool->errormsg;

		if (isset($result)&&$result==1)
		{
			$raw_url = $imgTool->raw_url;
			$photo_url = $imgTool->photo_url;
			$thumb_url = $imgTool->thumb_url;
			$raw_size = $imgTool->raw_size;
			
			$photo_group_id = $_GET['photo_group_id'];
			$condition = 'wx_id = '.Yii::app()->user->wx_id;
			$model = Wxphotogroup::model()->findByPk($photo_group_id,$condition);
			$model->raw_url=$raw_url;
			$model->photo_url=$photo_url;
			$model->thumb_url=$thumb_url;
			$model->raw_size=$raw_size;
			$model->update_date=date("Y-m-d H:i:s");
			$model->save();

			$str = json_encode(
			array(
        	'photogroup'=>array(  
            'errormsg' => $errormsg,
            'photo_url' => $photo_url,
			)
			)
			);
		}
		else
		{
			$str = json_encode(
			array(
        	'photogroup'=>array(  
            'errormsg' => $errormsg,
			)
			)
			);
		}

		echo $str;
	}

	public function actionPhotoview()
	{
		//$photo_group_id='';
		if(isset($_GET['photo_group_id']))
		{
			$photo_group_id = $_GET['photo_group_id'];
			$condition = 'wx_id = '.Yii::app()->user->wx_id;
			$photo_group = Wxphotogroup::model()->findByPk($photo_group_id,$condition);
		}

		$dataProvider=new CActiveDataProvider('Wxphoto', array(
    'criteria'=>array(
        'condition'=>'status=1 and wx_id='.Yii::app()->user->wx_id.' and photo_group_id='.$photo_group_id,
        'order'=>'photo_id',
		),
    'countCriteria'=>array(
        'condition'=>'status=1 and wx_id='.Yii::app()->user->wx_id.' and photo_group_id='.$photo_group_id,
		// 'order' and 'with' clauses have no meaning for the count query
		),
    'pagination'=>array(
        'pageSize'=>20,
		),
		));
		$this->render('photoview',array(
		'dataProvider'=>$dataProvider,
		'data'=>$photo_group,
		));
	}


	public function actionPhotoadd()
	{
		//$photo_group_id='';
		if(isset($_GET['photo_group_id']))
		{
			$photo_group_id = $_GET['photo_group_id'];
			$condition = 'wx_id = '.Yii::app()->user->wx_id;
			$photo_group = Wxphotogroup::model()->findByPk($photo_group_id,$condition);
		}

		$this->render('photoadd',array(
		'data'=>$photo_group,
		));
	}



	public function actionPhotoupload()
	{
		$errormsg='上传失败';
		$tmpfile_array = CUploadedFile::getInstancesByName('files');//读取图像上传域,并使用系统上传组件上传
		foreach($tmpfile_array as $k=>$tmpfile){
        $imgTool = new ImgTool();
		$imgTool->imgDeal($tmpfile);
		$result=$imgTool->result;
		$errormsg=$imgTool->errormsg;

		if (isset($result)&&$result==1)
		{
			$raw_url = $imgTool->raw_url;
			$photo_url = $imgTool->photo_url;
			$thumb_url = $imgTool->thumb_url;
			$raw_size = $imgTool->raw_size;
			
			$photo_group_id = $_GET['photo_group_id'];
			$wx_id = Yii::app()->user->wx_id;
			$model = new WxPhoto();
			$model->wx_id = $wx_id;
			$model->photo_group_id = $photo_group_id;
			$model->raw_url=$raw_url;
			$model->photo_url=$photo_url;
			$model->thumb_url=$thumb_url;
			$model->raw_size=$raw_size;
			$model->status=1;
			$model->maintitle=$tmpfile->name;
			$model->content='创建于'.date("Y-m-d H:i:s");
			$model->create_date=date("Y-m-d H:i:s");
			$model->update_date=date("Y-m-d H:i:s");
			$model->price=9.99;
			$model->unit='元包邮';
			$model->save();

			$str = json_encode(
			array(
        	'photogroup'=>array(  
            'errormsg' => $errormsg,
            'thumb_url' => $thumb_url,
			)
			)
			);
		}
		else
		{
			$str = json_encode(
			array(
        	'photogroup'=>array(  
            'errormsg' => $errormsg,
			)
			)
			);
		}

		echo $str;
	    }
	}


}