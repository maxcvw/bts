<?php
$this->breadcrumbs=array(
    '微信公众账号'=>array('gpuser/list'),
	'托管微信公众账号',
);
?>
<div id = "js_nav">js_wx_add</div>
<div class="row">
<div class="col-md-12">
<h3><strong>微信公众账号</strong></h3>
</div></div>

<div class="gp_doc_container">
<div class="row well">
<div class="col-md-6">
<div class="form"><?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'add-form',
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
),
)); ?>

<div class="form-group"><?php echo $form->labelEx($model,'wx_acct'); ?>
<?php echo $form->textField($model,'wx_acct',array('class'=>'form-control')); ?>
</div>

<div class="form-group"><?php echo $form->labelEx($model,'wx_acct_pw'); ?>
<?php echo $form->passwordField($model,'wx_acct_pw',array('class'=>'form-control')); ?>
</div>
<?php echo CHtml::submitButton('确定',array('class'=>'btn btn-primary')); ?>
<br><br>
<?php echo $form->errorSummary($model,'','',array('class'=>'alert alert-danger')); ?>
<?php $this->endWidget(); ?></div>
<!-- form -->
</div>
</div>
</div>
