<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cutscene-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

<div class="box box-success">
<div class="box-header with-border">
	<h3 class="box-title"><?php echo Language::$cutscenes; ?></h3>
</div>

<div class="form">
<div class="box-body">
	<a class="btn btn-danger" href="javascript:void(0);" onclick="javascript:introJs().start();" style="position: absolute; right: 10px;"><?php echo Language::$help; ?></a>
	<p class="note"><?php echo Language::$requiredFields; ?></p>
	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<label><?php echo Language::$name; ?></label>
		<?php echo $form->textField($model,'description', array('class'=>'form-control', 'placeholder'=>'', 'autofocus'=>true)); ?>
		<?php echo $form->error($model,'description'); ?>
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
		<label><?php echo Language::$characters; ?></label>
		<?php echo $form->dropDownList($model,'actors', $actors,
			array(
				'class'=>'form-control',
				'multiple'=>'multiple',
			)); ?>
		<?php echo $form->error($model,'actors'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$enviromentObjects; ?></label>
		<?php echo $form->dropDownList($model,'enviroment', $enviroment,
			array(
				'class'=>'form-control',
				'multiple'=>'multiple',
			)); ?>
		<?php echo $form->error($model,'enviroment'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$graphics; ?></label>
		<?php echo $form->dropDownList($model,'graphics', $graphics,
			array(
				'class'=>'form-control',
				'multiple'=>'multiple',
			)); ?>
		<?php echo $form->error($model,'graphics'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$sounds; ?></label>
		<?php echo $form->dropDownList($model,'sounds', $sounds,
			array(
				'class'=>'form-control',
				'multiple'=>'multiple',
			)); ?>
		<?php echo $form->error($model,'sounds'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$music; ?></label>
		<?php echo $form->dropDownList($model,'music', $music,
			array(
				'class'=>'form-control',
				'multiple'=>'multiple',
			)); ?>
		<?php echo $form->error($model,'music'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$storyboard; ?></label>
		<?php echo $form->textArea($model,'storyboard', array('class'=>'form-control textarea', 'placeholder'=>Language::$storyboardDesc)); ?>
		<?php echo $form->error($model,'storyboard'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$script; ?></label>
		<?php echo $form->textArea($model,'script', array('class'=>'form-control textarea', 'placeholder'=>Language::$scriptDesc)); ?>
		<?php echo $form->error($model,'script'); ?>
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