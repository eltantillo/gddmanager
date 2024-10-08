<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'resource-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

<div class="box box-success">
<div class="box-header with-border">
	<h3 class="box-title"><?php echo Language::$resource; ?></h3>
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
		<?php echo $form->textArea($model,'description', array('class'=>'form-control textarea', 'placeholder'=>Language::$resourceDesc)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$units; ?></label>
		<?php echo $form->textField($model,'units', array('class'=>'form-control', 'placeholder'=>Language::$unitsDesc)); ?>
		<?php echo $form->error($model,'units'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$cost; ?></label>
		<div class="input-group">
			<div class="input-group-addon"><?php echo Language::$currencySymbol[$project->currency]; ?></div>
			<?php echo $form->textField($model,'cost', array('class'=>'form-control', 'placeholder'=>Language::$costDesc)); ?>
		</div>
		<?php echo $form->error($model,'cost'); ?>
	</div>

	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Language::$create : Language::$update, array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div>
</div><!-- form -->