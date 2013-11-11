<?php
?>
<div class="photomodemain">
<div class="row">
<div class="col-xs-3">
<img src="<?php echo Yii::app()->request->baseUrl; ?><?php echo $data->thumb_url; ?>">
</div>
<div class="col-xs-9">
<h4><?php if (strlen($data->maintitle)>30)
{echo mb_substr($data->maintitle,0,30,'utf-8').'....';}
else
{echo $data->maintitle;}
; ?></h4>
<div style="height:60px;">
<?php if (strlen($data->content)>80)
{echo mb_substr($data->content,0,80,'utf-8').'....';}
else
{echo $data->content;}
; ?>
</div>
<span class="text-danger"><?php echo str_replace(".00","",$data->price); ?> 
<?php echo $data->unit; ?></span>
</div>
</div>
<br>
<div class="row">
<div class="col-xs-3">
<button type="button" class="btn btn-success btn-xs photomode-add">添加到选择列表</button>
</div>
<div class="col-xs-3">
<button type="button" class="btn btn-primary btn-xs photomode-edit">修改相片描述</button>
</div>
<div class="col-xs-6">
<?php if(Yii::app()->user->hasFlash('photoupdate')):?>
<div>
<?php echo Yii::app()->user->getFlash('photoupdate'); ?>
</div>
<?php endif; ?>
</div>
</div>

<div id="<?php echo $data->photo_id; ?>" class="row">

</div>
<div class="gp_line"></div>
</div>