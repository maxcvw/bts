<?php
/* @var $this GpuserController */
/* @var $data Wxacct */
?>

<div class="row">
	<div class="col-xs-4"><b><?php echo CHtml::encode($data->getAttributeLabel('wx_acct')); ?>:</b> <?php echo CHtml::encode($data->wx_acct); ?></div>
	</div>
	<br>	
<div class="row">
<div class="col-xs-2">
<?php echo CHtml::link(CHtml::submitButton('选择',array('class'=>'btn btn-primary btn-xs')), array('setdefault', 'wx_id'=>$data->wx_id)); ?>
</div>
</div>
<br>
<div class="row">
<div class="col-xs-12">
<small><?php echo CHtml::link(CHtml::encode('选择并开始配置微网站'), array('index', 'wx_id'=>$data->wx_id)); ?>
</small></div>
</div>
<div class="row">
<div class="col-xs-12">
<small><?php echo CHtml::link(CHtml::encode('选择并开始配置自定义回复'), array('index', 'wx_id'=>$data->wx_id)); ?>
</small></div>
</div>
<br>
<div class="gp_line"></div>
<br>


