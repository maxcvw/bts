<?php
/* @var $this GpalbumController */
/* @var $data Wxgraphgroup */
?>

<div class="row">
<div class="col-xs-12"><h3><?php echo CHtml::encode($data->maintitle); ?></h3></div>
</div>
<div class="row">
<div class="col-xs-4">
<a href="./index.php?r=gpalbum/photoview&photo_group_id=<?php echo CHtml::encode($data->photo_group_id); ?>" class="thumbnail">
<img src="<?php echo Yii::app()->request->baseUrl; ?><?php echo CHtml::encode($data->photo_url); ?>">
</a>
</div>
<div class="col-xs-8"><small><?php echo CHtml::encode($data->content); ?></small></div>
</div>
<br>
<div class="row">
<div class="col-xs-2"><a href="./index.php?r=gpalbum/albumcover&photo_group_id=<?php echo CHtml::encode($data->photo_group_id); ?>"><small>更换相册封面</small></a></div>
<div class="col-xs-2"><a href="./index.php?r=gpalbum/photoadd&photo_group_id=<?php echo CHtml::encode($data->photo_group_id); ?>"><small>上传相片</small></a></div>
<div class="col-xs-2"><a href="./index.php?r=gpalbum/albumadd&photo_group_id=<?php echo CHtml::encode($data->photo_group_id); ?>"><small>编辑相册内容</small></a></div>
<div class="col-xs-2"><a href="./index.php?r=gpalbum/photoview&photo_group_id=<?php echo CHtml::encode($data->photo_group_id); ?>"><small>查看相片</small></a></div>
</div>
<div class="gp_line"></div>
