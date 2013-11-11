<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/gpmain'); ?>

<?php if(isset($this->breadcrumbs)):?>
<?php $this->widget('zii.widgets.CBreadcrumbs', array(
		    'homeLink'=>'<li>'.CHtml::link('首页',Yii::app()->homeUrl).'</li>',
		    'htmlOptions'=>array('class'=>'breadcrumb'),
		    'tagName'=>'ol',
            'activeLinkTemplate'=>'<li><a href="{url}">{label}</a></li>',
            'inactiveLinkTemplate'=>'<li class="active">{label}</li>',
            'separator'=>'',
			'links'=>$this->breadcrumbs,
)); ?>
	<!-- breadcrumbs -->
<?php endif?>

	<div class="row">
		<div class="col-md-9">
		<?php echo $content; ?>
		</div>
		<div class="col-md-3">
				<div class="gp_doc_gray">
					<p>
					<?php echo Yii::app()->user->name;?>
						, 您好 <a href="./index.php?r=site/logout">退出</a>
					</p>
					</div>
					<div class="gp_doc_gray">
					<?php if(isset(Yii::app()->user->wx_acct)) { ?>
					<p>
						当前微信公众账号为
						<?php echo Yii::app()->user->wx_acct;?>
						</p>
						<p><a href="./index.php?r=gpuser/list">重新选择</a>
					</p>
					<?php } else {?>
					<p>没有微信公众账号</p>
					<?php }?>
				</div>
			<div class="gp_doc_gray">
				<h4>
					<small><span class="glyphicon glyphicon-globe"></span></small> <b>微信公众账号</b>
				</h4>
				<div class="gp_line"></div>
				<ul class="nav nav-pills nav-stacked">
					<li id = "js_wx_list"><a href="./index.php?r=gpuser/list">查看微信公众账号</a>
					</li>
					<li id = "js_wx_add"><a href="./index.php?r=gpuser/add">托管微信公众账号</a></li>
					
					<li><a>管理微信公众账号</a></li>
				</ul>
				
				<div class="gp_line"></div>
				<h4>
					<small><span class="glyphicon glyphicon-picture"></span></small> <b>素材管理</b>
				</h4>
				<div class="gp_line"></div>
				<ul class="nav nav-pills nav-stacked">
					<li id = "js_mat_graph"><a href="./index.php?r=gpmat/graph">图文消息</a></li>
					<li id = "js_mat_voice"><a href="./index.php?r=gpmat/voice">语音消息</a></li>
					<li id = "js_mat_video"><a href="./index.php?r=gpmat/video">视频消息</a></li>
				</ul>
				<div class="gp_line"></div>
				<h4>
					<small><span class="glyphicon glyphicon-comment"></span></small> <b>自定义回复</b>
				</h4>
				<div class="gp_line"></div>
				<h4>
					<small><span class="glyphicon glyphicon-camera"></span></small> <b>相册</b>
				</h4>
                <div class="gp_line"></div>
				<ul class="nav nav-pills nav-stacked">
					<li id = "js_album_photo"><a href="./index.php?r=gpalbum/list">相册管理</a></li>
					<li id = "js_album_add"><a href="./index.php?r=gpalbum/albumadd">创建相册</a></li>
				</ul>
				<h4>
					<small><span class="glyphicon glyphicon-send"></span></small> <b>消息发送</b>
				</h4>
                <div class="gp_line"></div>
				<ul class="nav nav-pills nav-stacked">
					<li id = "js_cart_photo"><a href="./index.php?r=gpcart/modechoose">图文消息发送</a></li>
					<li id = "js_"><a href="./index.php?r=gpalbum/albumadd">未知</a></li>
				</ul>
			</div>
		</div>
	</div>
<!-- content -->
					<?php $this->endContent(); ?>
<script>
$(function(){
	js_nav_id=$('#js_nav').html();
	//$('#gp_right_nav').children('.active').removeClass('active');
	$('#'+js_nav_id).addClass('active');
});
</script>
