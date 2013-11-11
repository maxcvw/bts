<?php
?>


<div class="row">
<div class="col-md-4">
<h3><strong>注册后可以？</strong></h3>
<p>111111111</p>
<p>222222222222</p>
<p>与技术人士进行讨论和交流</p>
<p>发布招聘信息、找工作</p>
</div>

<div class="col-md-3">

<h3><strong>请输入用户名密码</strong></h3>
<div class="form"><?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'register-form',
    'enableAjaxValidation'=>true,
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
),
)); ?>

<div class="form-group"><?php echo $form->labelEx($gp_user_model,'username'); ?>
<?php echo $form->textField($gp_user_model,'username',array('class'=>'form-control')); ?>
<?php echo $form->error($gp_user_model,'username',array('class'=>'text-danger')); ?>
</div>

<div class="form-group"><?php echo $form->labelEx($gp_user_model,'password'); ?>
<?php echo $form->passwordField($gp_user_model,'password',array('class'=>'form-control')); ?>
<?php echo $form->error($gp_user_model,'password',array('class'=>'text-danger')); ?>
</div>

<div class="form-group"><?php echo $form->labelEx($gp_user_model,'password2'); ?>
<?php echo $form->passwordField($gp_user_model,'password2',array('class'=>'form-control')); ?>
<?php echo $form->error($gp_user_model,'password2',array('class'=>'text-danger')); ?>
</div>

<div class="form-group"><?php echo $form->labelEx($gp_user_model,'email'); ?>
<?php echo $form->textField($gp_user_model,'email',array('class'=>'form-control')); ?>
<?php echo $form->error($gp_user_model,'email',array('class'=>'text-danger')); ?>
</div>

<?php echo CHtml::submitButton('注册',array('class'=>'btn btn-primary')); ?>



<?php $this->endWidget(); ?></div>
<!-- form --></div>
<div class="col-md-3 col-md-offset-2">


<p><a href="./index.php?r=site/login">已有账号立即登录</a></p>
<p>忘记密码</p>

</div>
</div>
