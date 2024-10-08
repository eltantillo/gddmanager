<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'company-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
));

$avatar = file_exists($_SERVER['DOCUMENT_ROOT'] . Yii::app()->request->baseUrl . '/files/' . Yii::app()->user->company . '/avatars/company.png') ? URL . '/files/' . Yii::app()->user->company . '/avatars/company.png' : URL . '/img/cover.png';
?>

<div class="box box-success">
<div class="box-header with-border">
	<h3 class="box-title"><?php echo Language::$company; ?></h3>
</div>

<div class="form">
<div class="box-body">
	<p class="note"><?php echo Language::$requiredFields; ?></p>

	<?php if ($model->hasErrors() != null){ ?>
		<div class="alert alert-danger">
			<?php echo $form->errorSummary($model); ?>
		</div>
	<?php } ?>

	<div class="form-group">
		<label><?php echo Language::$companyName; ?></label>
		<?php echo $form->textField($model,'name', array('class'=>'form-control', 'placeholder'=>'', 'autofocus'=>true)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$slogan; ?></label>
		<?php echo $form->textField($model,'slogan', array('class'=>'form-control', 'placeholder'=>'')); ?>
		<?php echo $form->error($model,'slogan'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$email; ?></label>
		<?php echo $form->textField($model,'email', array('class'=>'form-control', 'placeholder'=>'')); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$address1; ?></label>
		<?php echo $form->textField($model,'address1', array('class'=>'form-control', 'placeholder'=>'')); ?>
		<?php echo $form->error($model,'address1'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$address2; ?></label>
		<?php echo $form->textField($model,'address2', array('class'=>'form-control', 'placeholder'=>'')); ?>
		<?php echo $form->error($model,'address2'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$city; ?></label>
		<?php echo $form->textField($model,'city', array('class'=>'form-control', 'placeholder'=>'')); ?>
		<?php echo $form->error($model,'city'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$state; ?></label>
		<?php echo $form->textField($model,'state', array('class'=>'form-control', 'placeholder'=>'')); ?>
		<?php echo $form->error($model,'state'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$country; ?></label>
		<?php echo $form->textField($model,'country', array('class'=>'form-control', 'placeholder'=>'')); ?>
		<?php echo $form->error($model,'country'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$zip; ?></label>
		<?php echo $form->textField($model,'zip', array('class'=>'form-control', 'placeholder'=>'')); ?>
		<?php echo $form->error($model,'zip'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$timezone; ?></label>
		<?php echo $form->dropDownList($model,'timezone', Language::$timezones, array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'timezone'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$website; ?></label>
		<?php echo $form->textField($model,'website', array('class'=>'form-control', 'placeholder'=>'')); ?>
		<?php echo $form->error($model,'website'); ?>
	</div>

	<div class="form-group <?php if ($model->hasErrors('phone') != null) echo 'has-error'; ?>">
		<label><?php echo Language::$phone; ?></label>
		<?php echo $form->textField($model,'phone', array('class'=>'form-control', 'placeholder'=>'')); ?>
		<?php echo $form->error($model,'phone'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$paypalEmail; ?></label>
		<?php echo $form->textField($model,'paypal_email', array('class'=>'form-control', 'placeholder'=>'')); ?>
		<?php echo $form->error($model,'paypal_email'); ?>
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

</div>
</div><!-- form -->