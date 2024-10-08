<div class="login-box">
  <div class="login-logo">
    <a href="<?php echo URL; ?>/"><b>GDD</b>Manager</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg"><?php echo Language::$registerCompany; ?></p>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'register-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><?php echo Language::$requiredFields; ?></p>

	<?php echo $form->errorSummary($company); ?>
	<?php echo $form->errorSummary($user); ?>

	<div class="form-group has-feedback">
		<?php echo $form->textField($company,'name',array('class'=>'form-control', 'placeholder'=>Language::$companyName)); ?>
		<?php echo $form->error($company,'name'); ?>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
	</div>

	<div class="form-group has-feedback">
		<?php echo $form->textField($user,'email',array('class'=>'form-control', 'placeholder'=>Language::$email)); ?>
		<?php echo $form->error($user,'email'); ?>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
	</div>

	<div class="form-group has-feedback">
		<?php echo $form->passwordField($user,'password',array('class'=>'form-control', 'placeholder'=>Language::$password)); ?>
		<?php echo $form->error($user,'password'); ?>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
	</div>

	<div class="form-group has-feedback">
		<?php echo $form->passwordField($user,'password2',array('class'=>'form-control', 'placeholder'=>Language::$repeatPassword)); ?>
		<?php echo $form->error($user,'password2'); ?>
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
	</div>

	<div class="form-group">
		<?php echo CHtml::submitButton(Language::$register,array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

    <a href="<?php echo URL; ?>/site/login"><?php echo Language::$haveAccount; ?></a><br>

  </div>
  <!-- /.login-box-body -->
</div>