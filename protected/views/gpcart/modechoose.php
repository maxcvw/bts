<?php
$this->breadcrumbs=array(
	'群发图文消息',
);
?>
<div id="js_nav">js_cart_photo</div>
<div class="gp_doc_step">
<div class="row">
<div class="col-xs-3">
<div class="gp_doc_step_cur">
1 素材所在位置
</div>
</div>
</div>
</div>

<div class="gp_doc_step_content">
<div class="row">
<div class="col-xs-12">
<h4>图文消息</h4>
<div class="gp_line"></div>
<p>图文消息将会以如下形式通过微信公众账号发送给关注您的用户</p>
<br>
</div>
</div>
<div class="row">
<div class="col-xs-6">
<div class="thumbnail">
<img src="<?php echo Yii::app()->request->baseUrl; ?>/gp/img/hobbit.jpg">
<div class="caption">
<div class="gp_line_full"></div>
<div class="media">
  <span class="pull-right">
    <img class="media-object" src="<?php echo Yii::app()->request->baseUrl; ?>/gp/img/hobbit_thumb1.jpg">
  </span>
  <div class="media-body">
    <p>导演: 彼得·杰克逊</p>
  </div>
</div>
<br>
<div class="gp_line_full"></div>
<div class="media">
  <span class="pull-right">
    <img class="media-object" src="<?php echo Yii::app()->request->baseUrl; ?>/gp/img/hobbit_thumb2.jpg">
  </span>
  <div class="media-body">
    <p>主演: 马丁·弗瑞曼 / 伊恩·麦克莱恩 / 理查德·阿米蒂奇 / 本尼迪克特·康伯巴奇 / 艾丹·特纳 / 迪恩·奥戈曼 / 奥兰多·布鲁姆</p>
  </div>
</div>
      </div>
    </div>
</div>
<div class="col-xs-6">
<div class="list-group">
<div class="list-group-item active">请选择素材位置</div>
<a class="list-group-item" href="./index.php?r=gpcart/photomode">从相册中选择相片发送</a>
<a class="list-group-item" href="">从保存历史记录中选择素材发送</a>
<a class="list-group-item" href="">重新创建图文消息发送</a>
</div>
</div>
</div>
</div>