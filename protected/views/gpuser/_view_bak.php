<?php
/* @var $this GpuserController */
/* @var $data Wxacct */
?>

<div class="row">
	<div class="col-xs-4"><b><?php echo CHtml::encode($data->getAttributeLabel('wx_acct')); ?>:</b> <?php echo CHtml::encode($data->wx_acct); ?></div>
<div class="col-xs-4"><span class="label label-danger">未激活<?php echo CHtml::encode($data->status); ?></span></div>
	<div class="col-xs-4"><?php echo CHtml::encode($data->create_date); ?></div>
	</div>
	<br>
<div class="row"><div class="col-xs-12"><?php echo CHtml::encode($data->content); ?></div></div>
<br>	
<div class="row">
<div class="col-xs-2">
<?php echo CHtml::link(CHtml::submitButton('选择',array('class'=>'btn btn-primary btn-xs')), array('index', 'wx_id'=>$data->wx_id)); ?>
</div>
<div class="col-xs-2">
<?php echo CHtml::link(CHtml::encode('配置微网站'), array('index', 'wx_id'=>$data->wx_id)); ?>
</div>
<div class="col-xs-2">
<?php echo CHtml::link(CHtml::encode('自定义回复'), array('index', 'wx_id'=>$data->wx_id)); ?>
</div>
</div>
<br>
<div class="gp_line"></div>
<br>


