<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'project-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

<div class="box box-success">
<div class="box-header with-border">
	<h3 class="box-title"><?php echo Language::$gameplayMechanics; ?></h3>
</div>

<div class="form">
<div class="box-body">
	<p class="note"><?php echo Language::$requiredFields; ?></p>
	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<label><?php echo Language::$gameProgression; ?></label>
		<?php echo $form->textArea($model,'progression', array('class'=>'form-control textarea textarea', 'placeholder'=>Language::$gameProgressionDesc)); ?>
		<?php echo $form->error($model,'progression'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$gameObjectives; ?></label>
		<?php echo $form->textArea($model,'objectives', array('class'=>'form-control textarea', 'placeholder'=>Language::$gameObjectivesDesc)); ?>
		<?php echo $form->error($model,'objectives'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$gameFlow; ?></label>
		<?php echo $form->textArea($model,'flow', array('class'=>'form-control textarea', 'placeholder'=>Language::$gameFlowDesc)); ?>
		<?php echo $form->error($model,'flow'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$gamePhysics; ?></label>
		<?php echo $form->textArea($model,'physics', array('class'=>'form-control textarea', 'placeholder'=>Language::$gamePhysicsDesc)); ?>
		<?php echo $form->error($model,'physics'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$gameMove; ?></label>
		<?php echo $form->textArea($model,'movement', array('class'=>'form-control textarea', 'placeholder'=>Language::$gameMoveDesc)); ?>
		<?php echo $form->error($model,'movement'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$gameCombat; ?></label>
		<?php echo $form->textArea($model,'combat', array('class'=>'form-control textarea', 'placeholder'=>Language::$gameCombatDesc)); ?>
		<?php echo $form->error($model,'combat'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$gameEconomy; ?></label>
		<?php echo $form->textArea($model,'economy', array('class'=>'form-control textarea', 'placeholder'=>Language::$gameEconomyDesc)); ?>
		<?php echo $form->error($model,'economy'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$switchesButtons; ?></label>
		<?php echo $form->textArea($model,'switches', array('class'=>'form-control textarea', 'placeholder'=>Language::$switchesButtonsDesc)); ?>
		<?php echo $form->error($model,'switches'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$pickCarryDrop; ?></label>
		<?php echo $form->textArea($model,'pick', array('class'=>'form-control textarea', 'placeholder'=>Language::$pickCarryDropDesc)); ?>
		<?php echo $form->error($model,'pick'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$gameTalking; ?></label>
		<?php echo $form->textArea($model,'talk', array('class'=>'form-control textarea', 'placeholder'=>Language::$gameTalkingDesc)); ?>
		<?php echo $form->error($model,'talk'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$gameReading; ?></label>
		<?php echo $form->textArea($model,'read', array('class'=>'form-control textarea', 'placeholder'=>Language::$gameReadingDesc)); ?>
		<?php echo $form->error($model,'read'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$gameOptions; ?></label>
		<?php echo $form->textArea($model,'options', array('class'=>'form-control textarea', 'placeholder'=>Language::$gameOptionsDesc)); ?>
		<?php echo $form->error($model,'options'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$replaySave; ?></label>
		<?php echo $form->textArea($model,'save', array('class'=>'form-control textarea', 'placeholder'=>Language::$replaySaveDesc)); ?>
		<?php echo $form->error($model,'save'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$cheatsEasterEggs; ?></label>
		<?php echo $form->textArea($model,'cheats', array('class'=>'form-control textarea', 'placeholder'=>Language::$cheatsEasterEggsDesc)); ?>
		<?php echo $form->error($model,'cheats'); ?>
	</div>
<?php
echo $this->renderPartial('_newsection', array(
	'sections'  => $sections,
	'model'  => $model,
	'form' => $form,
));

$this->endWidget();
?>