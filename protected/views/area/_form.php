<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'area-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

<div class="box box-success">
<div class="box-header with-border">
	<h3 class="box-title"><?php echo Language::$area; ?></h3>
</div>

<div class="form">
<div class="box-body">
	<p class="note"><?php echo Language::$requiredFields; ?></p>
	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<label><?php echo Language::$name; ?></label>
		<?php echo $form->textField($model,'name', array('class'=>'form-control', 'placeholder'=>'', 'autofocus'=>true)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$description; ?></label>
		<?php echo $form->textArea($model,'description', array('class'=>'form-control textarea', 'placeholder'=>Language::$areaDescDesc)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$characteristics; ?></label>
		<?php echo $form->textArea($model,'characteristics', array('class'=>'form-control textarea', 'placeholder'=>Language::$areaCharDesc)); ?>
		<?php echo $form->error($model,'characteristics'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$connections; ?></label>
		<?php echo $form->textArea($model,'connections', array('class'=>'form-control textarea', 'placeholder'=>Language::$connectionsDesc)); ?>
		<?php echo $form->error($model,'connections'); ?>
	</div>

	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Language::$create : Language::$update, array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div>
</div><!-- form -->