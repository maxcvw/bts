<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<div class="page-header">
<h1><strong>登录</strong></h1>
</div>


<div class="row">
<div class="col-md-4">
<h3><strong>登录后可以？</strong></h3>
<p>分享的开源软件和IT技术心得</p>
<p>参与开源软件/新闻的讨论和评论</p>
<p>与技术人士进行讨论和交流</p>
<p>发布招聘信息、找工作</p>
</div>

  <div class="col-md-3">
  
  <h3><strong>请输入用户名密码</strong></h3>
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>


	<div class="form-group">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'username',array('class'=>'text-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'password',array('class'=>'text-danger')); ?>
		
	</div>

	<div class= "checkbox">
      <?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'rememberMe'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
	</div>


		<?php echo CHtml::submitButton('登录',array('class'=>'btn btn-primary')); ?>
		
<?php $this->endWidget(); ?>
</div><!-- form -->

</div>
  
  <div class="col-md-3 col-md-offset-2">


<p><a href="./index.php?r=site/register">立即注册</a></p>
<p>忘记密码</p>

</div>
</div>
