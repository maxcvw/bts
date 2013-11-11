<!DOCTYPE html>
<html lang="zh-cn">
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
	href="<?php echo Yii::app()->request->baseUrl; ?>/gp/css/gp.css"
	rel="stylesheet">
<script src="<?php echo Yii::app()->request->baseUrl; ?>/gp/js/jquery.js"></script>
</head>

<body>

<div id = "top_nav">
<div class = "menu"><a href="./index.php">首页</a></div>
<div class = "menu"><a href="./index.php?r=gpuser/list">微信公众账号管理</a></div>
<div class = "menu"><a href="./index.php?r=gpuser/index">微网站</a></div>
<div class = "menu"><a href="./index.php?r=gpuser/index">自定义回复设置</a></div>
<div class = "menu"><a href="./index.php?r=gpuser/index">其他功能</a></div>
</div>
<div class="blank"></div>
<div class="gp_body_container">
<div class="container"><?php echo $content; ?></div>
</div>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/gp/js/bootstrap.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/gp/js/respond.min.js"></script>
</body>
</html>