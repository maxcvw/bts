<div class="panel panel-default">
  <div class="panel-heading">GP会员</div>
  <div class="panel-body">
	<p>
	<?php echo Yii::app()->user->name;?>,您好   
	<a href="./index.php?r=site/logout">退出</a>
	</p>
	<?php if(isset(Yii::app()->user->wx_acct)) { ?>
	<p>当前微信公众账号为<?php echo Yii::app()->user->wx_acct;?>,<a href="./index.php?r=gpuser/index">重新选择</a></p>
	<?php } else {?>
	<p>没有微信公众账号</p>
	<?php }?>
  </div>
<!-- List group -->
  <ul class="list-group">
    <li class="list-group-item"><a href="./index.php?r=gpuser/index">查看微信公众账号</a></li>
    <li class="list-group-item"><a href="./index.php?r=gpuser/add">托管微信公众账号</a></li>
    <li class="list-group-item"><a href="#">管理微信公众账号</a></li>
  </ul>
</div>