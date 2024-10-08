<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sound-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

<div class="box box-success">
<div class="box-header with-border">
	<h3 class="box-title"><?php echo Language::$sound; ?></h3>
</div>

<div class="form">
<div class="box-body">
	<a class="btn btn-danger" href="javascript:void(0);" onclick="javascript:introJs().start();" style="position: absolute; right: 10px;"><?php echo Language::$help; ?></a>
	<p class="note"><?php echo Language::$requiredFields; ?></p>
	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<label><?php echo Language::$name; ?></label>
		<?php echo $form->textField($model,'name', array('class'=>'form-control', 'placeholder'=>'', 'autofocus'=>true)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>
	
	<div class="form-group" data-step="1" data-intro="<?php echo Language::$taskHelp1; ?>" data-position="left">
		<label><?php echo Language::$user; ?></label>
		<?php echo $form->dropDownList($model,'user_id', $users,
			array(
				'class'=>'form-control',
				'empty'=>'No assigned user',
			)); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>
	
	<div class="form-group" data-step="2" data-intro="<?php echo Language::$taskHelp2; ?>" data-position="left">
		<label><?php echo Language::$deadline; ?></label>
		<div class="input-group date">
			<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
			<?php echo $form->textField($model,'deadline', array('class'=>'form-control datepicker', 'placeholder'=>Language::$projectProductionDesc)); ?>
			<?php echo $form->error($model,'deadline'); ?>
		</div>
	</div>

	<div class="form-group">
		<label><?php echo Language::$description; ?></label>
		<?php echo $form->textArea($model,'description', array('class'=>'form-control textarea', 'placeholder'=>Language::$soundDesc)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="form-group" data-step="3" data-intro="<?php echo Language::$taskHelp3; ?>" data-position="left">
		<label><?php echo Language::$estimatedTime; ?></label>
		<?php echo $form->textField($model,'time_est', array('class'=>'form-control', 'placeholder'=>Language::$timeDesc)); ?>
		<?php echo $form->error($model,'time_est'); ?>
	</div>

	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Language::$create : Language::$update, array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div>
</div><!-- form -->