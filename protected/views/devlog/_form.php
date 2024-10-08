<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'devlog-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

<div class="box box-success">
<div class="box-header with-border">
	<h3 class="box-title"><?php echo Language::$devlog; ?></h3>
</div>

<div class="form">
<div class="box-body">
	<p class="note"><?php echo Language::$requiredFields; ?></p>
	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<label><?php echo Language::$name; ?></label>
		<?php echo $form->textField($model,'title', array('class'=>'form-control', 'placeholder'=>'', 'autofocus'=>true)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$attributes; ?></label>
		<?php echo $form->textArea($model,'content', array('class'=>'form-control textarea', 'placeholder'=>Language::$charAttDesc)); ?>
		<?php echo $form->error($model,'content'); ?>
	</div>

	<div class="form-group">
		<label>
			<?php echo $form->checkBox($model,'public'); ?>
			<?php echo Language::$publish; ?>
		</label>
		<?php echo $form->error($model,'public'); ?>
		<p><a href="<?php echo URL; ?>/site/devlogs/<?php echo $model->id; ?>" target="_blank"><?php echo URL; ?>/site/devlogs/<?php echo $model->id; ?></a></p>
	</div>

	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Language::$create : Language::$update, array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div>
</div><!-- form -->