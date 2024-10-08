<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'project-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

<div class="box box-success">
<div class="box-header with-border">
	<h3 class="box-title"><?php echo Language::$areasLevels; ?></h3>
</div>

<div class="form">
<div class="box-body">
	<p class="note"><?php echo Language::$requiredFields; ?></p>
	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<label><?php echo Language::$gameLookFeel; ?></label>
		<?php echo $form->textArea($model,'look', array('class'=>'form-control textarea', 'placeholder'=>Language::$gameLookFeelDesc)); ?>
		<?php echo $form->error($model,'look'); ?>
	</div>
<?php
echo $this->renderPartial('_newsection', array(
	'sections'  => $sections,
	'model'  => $model,
	'form' => $form,
));

$this->endWidget();
?>