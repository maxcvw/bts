<?php

class GpmatController extends Controller
{
	public $layout='//layouts/gpwork';

	//	public function actions()
	//	{
	//	}

	public function actionGraph()
	{
		$dataProvider=new CActiveDataProvider('Wxgraphgroup', array(
    'criteria'=>array(
        'condition'=>'status=1 and wx_id='.Yii::app()->user->wx_id,
        'order'=>'graph_group_id DESC',
		),
    'countCriteria'=>array(
        'condition'=>'status=1',
		// 'order' and 'with' clauses have no meaning for the count query
		),
    'pagination'=>array(
        'pageSize'=>20,
		),
		));
		$this->render('graph',array(
		'dataProvider'=>$dataProvider,
		));
	}

	public function actionAddgraph()
	{
		$this->render('addgraph');
	}

	public function actionAjaxaddgraph()
	{
		$errormsg='';
		$tmpfile = CUploadedFile::getInstanceByName('Graph[graph]');//读取图像上传域,并使用系统上传组件上传
		if(is_object($tmpfile) && get_class($tmpfile)==='CUploadedFile')
		{
			if ($tmpfile->getError()==1)
			{$errormsg='图片大小超过限制';}
			elseif ($tmpfile->getError()!=0)
			{$errormsg='上传错误';}
			else
			{
				$ext = strtolower($tmpfile->extensionName);

				if($tmpfile->getSize()>1024*1024*2)
				{$errormsg='图片大小超过2M';}
				elseif ($ext!='jpg' && $ext!='gif')
				{$errormsg='上传的文件不是图片'.$tmpfile->getType();}
				else
				{
					//准备处理图片
					$directroy = Yii::app()->params['graph'].'/'.Yii::app()->user->wx_id.'/';
					if(!is_dir(dirname(Yii::app()->BasePath).$directroy)){
						mkdir(dirname(Yii::app()->BasePath).$directroy,0777,true);
					}
					$filename = date("YmdHis").rand(0,9);
					$rawfile = $directroy . 'raw' . $filename . '.' . $ext;

					$result=$tmpfile->saveAs(dirname(Yii::app()->BasePath).$rawfile);//保存到服务器
					if ($result==1)
					{$errormsg='保存成功';}
				}
			}
		}
		//图片处理完成

		$wxgraph=new Wxgraph();
		$wxgraph->wx_id=Yii::app()->user->wx_id;
		//$wxgraph->graph_group_id=$_POST['Graph[graph_group_id]'];
		$wxgraph->maintitle=$_POST['Graph']['maintitle'];
		$wxgraph->author=$_POST['Graph']['author'];
		if (isset($rawfile))
		{$wxgraph->graph_url=$rawfile;}

		if($wxgraph->save()){

		}
		else {$errormsg='失败';}
		$str = json_encode(
		array(
        	'graphgroup'=>array(  
            'errormsg' => $errormsg,
		//'file' => $uploadfile,
		//'small' => $small,
		//'thumb' => $thumb
		)
		)
		);
		echo $str;
	}

	public function actionVoice()
	{
		$model1 = WxPhotogroup::model()->findByPk(4);
		var_dump($model1);
		$wxPhotogroup = new WxPhotogroupDao();
		$model2 = $wxPhotogroup->getPhotogroup();
		var_dump($model2);
	}
}