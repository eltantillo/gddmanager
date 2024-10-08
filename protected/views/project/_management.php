<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'project-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

<div class="box box-success">
<div class="box-header with-border">
	<h3 class="box-title"><?php echo Language::$management; ?></h3>
</div>

<div class="form">
<div class="box-body">
	<p class="note"><?php echo Language::$requiredFields; ?></p>
	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<label><?php echo Language::$currency; ?></label>
		<?php echo $form->dropDownList($model,'currency', Language::$currencies, array('class'=>'form-control', 'autofocus'=>true)); ?>
		<?php echo $form->error($model,'currency'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$projectBudget; ?></label>
		<div class="input-group">
			<div class="input-group-addon"><?php echo Language::$currencySymbol[$model->currency]; ?></div>
			<?php echo $form->textField($model,'budget', array('class'=>'form-control', 'placeholder'=>Language::$projectBudgetDesc)); ?>
		</div>
		<?php echo $form->error($model,'budget'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$price; ?></label>
		<div class="input-group">
			<div class="input-group-addon"><?php echo Language::$currencySymbol[$model->currency]; ?></div>
			<?php echo $form->textField($model,'price', array('class'=>'form-control', 'placeholder'=>Language::$priceDesc)); ?>
		</div>
		<?php echo $form->error($model,'price'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$projectMonetization; ?></label>
		<?php echo $form->textArea($model,'monetization', array('class'=>'form-control textarea', 'placeholder'=>Language::$projectMonetizationDesc)); ?>
		<?php echo $form->error($model,'monetization'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$projectRisks; ?></label>
		<?php echo $form->textArea($model,'risks', array('class'=>'form-control textarea', 'placeholder'=>Language::$projectRisksDesc)); ?>
		<?php echo $form->error($model,'risks'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$projectMarketing; ?></label>
		<?php echo $form->textArea($model,'marketing', array('class'=>'form-control textarea', 'placeholder'=>Language::$projectMarketingDesc)); ?>
		<?php echo $form->error($model,'marketing'); ?>
	</div>

	<div class="form-group col-md-4">
		<label><?php echo Language::$website; ?></label>
		<div class="input-group">
			<div class="input-group-addon"><i class="fa fa-globe"></i></div>
			<?php echo $form->urlField($model,'website', array('class'=>'form-control', 'placeholder'=>Language::$validURL)); ?>
		</div>
		<?php echo $form->error($model,'website'); ?>
	</div>

	<div class="form-group col-md-4">
		<label>Twitter</label>
		<div class="input-group">
			<div class="input-group-addon"><i class="fa fa-twitter"></i></div>
			<?php echo $form->urlField($model,'twitter', array('class'=>'form-control', 'placeholder'=>Language::$validURL)); ?>
		</div>
		<?php echo $form->error($model,'twitter'); ?>
	</div>

	<div class="form-group col-md-4">
		<label>Discord</label>
		<div class="input-group">
			<div class="input-group-addon"><i class="fa fa-discord"></i></div>
			<?php echo $form->urlField($model,'discord', array('class'=>'form-control', 'placeholder'=>Language::$validURL)); ?>
		</div>
		<?php echo $form->error($model,'discord'); ?>
	</div>

	<div class="form-group col-md-4">
		<label>Reddit</label>
		<div class="input-group">
			<div class="input-group-addon"><i class="fa fa-reddit"></i></div>
			<?php echo $form->urlField($model,'reddit', array('class'=>'form-control', 'placeholder'=>Language::$validURL)); ?>
		</div>
		<?php echo $form->error($model,'reddit'); ?>
	</div>

	<div class="form-group col-md-4">
		<label>Youtube</label>
		<div class="input-group">
			<div class="input-group-addon"><i class="fa fa-youtube"></i></div>
			<?php echo $form->urlField($model,'youtube', array('class'=>'form-control', 'placeholder'=>Language::$validURL)); ?>
		</div>
		<?php echo $form->error($model,'youtube'); ?>
	</div>

	<div class="form-group col-md-4">
		<label>Twitch</label>
		<div class="input-group">
			<div class="input-group-addon"><i class="fa fa-twitch"></i></div>
			<?php echo $form->urlField($model,'twitch', array('class'=>'form-control', 'placeholder'=>Language::$validURL)); ?>
		</div>
		<?php echo $form->error($model,'twitch'); ?>
	</div>

	<div class="form-group col-md-4">
		<label>Tumblr</label>
		<div class="input-group">
			<div class="input-group-addon"><i class="fa fa-tumblr"></i></div>
			<?php echo $form->urlField($model,'tumblr', array('class'=>'form-control', 'placeholder'=>Language::$validURL)); ?>
		</div>
		<?php echo $form->error($model,'tumblr'); ?>
	</div>

	<div class="form-group col-md-4">
		<label>Snapchat</label>
		<div class="input-group">
			<div class="input-group-addon"><i class="fa fa-snapchat"></i></div>
			<?php echo $form->urlField($model,'snapchat', array('class'=>'form-control', 'placeholder'=>Language::$validURL)); ?>
		</div>
		<?php echo $form->error($model,'snapchat'); ?>
	</div>

	<div class="form-group col-md-4">
		<label>Facebook</label>
		<div class="input-group">
			<div class="input-group-addon"><i class="fa fa-facebook"></i></div>
			<?php echo $form->urlField($model,'facebook', array('class'=>'form-control', 'placeholder'=>Language::$validURL)); ?>
		</div>
		<?php echo $form->error($model,'facebook'); ?>
	</div>

	<div class="form-group">
		<label><?php echo Language::$projectProduction; ?></label>
		<div class="input-group date">
			<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
			<?php echo $form->textField($model,'production_date', array('class'=>'form-control datepicker', 'placeholder'=>Language::$projectProductionDesc)); ?>
			<?php echo $form->error($model,'production_date'); ?>
		</div>
	</div>

	<div class="form-group">
		<label><?php echo Language::$projectRelease; ?></label>
		<div class="input-group date">
			<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
			<?php echo $form->textField($model,'launch_date', array('class'=>'form-control datepicker', 'placeholder'=>Language::$projectReleaseDesc)); ?>
			<?php echo $form->error($model,'launch_date'); ?>
		</div>
	</div>
<?php
echo $this->renderPartial('_newsection', array(
	'sections'  => $sections,
	'model'  => $model,
	'form' => $form,
));

$this->endWidget();
?>