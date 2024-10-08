<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'enviroment-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

<div class="box box-success">
<div class="box-header with-border">
	<h3 class="box-title"><?php echo Language::$enviromentObject; ?></h3>
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
		<label><?php echo Language::$attributes; ?></label>
		<?php echo $form->textArea($model,'attributes_list', array('class'=>'form-control textarea', 'placeholder'=>Language::$EnvAttDesc)); ?>
		<?php echo $form->error($model,'attributes_list'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$characteristics; ?></label>
		<?php echo $form->textArea($model,'characteristics', array('class'=>'form-control textarea', 'placeholder'=>Language::$EnvCharDesc)); ?>
		<?php echo $form->error($model,'characteristics'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$relevance; ?></label>
		<?php echo $form->textArea($model,'relevance', array('class'=>'form-control textarea', 'placeholder'=>Language::$EnvRelevDesc)); ?>
		<?php echo $form->error($model,'relevance'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$relationship; ?></label>
		<?php echo $form->textArea($model,'relationship', array('class'=>'form-control textarea', 'placeholder'=>Language::$EnvRelatDesc)); ?>
		<?php echo $form->error($model,'relationship'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$statistics; ?></label>
		<?php echo $form->textArea($model,'statistics', array('class'=>'form-control textarea', 'placeholder'=>Language::$EnvStatDesc)); ?>
		<?php echo $form->error($model,'statistics'); ?>
	</div>

	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Language::$create : Language::$update, array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div>
</div><!-- form -->