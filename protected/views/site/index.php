<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<div class = "text-center">
<h1>微信公众账号智能平台<i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1><br>
<p><strong>测试strong</strong><b>测试b</b><i>测试i</i><em>测试em</em></p>
<button type="button" class="btn btn-primary btn-lg">立即免费使用全部功能</button>
</div>
<div class="top-blank"></div>

<div class="row">
<div class="col-md-4">
<div class = "text-center">

<img src="<?php echo Yii::app()->request->baseUrl; ?>/gp/img/core-values.png"></img>
<h2>绑定微信公众账号</h2>
<p>微信公众账号分为订阅号和服务号</p>
<button type="button" class="btn btn-default">查看更多</button>
</div>
</div>
<div class="col-md-4">
<div class = "text-center">

<img src="<?php echo Yii::app()->request->baseUrl; ?>/gp/img/think-creative.png"></img>
<h2>个性化创建微网站</h2>
<p>84284737883487</p>
<button type="button" class="btn btn-default">查看更多</button>
</div>
</div>

<div class="col-md-4">
<div class = "text-center">

<img src="<?php echo Yii::app()->request->baseUrl; ?>/gp/img/responsive.png"></img>
<h2>自定义微信回复</h2>
<p>可根据微信用户的消息关键字智能回复图文等营销信息</p>
<button type="button" class="btn btn-default">查看更多</button>
</div>
</div>
</div>

<script src="<?php echo Yii::app()->request->baseUrl; ?>/gp/js/jquery.js"></script>