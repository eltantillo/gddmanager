<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'project-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

<div class="box box-success">
<div class="box-header with-border">
	<h3 class="box-title"><?php echo Language::$overview; ?></h3>
</div>

<div class="form">
<div class="box-body">
	<p class="note"><?php echo Language::$requiredFields; ?></p>
	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<label><?php echo Language::$name; ?></label>
		<?php echo $form->textField($model,'name', array('class'=>'form-control', 'placeholder'=>'Email', 'autofocus'=>true)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'cover'); ?>
		<?php echo $form->fileField($model, 'cover'); ?>
		<?php echo $form->error($model,'cover',array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'banner'); ?>
		<?php echo $form->fileField($model, 'banner'); ?>
		<?php echo $form->error($model,'banner',array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'team'); ?>
		<?php echo $form->textField($model,'team', array('class'=>'form-control', 'placeholder'=>'Email')); ?>
		<?php echo $form->error($model,'team'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'copyright'); ?>
		<?php echo $form->textArea($model,'copyright', array('class'=>'form-control', 'placeholder'=>'Email')); ?>
		<?php echo $form->error($model,'copyright'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'version'); ?>
		<?php echo $form->textField($model,'version', array('class'=>'form-control', 'placeholder'=>'Email')); ?>
		<?php echo $form->error($model,'version'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'changes'); ?>
		<?php echo $form->textField($model,'changes', array('class'=>'form-control', 'placeholder'=>'Email')); ?>
		<?php echo $form->error($model,'changes'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'date'); ?>
		<?php echo $form->textField($model,'date', array('class'=>'form-control', 'placeholder'=>'Email')); ?>
		<?php echo $form->error($model,'date'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'concept'); ?>
		<?php echo $form->textField($model,'concept', array('class'=>'form-control', 'placeholder'=>'Email')); ?>
		<?php echo $form->error($model,'concept'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'features'); ?>
		<?php echo $form->textField($model,'features', array('class'=>'form-control', 'placeholder'=>'Email')); ?>
		<?php echo $form->error($model,'features'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'genre'); ?>
		<?php echo $form->textField($model,'genre', array('class'=>'form-control', 'placeholder'=>'Email')); ?>
		<?php echo $form->error($model,'genre'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'audience'); ?>
		<?php echo $form->textField($model,'audience', array('class'=>'form-control', 'placeholder'=>'Email')); ?>
		<?php echo $form->error($model,'audience'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'look'); ?>
		<?php echo $form->textField($model,'look', array('class'=>'form-control', 'placeholder'=>'Email')); ?>
		<?php echo $form->error($model,'look'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'progression'); ?>
		<?php echo $form->textField($model,'progression', array('class'=>'form-control', 'placeholder'=>'Email')); ?>
		<?php echo $form->error($model,'progression'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'objectives'); ?>
		<?php echo $form->textField($model,'objectives', array('class'=>'form-control', 'placeholder'=>'Email')); ?>
		<?php echo $form->error($model,'objectives'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'flow'); ?>
		<?php echo $form->textField($model,'flow', array('class'=>'form-control', 'placeholder'=>'Email')); ?>
		<?php echo $form->error($model,'flow'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'physics'); ?>
		<?php echo $form->textField($model,'physics', array('class'=>'form-control', 'placeholder'=>'Email')); ?>
		<?php echo $form->error($model,'physics'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'movement'); ?>
		<?php echo $form->textField($model,'movement', array('class'=>'form-control', 'placeholder'=>'Email')); ?>
		<?php echo $form->error($model,'movement'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'economy'); ?>
		<?php echo $form->textField($model,'economy', array('class'=>'form-control', 'placeholder'=>'Email')); ?>
		<?php echo $form->error($model,'economy'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'combat'); ?>
		<?php echo $form->textField($model,'combat', array('class'=>'form-control', 'placeholder'=>'Email')); ?>
		<?php echo $form->error($model,'combat'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'switches'); ?>
		<?php echo $form->textField($model,'switches', array('class'=>'form-control', 'placeholder'=>'Email')); ?>
		<?php echo $form->error($model,'switches'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'pick'); ?>
		<?php echo $form->textField($model,'pick', array('class'=>'form-control', 'placeholder'=>'Email')); ?>
		<?php echo $form->error($model,'pick'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'talk'); ?>
		<?php echo $form->textField($model,'talk', array('class'=>'form-control', 'placeholder'=>'Email')); ?>
		<?php echo $form->error($model,'talk'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'read'); ?>
		<?php echo $form->textField($model,'read', array('class'=>'form-control', 'placeholder'=>'Email')); ?>
		<?php echo $form->error($model,'read'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'options'); ?>
		<?php echo $form->textField($model,'options', array('class'=>'form-control', 'placeholder'=>'Email')); ?>
		<?php echo $form->error($model,'options'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'save'); ?>
		<?php echo $form->textField($model,'save', array('class'=>'form-control', 'placeholder'=>'Email')); ?>
		<?php echo $form->error($model,'save'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'cheats'); ?>
		<?php echo $form->textField($model,'cheats', array('class'=>'form-control', 'placeholder'=>'Email')); ?>
		<?php echo $form->error($model,'cheats'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'backstory'); ?>
		<?php echo $form->textField($model,'backstory', array('class'=>'form-control', 'placeholder'=>'Email')); ?>
		<?php echo $form->error($model,'backstory'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'plot'); ?>
		<?php echo $form->textField($model,'plot', array('class'=>'form-control', 'placeholder'=>'Email')); ?>
		<?php echo $form->error($model,'plot'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'license'); ?>
		<?php echo $form->textField($model,'license', array('class'=>'form-control', 'placeholder'=>'Email')); ?>
		<?php echo $form->error($model,'license'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'screen_flow'); ?>
		<?php echo $form->textField($model,'screen_flow', array('class'=>'form-control', 'placeholder'=>'Email')); ?>
		<?php echo $form->error($model,'screen_flow'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'HUD'); ?>
		<?php echo $form->textField($model,'HUD', array('class'=>'form-control', 'placeholder'=>'Email')); ?>
		<?php echo $form->error($model,'HUD'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'rendering'); ?>
		<?php echo $form->textField($model,'rendering', array('class'=>'form-control', 'placeholder'=>'Email')); ?>
		<?php echo $form->error($model,'rendering'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'camera'); ?>
		<?php echo $form->textField($model,'camera', array('class'=>'form-control', 'placeholder'=>'Email')); ?>
		<?php echo $form->error($model,'camera'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'lighting'); ?>
		<?php echo $form->textField($model,'lighting', array('class'=>'form-control', 'placeholder'=>'Email')); ?>
		<?php echo $form->error($model,'lighting'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'controls'); ?>
		<?php echo $form->textField($model,'controls', array('class'=>'form-control', 'placeholder'=>'Email')); ?>
		<?php echo $form->error($model,'controls'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'help'); ?>
		<?php echo $form->textField($model,'help', array('class'=>'form-control', 'placeholder'=>'Email')); ?>
		<?php echo $form->error($model,'help'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'target_hardware'); ?>
		<?php echo $form->textField($model,'target_hardware', array('class'=>'form-control', 'placeholder'=>'Email')); ?>
		<?php echo $form->error($model,'target_hardware'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'dev_enviroment'); ?>
		<?php echo $form->textField($model,'dev_enviroment', array('class'=>'form-control', 'placeholder'=>'Email')); ?>
		<?php echo $form->error($model,'dev_enviroment'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'dev_standards'); ?>
		<?php echo $form->textField($model,'dev_standards', array('class'=>'form-control', 'placeholder'=>'Email')); ?>
		<?php echo $form->error($model,'dev_standards'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'engine'); ?>
		<?php echo $form->textField($model,'engine', array('class'=>'form-control', 'placeholder'=>'Email')); ?>
		<?php echo $form->error($model,'engine'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'network'); ?>
		<?php echo $form->textField($model,'network', array('class'=>'form-control', 'placeholder'=>'Email')); ?>
		<?php echo $form->error($model,'network'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'conventions'); ?>
		<?php echo $form->textField($model,'conventions', array('class'=>'form-control', 'placeholder'=>'Email')); ?>
		<?php echo $form->error($model,'conventions'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'style'); ?>
		<?php echo $form->textField($model,'style', array('class'=>'form-control', 'placeholder'=>'Email')); ?>
		<?php echo $form->error($model,'style'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'budget'); ?>
		<?php echo $form->textField($model,'budget', array('class'=>'form-control', 'placeholder'=>'Email')); ?>
		<?php echo $form->error($model,'budget'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'monetization'); ?>
		<?php echo $form->textField($model,'monetization', array('class'=>'form-control', 'placeholder'=>'Email')); ?>
		<?php echo $form->error($model,'monetization'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'risks'); ?>
		<?php echo $form->textField($model,'risks', array('class'=>'form-control', 'placeholder'=>'Email')); ?>
		<?php echo $form->error($model,'risks'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'marketing'); ?>
		<?php echo $form->textField($model,'marketing', array('class'=>'form-control', 'placeholder'=>'Email')); ?>
		<?php echo $form->error($model,'marketing'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'production_date'); ?>
		<?php echo $form->textField($model,'production_date', array('class'=>'form-control', 'placeholder'=>'Email')); ?>
		<?php echo $form->error($model,'production_date'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'launch_date'); ?>
		<?php echo $form->textField($model,'launch_date', array('class'=>'form-control', 'placeholder'=>'Email')); ?>
		<?php echo $form->error($model,'launch_date'); ?>
	</div>

	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Language::$create : Language::$update, array('class'=>'btn btn-primary')); ?>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>