<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'company_id'); ?>
		<?php echo $form->textField($model,'company_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textArea($model,'name',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'copyright'); ?>
		<?php echo $form->textArea($model,'copyright',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'version'); ?>
		<?php echo $form->textField($model,'version'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'changes'); ?>
		<?php echo $form->textArea($model,'changes',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date'); ?>
		<?php echo $form->textField($model,'date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'concept'); ?>
		<?php echo $form->textArea($model,'concept',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'features'); ?>
		<?php echo $form->textArea($model,'features',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'genre'); ?>
		<?php echo $form->textArea($model,'genre',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'audience'); ?>
		<?php echo $form->textArea($model,'audience',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'look'); ?>
		<?php echo $form->textArea($model,'look',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'progression'); ?>
		<?php echo $form->textArea($model,'progression',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'objectives'); ?>
		<?php echo $form->textArea($model,'objectives',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'flow'); ?>
		<?php echo $form->textArea($model,'flow',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'physics'); ?>
		<?php echo $form->textArea($model,'physics',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'movement'); ?>
		<?php echo $form->textArea($model,'movement',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'economy'); ?>
		<?php echo $form->textArea($model,'economy',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'combat'); ?>
		<?php echo $form->textArea($model,'combat',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'switches'); ?>
		<?php echo $form->textArea($model,'switches',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pick'); ?>
		<?php echo $form->textArea($model,'pick',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'talk'); ?>
		<?php echo $form->textArea($model,'talk',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'read'); ?>
		<?php echo $form->textArea($model,'read',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'options'); ?>
		<?php echo $form->textArea($model,'options',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'save'); ?>
		<?php echo $form->textArea($model,'save',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cheats'); ?>
		<?php echo $form->textArea($model,'cheats',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'backstory'); ?>
		<?php echo $form->textArea($model,'backstory',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'plot'); ?>
		<?php echo $form->textArea($model,'plot',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'license'); ?>
		<?php echo $form->textArea($model,'license',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'screen_flow'); ?>
		<?php echo $form->textArea($model,'screen_flow',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'HUD'); ?>
		<?php echo $form->textArea($model,'HUD',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rendering'); ?>
		<?php echo $form->textArea($model,'rendering',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'camera'); ?>
		<?php echo $form->textArea($model,'camera',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lighting'); ?>
		<?php echo $form->textArea($model,'lighting',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'controls'); ?>
		<?php echo $form->textArea($model,'controls',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'help'); ?>
		<?php echo $form->textArea($model,'help',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'projectcol'); ?>
		<?php echo $form->textField($model,'projectcol',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'target_hardware'); ?>
		<?php echo $form->textArea($model,'target_hardware',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dev_enviroment'); ?>
		<?php echo $form->textArea($model,'dev_enviroment',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dev_standards'); ?>
		<?php echo $form->textArea($model,'dev_standards',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'engine'); ?>
		<?php echo $form->textArea($model,'engine',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'network'); ?>
		<?php echo $form->textArea($model,'network',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'conventions'); ?>
		<?php echo $form->textArea($model,'conventions',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'style'); ?>
		<?php echo $form->textArea($model,'style',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'budget'); ?>
		<?php echo $form->textField($model,'budget'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'monetization'); ?>
		<?php echo $form->textArea($model,'monetization',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'risks'); ?>
		<?php echo $form->textArea($model,'risks',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'marketing'); ?>
		<?php echo $form->textArea($model,'marketing',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'production_date'); ?>
		<?php echo $form->textField($model,'production_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'launch_date'); ?>
		<?php echo $form->textField($model,'launch_date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->