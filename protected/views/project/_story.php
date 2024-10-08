<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'project-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

<div class="box box-success">
<div class="box-header with-border">
	<h3 class="box-title"><?php echo Language::$storyCharacters; ?></h3>
</div>

<div class="form">
<div class="box-body">
	<p class="note"><?php echo Language::$requiredFields; ?></p>
	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<label><?php echo Language::$gameBackstory; ?></label>
		<?php echo $form->textArea($model,'backstory', array('class'=>'form-control textarea', 'placeholder'=>Language::$gameBackstoryDesc)); ?>
		<?php echo $form->error($model,'backstory'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$gamePlot; ?></label>
		<?php echo $form->textArea($model,'plot', array('class'=>'form-control textarea', 'placeholder'=>Language::$gamePlotDesc)); ?>
		<?php echo $form->error($model,'plot'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$gameLicense; ?></label>
		<?php echo $form->textArea($model,'license', array('class'=>'form-control textarea', 'placeholder'=>Language::$gameLicenseDesc)); ?>
		<?php echo $form->error($model,'license'); ?>
	</div>
<?php
echo $this->renderPartial('_newsection', array(
	'sections'  => $sections,
	'model'  => $model,
	'form' => $form,
));

$this->endWidget();
?>