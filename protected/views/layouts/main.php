<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<!-- Le styles -->
<link
	href="<?php echo Yii::app()->request->baseUrl; ?>/gp/css/bootstrap.css"
	rel="stylesheet">
<link
	href="<?php echo Yii::app()->request->baseUrl; ?>/gp/css/layout.css"
	rel="stylesheet">
</head>

<body>

<div class="container">

<div class="navbar navbar-cln">
<div class="navbar-header"><a class="navbar-brand" href="#"> <img
	alt="Logo"
	src="<?php echo Yii::app()->request->baseUrl; ?>/gp/img/Logodark.png"></img>
</a></div>
<!-- Collect the nav links, forms, and other content for toggling -->

<div class="main-nav">
<ul class="nav navbar-nav">
	<li class="active"><a href="./index.php">首页</a></li>
	<li><a href="#">功能介绍</a></li>
	<li><a href="#">联系我们</a></li>
	<li class="dropdown"><a href="#" class="dropdown-toggle"
		data-toggle="dropdown">立即使用<b class="caret"></b></a>
	<ul class="dropdown-menu">
		<li><a href="#">Action</a></li>
		<li><a href="#">Another action</a></li>
		<li><a href="#">Something else here</a></li>
		<li class="divider"></li>
		<li><a href="#">Separated link</a></li>
		<li class="divider"></li>
		<li><a href="#">One more separated link</a></li>
	</ul>
	</li>
</ul>

<ul class="nav navbar-nav navbar-right">
<?php if(Yii::app()->user->getIsGuest()) { ?>
	<li><a href="./index.php?r=site/login"><small>登录</small></a></li>
	<li><a href="./index.php?r=site/register"><small>注册</small></a></li>
	<?php } else { ?>
	<li><a href="./index.php?r=gpuser/list"><small>
	<?php echo Yii::app()->user->name;?>
	</small></a></li>
	<li><a href="./index.php?r=site/logout"><small>退出</small></a></li>
	<?php }?>
</ul>
</div>
<!-- /.navbar-collapse --></div>

<div class="top-blank"></div>

</div>


<div class="container"><?php echo $content; ?></div>

<div class="footer">
<div class="container">
<div class="col-md-4">
<p><strong>网站导航</strong></p>
<p><a href="./index.php">首页</a></p>
<p><a href="./index.php">首页</a></p>
<a href="./index.php">首页</a>
<a href="./index.php">首页</a>
<a href="./index.php">首页</a>
</div>
<div class="col-md-4">
<p>关于</p>
</div>
<div class="col-md-4">
<p>文档</p>
</div>


</div>
</div>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/gp/js/bootstrap.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/gp/js/respond.min.js"></script>
</body>
</html>
