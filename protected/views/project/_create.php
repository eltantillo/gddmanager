<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'project-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
));

$team = array();

foreach ($users as $user) {
	$team[$user->id] = $user->name;
}

?>

<div class="box box-success">
<div class="box-header with-border">
	<h3 class="box-title"><?php echo Language::$overview; ?></h3>
</div>

<div class="form">
<div class="box-body">
	<a class="btn btn-danger" href="javascript:void(0);" onclick="javascript:introJs().start();" style="position: absolute; right: 10px;"><?php echo Language::$help; ?></a>
	<p class="note"><?php echo Language::$requiredFields; ?></p>
	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<label><?php echo Language::$name; ?></label>
		<?php echo $form->textField($model,'name', array('class'=>'form-control', 'placeholder'=>'Name of the game project', 'autofocus'=>true)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="form-group" data-step="1" data-intro="<?php echo Language::$overviewHelp1; ?>" data-position="left">
		<?php echo $form->labelEx($model,'team'); ?>
		<?php echo $form->dropDownList($model,'team', $team,
			array(
				'class'=>'form-control',
				'multiple'=>'multiple',
			)); ?>
		<?php echo $form->error($model,'team'); ?>
	</div>

	<div class="form-group" data-step="2" data-intro="<?php echo Language::$overviewHelp2; ?>" data-position="left">
		<?php echo $form->labelEx($model,'leader_id'); ?>
		<?php echo $form->dropDownList($model,'leader_id',$team,array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'leader_id'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'copyright'); ?>
		<?php echo $form->textField($model,'copyright', array('class'=>'form-control', 'placeholder'=>'Copyright information')); ?>
		<?php echo $form->error($model,'copyright'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'concept'); ?>
		<?php echo $form->textArea($model,'concept', array('class'=>'form-control textarea', 'placeholder'=>'High level concept of the game')); ?>
		<?php echo $form->error($model,'concept'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'features'); ?>
		<?php echo $form->textArea($model,'features', array('class'=>'form-control textarea', 'placeholder'=>'Key features of the game')); ?>
		<?php echo $form->error($model,'features'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'genre'); ?>
		<?php echo $form->textField($model,'genre', array('class'=>'form-control', 'placeholder'=>'The game genre category')); ?>
		<?php echo $form->error($model,'genre'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'audience'); ?>
		<?php echo $form->textField($model,'audience', array('class'=>'form-control', 'placeholder'=>'Target audience')); ?>
		<?php echo $form->error($model,'audience'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'look'); ?>
		<?php echo $form->textArea($model,'look', array('class'=>'form-control textarea', 'placeholder'=>'General look and feel of the game')); ?>
		<?php echo $form->error($model,'look'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$currency; ?></label>
		<?php echo $form->dropDownList($model,'currency', Language::$currencies, array('class'=>'form-control', 'autofocus'=>true)); ?>
		<?php echo $form->error($model,'currency'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'cover'); ?>
		<?php echo $form->fileField($model, 'cover'); ?>
		<?php echo $form->error($model,'cover',array('class'=>'alert alert-danger')); ?>
		<br><img class="img-responsive" src="<?php echo URL . '/files/' . $model->company_id . '/' . $model->id . '/cover.png'; ?>" alt="No Uploaded Image">
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'banner'); ?>
		<?php echo $form->fileField($model, 'banner'); ?>
		<?php echo $form->error($model,'banner',array('class'=>'alert alert-danger')); ?>
		<br><img class="img-responsive" src="<?php echo URL . '/files/' . $model->company_id . '/' . $model->id . '/banner.png'; ?>" alt="No Uploaded Image">
	</div>

	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Language::$create : Language::$update, array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div></div></div>