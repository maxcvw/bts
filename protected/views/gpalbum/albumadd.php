<?php
$this->breadcrumbs=array(
    '相册管理'=>array('gpalbum/list'),
	'编辑相册内容',
);
?>
<div id = "js_nav">js_album_add</div>
<div class="gp_doc_default">
<br><br>
<div class="row">
<div class="form-horizontal">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'add-form',
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
),
)); ?>
  <div class="form-group">
    <label for="maintitle" class="col-sm-2 control-label">相册名称</label>
    <div class="col-sm-6">
      <?php echo $form->textField($model,'maintitle',array('class'=>'form-control')); ?>
    </div>
  </div>
<div class="form-group">
    <label for="content" class="col-sm-2 control-label">相册描述</label>
    <div class="col-sm-6">
      <?php echo $form->textArea($model,'content',array('class'=>'form-control','row'=>'3')); ?>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-6">
      <button type="submit" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-ok"></i> 保存</button>
      <a href="./index.php?r=gpalbum/list" class="btn btn-warning btn-sm">
<i class="glyphicon glyphicon-ban-circle"></i>
返回相册列表</a>
      <br><br>
      <?php echo $form->errorSummary($model,'','',array('class'=>'alert alert-danger')); ?>
    </div>
  </div>
  
<?php $this->endWidget(); ?></div>

</div>
</div>
