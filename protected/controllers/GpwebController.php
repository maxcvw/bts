<?php

class GpwebController extends Controller
{
	public $layout='//layouts/gpwork';

	//	public function actions()
	//	{
	//	}
	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		
	}

	public function actionEditor()
	{
		
		$this->render('editor');
	}
	
	public function actionSetdefault() {
		$wx_id = $_GET['wx_id'];
		$wx_acct = Wxacct::model()->getWxacct($wx_id);
		$rowCount = WxacctCur::model()->updateWxacctCur($wx_acct);
		Yii::app()->user->setState('wx_acct',$wx_acct);
	    $this->render('success');
	}
}