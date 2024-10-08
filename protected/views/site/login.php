<div class="login-box">
  <div class="login-logo">
    <a href="<?php echo URL; ?>/"><b>GDD</b>Manager</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg"><?php echo Language::$signInDesc; ?></p>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<div class="form-group has-feedback">
		<?php echo $form->textField($model,'email',array('class'=>'form-control', 'placeholder'=>Language::$email)); ?>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="form-group has-feedback">
		<?php echo $form->passwordField($model,'password',array('class'=>'form-control', 'placeholder'=>Language::$password)); ?>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'rememberMe'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
	</div>

	<div class="form-group">
		<?php echo CHtml::submitButton(Language::$login,array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->

    <a href="<?php echo URL; ?>/site/recover"><?php echo Language::$forgotPassword; ?></a><br>
    <a href="<?php echo URL; ?>/site/register"><?php echo Language::$registerMember; ?></a>

  </div>
  <!-- /.login-box-body -->
</div>