<?php $form = $this->beginWidget('CActiveForm', array(
	'id'=>'project-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

<div class="box box-success">
<div class="box-header with-border">
	<h3 class="box-title"><?php echo Language::$technical; ?></h3>
</div>

<div class="form">
<div class="box-body">
	<p class="note"><?php echo Language::$requiredFields; ?></p>
	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<label><?php echo Language::$gameHardware; ?></label>
		<?php echo $form->textArea($model,'target_hardware', array('class'=>'form-control textarea', 'placeholder'=>Language::$gameHardwareDesc)); ?>
		<?php echo $form->error($model,'target_hardware'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$gameDevEnv; ?></label>
		<?php echo $form->textArea($model,'dev_enviroment', array('class'=>'form-control textarea', 'placeholder'=>Language::$gameDevEnvDesc)); ?>
		<?php echo $form->error($model,'dev_enviroment'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$gameDevStandards; ?></label>
		<?php echo $form->textArea($model,'dev_standards', array('class'=>'form-control textarea', 'placeholder'=>Language::$gameDevStandardsDesc)); ?>
		<?php echo $form->error($model,'dev_standards'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$gameEngine; ?></label>
		<?php echo $form->textArea($model,'engine', array('class'=>'form-control textarea', 'placeholder'=>Language::$gameEngineDesc)); ?>
		<?php echo $form->error($model,'engine'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$gameNetwork; ?></label>
		<?php echo $form->textArea($model,'network', array('class'=>'form-control textarea', 'placeholder'=>Language::$gameNetworkDesc)); ?>
			<?php echo $form->error($model,'network'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$codeConventions; ?></label>
		<?php echo $form->textArea($model,'conventions', array('class'=>'form-control textarea', 'placeholder'=>Language::$codeConventionsDesc)); ?>
		<?php echo $form->error($model,'conventions'); ?>
	</div>
<?php
echo $this->renderPartial('_newsection', array(
	'sections'  => $sections,
	'model'  => $model,
	'form' => $form,
));

$this->endWidget();
?>