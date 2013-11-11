<?php

class GpuserController extends Controller
{
	public $layout='//layouts/gpwork';

	//	public function actions()
	//	{
	//	}

	/**
	 * Lists all models.
	 */
	public function actionList()
	{
		$dataProvider=new CActiveDataProvider('Wxacct', array(
    'criteria'=>array(
        'condition'=>'gp_user_id='.Yii::app()->user->gp_user_id,
        'order'=>'wx_id DESC',
		),
    'countCriteria'=>array(
        'condition'=>'gp_user_id='.Yii::app()->user->gp_user_id,
		),
    'pagination'=>array(
        'pageSize'=>20,
		),
		));
		$this->render('list',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function actionAdd()
	{
		$model=new Wxacct();

		if(isset($_POST['Wxacct']))
		{
			$model->attributes=$_POST['Wxacct'];
			$model->gp_user_id=Yii::app()->user->gp_user_id;
			$model->create_date=date("Y-m-d H:i:s");
			if($model->save())
			{
				$wxacctCurDao = new WxacctCurDao();
				$row_wxacctcur = $wxacctCurDao->findWxacctCur();
				if(isset($row_wxacctcur) && $row_wxacctcur){
				}
				else{
					$wxacctDao = new WxacctDao();
					$row = $wxacctDao->getWx();
					//var_dump($row);
					Yii::app()->user->setState('wx_id',$row['wx_id']);
					Yii::app()->user->setState('wx_acct',$row['wx_acct']);
					$wxacctCurDao->setWxacctCur($row['wx_id'], $row['wx_acct']);
				}
				$this->redirect(array('gpuser/list'));
			}
			//			else
			//			{
			//				echo "failure";
			//			}
		}
		$this->render('add',array('model'=>$model));
	}

	public function actionSetdefault() {
		$wx_id = $_GET['wx_id'];
		$wxacctDao = new WxacctDao();
		$row_wxacct = $wxacctDao->getWx($wx_id);
		$wxacctCurDao = new WxacctCurDao();
		$rowCount = $wxacctCurDao->updateWxacctCur($row_wxacct['wx_id'], $row_wxacct['wx_acct']);
		Yii::app()->user->setState('wx_id',$row_wxacct['wx_id']);
		Yii::app()->user->setState('wx_acct',$row_wxacct['wx_acct']);
		$this->render('success');
	}
}