<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'component-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

<div class="box box-success">
<div class="box-header with-border">
	<h3 class="box-title"><?php echo Language::$softwareComponent; ?></h3>
</div>

<div class="form">
<div class="box-body">
	<a class="btn btn-danger" href="javascript:void(0);" onclick="javascript:introJs().start();" style="position: absolute; right: 10px;"><?php echo Language::$help; ?></a>
	<p class="note"><?php echo Language::$requiredFields; ?></p>
	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<label><?php echo Language::$name; ?></label>
		<?php echo $form->textField($model,'name', array('class'=>'form-control', 'placeholder'=>'', 'autofocus'=>true)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>
    	
	<div class="form-group" data-step="1" data-intro="<?php echo Language::$taskHelp1; ?>" data-position="left">
		<label><?php echo Language::$user; ?></label>
		<?php echo $form->dropDownList($model,'user_id', $users,
			array(
				'class'=>'form-control',
				'empty'=>'No assigned user',
			)); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>
	
	<div class="form-group" data-step="2" data-intro="<?php echo Language::$taskHelp2; ?>" data-position="left">
		<label><?php echo Language::$deadline; ?></label>
		<div class="input-group date">
			<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
			<?php echo $form->textField($model,'deadline', array('class'=>'form-control datepicker', 'placeholder'=>Language::$projectProductionDesc)); ?>
			<?php echo $form->error($model,'deadline'); ?>
		</div>
	</div>

	<div class="form-group">
	<h4><a data-toggle="collapse" data-parent="#accordion" href="#dependencies" aria-expanded="true" class="btn btn-success btn-block collapsed"><?php echo Language::$dependencies; ?></a></h4>
	<div id="dependencies" class="panel-collapse collapse" aria-expanded="true">
	<p><?php echo Language::$dependenciesDesc; ?></p>
	<div class="form-group">
		<label><?php echo Language::$softwareComponent; ?></label>
		<?php echo $form->dropDownList($model,'dependency_id', $components,
			array(
				'class'=>'form-control',
				'empty'=>Language::$noComponent,
			)); ?>
		<?php echo $form->error($model,'dependency_id'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$sounds; ?></label>
		<?php echo $form->dropDownList($model,'sounds', $sounds,
			array(
				'class'=>'form-control',
				'multiple'=>'multiple',
			)); ?>
		<?php echo $form->error($model,'sounds'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$graphics; ?></label>
		<?php echo $form->dropDownList($model,'graphics', $graphics,
			array(
				'class'=>'form-control',
				'multiple'=>'multiple',
			)); ?>
		<?php echo $form->error($model,'graphics'); ?>
	</div>
	</div>
	
	<h4><a data-toggle="collapse" data-parent="#accordion" href="#belongings" aria-expanded="true" class="btn btn-success btn-block collapsed"><?php echo Language::$belongings; ?></a></h4>
	<div id="belongings" class="panel-collapse collapse" aria-expanded="true" style="">
	<p><?php echo Language::$belongingsDesc; ?></p>
	<div class="form-group">
		<label><?php echo Language::$character; ?></label>
		<?php echo $form->dropDownList($model,'character_id', $characters,
			array(
				'class'=>'form-control',
				'empty'=>Language::$noCharacter,
			)); ?>
		<?php echo $form->error($model,'character_id'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$enviromentObject; ?></label>
		<?php echo $form->dropDownList($model,'enviroment_id', $enviroment,
			array(
				'class'=>'form-control',
				'empty'=>Language::$noObject,
			)); ?>
		<?php echo $form->error($model,'enviroment_id'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$screen; ?></label>
		<?php echo $form->dropDownList($model,'screen_id', $screens,
			array(
				'class'=>'form-control',
				'empty'=>Language::$noScreen,
			)); ?>
		<?php echo $form->error($model,'screen_id'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$level; ?></label>
		<?php echo $form->dropDownList($model,'level_id', $levels,
			array(
				'class'=>'form-control',
				'empty'=>Language::$noLevel,
			)); ?>
		<?php echo $form->error($model,'level_id'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$cutscene; ?></label>
		<?php echo $form->dropDownList($model,'cutscene_id', $cutscenes,
			array(
				'class'=>'form-control',
				'empty'=> Language::$noObject,
			)); ?>
		<?php echo $form->error($model,'cutscene_id'); ?>
	</div>
	</div>
	</div>

	<div class="form-group">
		<label><?php echo Language::$description; ?></label>
		<?php echo $form->textArea($model,'description', array('class'=>'form-control textarea', 'placeholder'=>Language::$SCRequirements)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="form-group" data-step="3" data-intro="<?php echo Language::$taskHelp3; ?>" data-position="left">
		<label><?php echo Language::$estimatedTime; ?></label>
		<?php echo $form->textField($model,'time_est', array('class'=>'form-control', 'placeholder'=>Language::$timeDesc)); ?>
		<?php echo $form->error($model,'time_est'); ?>
	</div>

	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Language::$create : Language::$update, array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div>
</div><!-- form -->