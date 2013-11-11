<?php
/* @var $this GpalbumController */
/* @var $data Wxphoto */
?>
<div class="row">
<div class="col-xs-2">
<a href="./index.php?r=gpalbum/photoedit&photo_id=<?php echo $data->photo_id; ?>">
<img src="<?php echo Yii::app()->request->baseUrl; ?><?php echo $data->thumb_url; ?>">
</a>
</div>
<div class="col-xs-10">
<h4><?php echo $data->maintitle; ?></h4>
<div style="height:60px;">
<?php if (strlen($data->content)>200)
{echo mb_substr($data->content,0,199,'utf-8').'....';}
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
<div class="col-xs-2">
<a href="./index.php?r=gpalbum/photoedit&photo_id=<?php echo $data->photo_id; ?>">
<small>更换相片</small></a>
</div>
<div class="col-xs-2">
<a href="./index.php?r=gpalbum/photoedit&photo_id=<?php echo $data->photo_id; ?>">
<small>修改相片描述</small></a>
</div>
</div>
<div class="gp_line"></div>

