<?php

class ImgTool {

	public $result;
	public $errormsg;
	public $raw_url;
	public $raw_size;
	public $photo_url;
	public $thumb_url;

	public function imgDeal($tmpfile){
		$this->errormsg='上传失败';
		//$tmpfile = CUploadedFile::getInstanceByName('albumcover');//读取图像上传域,并使用系统上传组件上传
		if(is_object($tmpfile) && get_class($tmpfile)==='CUploadedFile')
		{
			if ($tmpfile->getError()==1)
			{$this->errormsg='图片大小超过限制';}
			elseif ($tmpfile->getError()!=0)
			{$this->errormsg='上传错误';}
			else
			{
				$ext = strtolower($tmpfile->extensionName);

				if($tmpfile->getSize()>1024*1024*2)
				{$this->errormsg='图片大小超过2M';}
				elseif ($ext!='jpg' && $ext!='gif' && $ext!='png')
				{$this->errormsg='上传的文件不是图片'.$tmpfile->getType();}
				else
				{
					//准备处理图片
					$directroy = Yii::app()->params['photo'].'/'.Yii::app()->user->wx_id.'/';
					if(!is_dir(dirname(Yii::app()->BasePath).$directroy)){
						mkdir(dirname(Yii::app()->BasePath).$directroy,0777,true);
					}
					$filename = date("YmdHis").rand(0,999);
					$this->raw_url = $directroy . 'raw' . $filename . '.' . $ext;
					$this->raw_size = $tmpfile->getSize()/1024;

					$this->result=$tmpfile->saveAs(dirname(Yii::app()->BasePath).$this->raw_url);//保存到服务器

					//创建缩略图
					$thumb = Yii::app()->thumb;
					$thumb->image = dirname(Yii::app()->BasePath).$this->raw_url;
					$thumb->directory = dirname(Yii::app()->BasePath).$directroy;
					$thumb->mode = 1;
					$thumb->width = 120;
					$thumb->height = 120;
					$thumb->defaultName = 'thumb'. $filename;

					$thumb->createThumb();
					$this->thumb_url = $directroy . 'thumb' . $filename . '.' . $thumb->srcExt;
					$thumb->save();
					//创建photo
					$thumb->mode = 6;
					$thumb->width = 400;
					$thumb->defaultName = 'photo'. $filename;
					
					$thumb->createThumb();
					$this->photo_url = $directroy . 'photo' . $filename . '.' . $thumb->srcExt;
					$thumb->save();

					if ($this->result==1)
					{$this->errormsg='保存成功';}
				}
			}
		}
		//图片处理完成
		
	}

}