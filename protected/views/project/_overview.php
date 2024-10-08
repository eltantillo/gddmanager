<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'project-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
));

$team = array();

foreach ($users as $user) {
	$team[$user->id] = $user->name;
}

$cover = file_exists($_SERVER['DOCUMENT_ROOT'] . Yii::app()->request->baseUrl . '/files/' . $model->company_id . '/' . $model->id . '/cover.png') ? URL . '/files/' . $model->company_id . '/' . $model->id . '/cover.png' : URL . '/img/cover.png';
$banner = file_exists($_SERVER['DOCUMENT_ROOT'] . Yii::app()->request->baseUrl . '/files/' . $model->company_id . '/' . $model->id . '/banner.png') ? URL . '/files/' . $model->company_id . '/' . $model->id . '/banner.png' : false;
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
		<label><?php echo Language::$projectName; ?></label>
		<?php echo $form->textField($model,'name', array('class'=>'form-control', 'placeholder'=>Language::$projectNameDesc, 'autofocus'=>true)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$version; ?></label>
		<?php echo $form->textField($model,'version', array('class'=>'form-control', 'placeholder'=>Language::$versionDesc)); ?>
		<?php echo $form->error($model,'version'); ?>
	</div>

	<div class="form-group" data-step="1" data-intro="<?php echo Language::$overviewHelp1; ?>" data-position="left">
		<label><?php echo Language::$teamMembers; ?></label>
		<?php echo $form->dropDownList($model,'team', $team,
			array(
				'class'=>'form-control',
				'multiple'=>'multiple',
			)); ?>
		<?php echo $form->error($model,'team'); ?>
	</div>

	<div class="form-group" data-step="2" data-intro="<?php echo Language::$overviewHelp2; ?>" data-position="left">
		<label><?php echo Language::$projectLead; ?></label>
		<?php echo $form->dropDownList($model,'leader_id',$team, array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'leader_id'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$gameCopyright; ?></label>
		<?php echo $form->textField($model,'copyright', array('class'=>'form-control', 'placeholder'=>Language::$gameCopyrightDesc)); ?>
		<?php echo $form->error($model,'copyright'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$gameConcept; ?></label>
		<?php echo $form->textArea($model,'concept', array('class'=>'form-control textarea', 'placeholder'=>Language::$gameConceptDesc)); ?>
		<?php echo $form->error($model,'concept'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$gameFeatures; ?></label>
		<?php echo $form->textArea($model,'features', array('class'=>'form-control textarea', 'placeholder'=>Language::$gameFeaturesDesc)); ?>
		<?php echo $form->error($model,'features'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$gameGenre; ?></label>
		<?php echo $form->textField($model,'genre', array('class'=>'form-control', 'placeholder'=>Language::$gameGenreDesc)); ?>
		<?php echo $form->error($model,'genre'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$gameAudience; ?></label>
		<?php echo $form->textField($model,'audience', array('class'=>'form-control', 'placeholder'=>Language::$gameAudienceDesc)); ?>
		<?php echo $form->error($model,'audience'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$gameLookFeel; ?></label>
		<?php echo $form->textArea($model,'look', array('class'=>'form-control textarea', 'placeholder'=>Language::$gameLookFeelDesc)); ?>
		<?php echo $form->error($model,'look'); ?>
	</div>

	<div class="form-group">
		<label>
			<?php echo $form->checkBox($model,'public'); ?>
			<?php echo Language::$publicDocument; ?>
		</label>
		<?php echo $form->error($model,'public'); ?>
		<p><a href="<?php echo URL; ?>/documents/<?php echo $model->id; ?>"><?php echo URL; ?>/documents/<?php echo $model->id; ?></a></p>
	</div>

	<div class="form-group">
		<label><?php echo Language::$cover; ?></label>
		<?php echo $form->fileField($model, 'cover'); ?>
		<?php echo $form->error($model,'cover',array('class'=>'alert alert-danger')); ?>
		<br><img class="img-responsive img-circle" src="<?php echo $cover; ?>" alt="<?php echo Language::$noImage; ?>">
	</div>

	<div class="form-group">
		<label><?php echo Language::$banner; ?></label>
		<?php echo $form->fileField($model, 'banner'); ?>
		<?php echo $form->error($model,'banner',array('class'=>'alert alert-danger')); ?>
		<?php if ($banner) { ?>
			<br><img class="img-responsive" src="<?php echo $banner; ?>" alt="<?php echo Language::$noImage; ?>">
		<?php } ?>
	</div>
<?php
echo $this->renderPartial('_newsection', array(
	'sections'  => $sections,
	'model'  => $model,
	'form' => $form,
));

$this->endWidget();
?>