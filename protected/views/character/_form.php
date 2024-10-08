<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'character-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

<div class="box box-success">
<div class="box-header with-border">
	<h3 class="box-title"><?php echo Language::$character; ?></h3>
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
		<?php echo $form->textArea($model,'attributes_list', array('class'=>'form-control textarea', 'placeholder'=>Language::$charAttDesc)); ?>
		<?php echo $form->error($model,'attributes_list'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$backstory; ?></label>
		<?php echo $form->textArea($model,'backstory', array('class'=>'form-control textarea', 'placeholder'=>Language::$charBSDesc)); ?>
		<?php echo $form->error($model,'backstory'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$personality; ?></label>
		<?php echo $form->textArea($model,'personality', array('class'=>'form-control textarea', 'placeholder'=>Language::$CharPersDesc)); ?>
		<?php echo $form->error($model,'personality'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$characteristics; ?></label>
		<?php echo $form->textArea($model,'characteristics', array('class'=>'form-control textarea', 'placeholder'=>Language::$CharCharDesc)); ?>
		<?php echo $form->error($model,'characteristics'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$abilities; ?></label>
		<?php echo $form->textArea($model,'abilities', array('class'=>'form-control textarea', 'placeholder'=>Language::$CharAbDesc)); ?>
		<?php echo $form->error($model,'abilities'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$relevance; ?></label>
		<?php echo $form->textArea($model,'relevance', array('class'=>'form-control textarea', 'placeholder'=>Language::$CharRelevDesc)); ?>
		<?php echo $form->error($model,'relevance'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$relationship; ?></label>
		<?php echo $form->textArea($model,'relationship', array('class'=>'form-control textarea', 'placeholder'=>Language::$CharRelatDesc)); ?>
		<?php echo $form->error($model,'relationship'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$statistics; ?></label>
		<?php echo $form->textArea($model,'statistics', array('class'=>'form-control textarea', 'placeholder'=>Language::$CharStatDesc)); ?>
		<?php echo $form->error($model,'statistics'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$AIType; ?></label>
		<?php echo $form->textArea($model,'ai_type', array('class'=>'form-control textarea', 'placeholder'=>Language::$CharAITypeDesc)); ?>
		<?php echo $form->error($model,'ai_type'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$AICollision; ?></label>
		<?php echo $form->textArea($model,'ai_collition', array('class'=>'form-control textarea', 'placeholder'=>Language::$CharAIColDesc)); ?>
		<?php echo $form->error($model,'ai_collition'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$AIPathfinding; ?></label>
		<?php echo $form->textArea($model,'ai_pathfinding', array('class'=>'form-control textarea', 'placeholder'=>Language::$CharAIPathDesc)); ?>
		<?php echo $form->error($model,'ai_pathfinding'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$stateMachine; ?></label>
		<?php echo CHtml::activeFileField($model, "state_machine"); ?>
		<?php echo $form->error($model,'state_machine',array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Language::$create : Language::$update, array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div>
</div><!-- form -->