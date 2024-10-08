<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
));
$model->password = '';

$avatar = file_exists($_SERVER['DOCUMENT_ROOT'] . Yii::app()->request->baseUrl . '/files/' . Yii::app()->user->company . '/avatars/' . $model->id . '.png') ? URL . '/files/' . Yii::app()->user->company . '/avatars/' . $model->id . '.png' : URL . '/img/avatar.png';
?>

<div class="box box-success">
<div class="box-header with-border">
	<h3 class="box-title"><?php echo Language::$user; ?></h3>
</div>

<div class="form">
<div class="box-body">
	<a class="btn btn-danger" href="javascript:void(0);" onclick="javascript:introJs().start();" style="position: absolute; right: 10px;"><?php echo Language::$help; ?></a>
	<p class="note"><?php echo Language::$requiredFields; ?></p>

	<?php if ($model->hasErrors() != null){ ?>
		<div class="alert alert-danger">
			<?php echo $form->errorSummary($model); ?>
		</div>
	<?php } ?>
	

	<div class="form-group">
		<label><?php echo Language::$name; ?></label>
		<?php echo $form->textField($model,'name', array('class'=>'form-control', 'placeholder'=>Language::$nameDesc, 'autofocus'=>true)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="form-group <?php if ($model->hasErrors('email') != null) echo 'has-error'; ?>" data-step="1" data-intro="<?php echo Language::$userHelp1; ?>" data-position="left">
		<label><?php echo Language::$email; ?></label>
		<?php echo $form->textField($model,'email', array('class'=>'form-control', 'placeholder'=>Language::$email)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<?php if (!$model->isNewRecord){ ?>
		<div class="form-group <?php if ($model->hasErrors('password') != null) echo 'has-error'; ?>">
			<label><?php echo Language::$password; ?></label>
			<?php echo $form->passwordField($model,'password', array('class'=>'form-control', 'placeholder'=>Language::$password)); ?>
			<?php echo $form->error($model,'password'); ?>
		</div>
	<?php } ?>

	<div class="form-group">
		<label><?php echo Language::$location; ?></label>
		<?php echo $form->textField($model,'location', array('class'=>'form-control', 'placeholder'=>Language::$locationDesc)); ?>
		<?php echo $form->error($model,'location'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$timezone; ?></label>
		<?php echo $form->dropDownList($model,'timezone', Language::$timezones, array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'timezone'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$language; ?></label>
		<?php echo $form->dropDownList($model,'language', Language::$languages, array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'language'); ?>
	</div>

	<?php if (in_array('admin', Yii::app()->user->roles)){ ?>
	<div class="form-group <?php if ($model->hasErrors('roles') != null) echo 'has-error'; ?>" data-step="2" data-intro="<?php echo Language::$userHelp2; ?>" data-position="left">
		<label><?php echo Language::$rolesName; ?></label>
		<?php echo $form->dropDownList($model,'roles', Language::$roles,
			array(
				'class'=>'form-control',
				'multiple'=>'multiple',
			)); ?>
		<?php echo $form->error($model,'roles'); ?>
	</div>
	<?php } ?>

	<div class="form-group">
		<label><?php echo Language::$worktime; ?></label>
		<?php echo $form->textField($model,'worktime', array('class'=>'form-control', 'placeholder'=>Language::$hoursPerDay)); ?>
		<?php echo $form->error($model,'worktime'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$workdays; ?></label>
		<?php echo $form->dropDownList($model,'workdays', Language::$weekdays,
			array(
				'class'=>'form-control',
				'multiple'=>'multiple',
			)); ?>
		<?php echo $form->error($model,'workdays'); ?>
	</div>

	<div class="form-group <?php if ($model->hasErrors('salary') != null) echo 'has-error'; ?>">
		<label><?php echo Language::$salary; ?></label>
		<div class="input-group">
			<div class="input-group-addon">$</div>
			<?php echo $form->textField($model,'salary', array('class'=>'form-control', 'placeholder'=>Language::$perHour)); ?>
		</div>
		<?php echo $form->error($model,'salary'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$avatar; ?></label>
		<?php echo $form->fileField($model, 'avatar'); ?>
		<?php echo $form->error($model,'avatar'); ?>
		<br><img class="img-responsive img-circle" src="<?php echo $avatar; ?>" alt="No Uploaded Image">
	</div>

	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Language::$create : Language::$update, array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div></div></div>