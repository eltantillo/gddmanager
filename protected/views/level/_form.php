<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'level-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

<div class="box box-success">
<div class="box-header with-border">
	<h3 class="box-title"><?php echo Language::$level; ?></h3>
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
		<label><?php echo Language::$area; ?></label>
		<?php echo $form->dropDownList($model,'area_id', $areas,
			array(
				'class'=>'form-control'
			)); ?>
		<?php echo $form->error($model,'area_id'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$characters; ?></label>
		<?php echo $form->dropDownList($model,'characters', $characters,
			array(
				'class'=>'form-control',
				'multiple'=>'multiple',
			)); ?>
		<?php echo $form->error($model,'characters'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$enviromentObjects; ?></label>
		<?php echo $form->dropDownList($model,'enviroment', $enviroment,
			array(
				'class'=>'form-control',
				'multiple'=>'multiple',
			)); ?>
		<?php echo $form->error($model,'enviroment'); ?>
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
		<label><?php echo Language::$music; ?></label>
		<?php echo $form->dropDownList($model,'music', $music,
			array(
				'class'=>'form-control',
				'multiple'=>'multiple',
			)); ?>
		<?php echo $form->error($model,'music'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$cutscenes; ?></label>
		<?php echo $form->dropDownList($model,'cutscenes', $cutscenes,
			array(
				'class'=>'form-control',
				'multiple'=>'multiple',
			)); ?>
		<?php echo $form->error($model,'cutscenes'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$synopsis; ?></label>
		<?php echo $form->textArea($model,'synopsis', array('class'=>'form-control textarea', 'placeholder'=>Language::$synopsisDesc)); ?>
		<?php echo $form->error($model,'synopsis'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$introduction; ?></label>
		<?php echo $form->textArea($model,'introduction', array('class'=>'form-control textarea', 'placeholder'=>Language::$introductionDesc)); ?>
		<?php echo $form->error($model,'introduction'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$description; ?></label>
		<?php echo $form->textArea($model,'description', array('class'=>'form-control textarea', 'placeholder'=>Language::$levelDesc)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$gameObjectives; ?></label>
		<?php echo $form->textArea($model,'objectives', array('class'=>'form-control textarea', 'placeholder'=>Language::$levelObjDesc)); ?>
		<?php echo $form->error($model,'objectives'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$encounters; ?></label>
		<?php echo $form->textArea($model,'encounters', array('class'=>'form-control textarea', 'placeholder'=>Language::$encountersDesc)); ?>
		<?php echo $form->error($model,'encounters'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$path; ?></label>
		<?php echo $form->textArea($model,'path', array('class'=>'form-control textarea', 'placeholder'=>Language::$pathDesc)); ?>
		<?php echo $form->error($model,'path'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$walkthrough; ?></label>
		<?php echo $form->textArea($model,'walkthrough', array('class'=>'form-control textarea', 'placeholder'=>Language::$walkthroughDesc)); ?>
		<?php echo $form->error($model,'walkthrough'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$closing; ?></label>
		<?php echo $form->textArea($model,'closing', array('class'=>'form-control textarea', 'placeholder'=>Language::$closingDesc)); ?>
		<?php echo $form->error($model,'closing'); ?>
	</div>

	<!--div class="form-group">
		<label><?php echo Language::$design; ?></label>
		<?php echo $form->textArea($model,'design', array('class'=>'form-control textarea', 'placeholder'=>Language::$designDesc)); ?>
		<?php echo $form->error($model,'design'); ?>
	</div-->

	<!--div class="form-group">
		<label><?php echo Language::$design; ?></label>
		<?php echo $form->fileField($model, 'design'); ?>
		<?php echo $form->error($model,'design',array('class'=>'alert alert-danger')); ?>
		<?php $ext = explode('.', $model->design); ?>
		<br><img class="img-responsive" src="<?php echo URL . '/files/' . Yii::app()->user->company . '/' . $model->project_id . '/levels/' . $model->id . '.' . end($ext); ?>" alt="<?php echo Language::$noImage; ?>">
	</div-->

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