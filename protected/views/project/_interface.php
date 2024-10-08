<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'project-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

<div class="box box-success">
<div class="box-header with-border">
	<h3 class="box-title"><?php echo Language::$interface; ?></h3>
</div>

<div class="form">
<div class="box-body">
	<p class="note"><?php echo Language::$requiredFields; ?></p>
	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<label><?php echo Language::$gameScreenFlow; ?></label>
		<?php echo $form->textArea($model,'screen_flow', array('class'=>'form-control textarea', 'placeholder'=>Language::$gameScreenFlowDesc)); ?>
		<?php echo $form->error($model,'screen_flow'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$gameHUD; ?></label>
		<?php echo $form->textArea($model,'HUD', array('class'=>'form-control textarea', 'placeholder'=>Language::$gameHUDDesc)); ?>
		<?php echo $form->error($model,'HUD'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$gameRendering; ?></label>
		<?php echo $form->textArea($model,'rendering', array('class'=>'form-control textarea', 'placeholder'=>Language::$gameRenderingDesc)); ?>
		<?php echo $form->error($model,'rendering'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$gameCamera; ?></label>
		<?php echo $form->textArea($model,'camera', array('class'=>'form-control textarea', 'placeholder'=>Language::$gameCameraDesc)); ?>
		<?php echo $form->error($model,'camera'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$gameLighting; ?></label>
		<?php echo $form->textArea($model,'lighting', array('class'=>'form-control textarea', 'placeholder'=>Language::$gameLightingDesc)); ?>
		<?php echo $form->error($model,'lighting'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$gameControls; ?></label>
		<?php echo $form->textArea($model,'controls', array('class'=>'form-control textarea', 'placeholder'=>Language::$gameControlsDesc)); ?>
		<?php echo $form->error($model,'controls'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$gameHelp; ?></label>
		<?php echo $form->textArea($model,'help', array('class'=>'form-control textarea', 'placeholder'=>Language::$gameHelpDesc)); ?>
		<?php echo $form->error($model,'help'); ?>
	</div>
<?php
echo $this->renderPartial('_newsection', array(
	'sections'  => $sections,
	'model'  => $model,
	'form' => $form,
));

$this->endWidget();
?>