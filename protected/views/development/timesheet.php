<?php
echo $this->renderPartial('_menu'); $activities = false;
echo $this->renderPartial('_menu2', array('project'=>$project));
?>

<section class="content-header">
  <h1 class="hidden-xs"><?php echo Language::$development; ?> <small><?php echo Language::$timesheets; ?></small></h1>

  <ol class="breadcrumb">
    <li><a href="<?php echo URL;?>/"><i class="fa fa-dashboard"></i> <?php echo Language::$home; ?></a></li>
    <li><a href="<?php echo URL . '/development';?>"><?php echo Language::$development; ?></a></li>
    <li><a href="<?php echo URL . '/development/' . $project->id;?>"><?php echo $project->name; ?></a></li>
    <li><a href="<?php echo URL . '/development/' . $model->task  . '/' . $model->task_id;?>"><?php echo $task->name; ?></a></li>
    <li class="active"><?php echo Language::$timesheets; ?></li>
  </ol>
</section>

<section class="content">
    <?php $form=$this->beginWidget('CActiveForm', array(
    	'id'=>'timesheet-form',
    	'enableAjaxValidation'=>false,
    	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
    )); ?>
    
    <div class="box box-success">
    <div class="box-header with-border">
    	<h3 class="box-title"><?php echo Language::$timesheets; ?></h3>
    </div>
    
    <div class="form">
        <div class="box-body">
        	<p class="note"><?php echo Language::$requiredFields; ?></p>
        	<?php echo $form->errorSummary($model); ?>
            	
        	<div class="form-group">
        		<label><?php echo Language::$user; ?></label>
        		<?php echo $form->dropDownList($model,'user_id', $users,
        			array(
        				'class'=>'form-control',
        				'empty'=>'No assigned user',
        			)); ?>
        		<?php echo $form->error($model,'user_id'); ?>
        	</div>
        
        	<div class="form-group">
        		<label><?php echo Language::$date; ?></label>
        		<?php echo $form->textField($model,'date', array('class'=>'form-control', 'placeholder'=>'', 'autofocus'=>true)); ?>
        		<?php echo $form->error($model,'date'); ?>
        	</div>
        
        	<div class="form-group">
        		<label><?php echo Language::$time; ?></label>
        		<?php echo $form->textField($model,'time', array('class'=>'form-control', 'placeholder'=>'')); ?>
        		<?php echo $form->error($model,'time'); ?>
        	</div>
            	
        	<div class="form-group">
        		<label><?php echo Language::$state; ?></label>
        		<?php echo $form->dropDownList($model,'state',
        		    array(
        		        'code'=>'Code',
        		        'design'=>'Design',
        		        'art'=>'Art',
        		        'write'=>'Write',
        		        'audio'=>'Audio',
        		        'test'=>'Test',
        		    ),
        			array(
        				'class'=>'form-control',
        			)); ?>
        		<?php echo $form->error($model,'state'); ?>
        	</div>
        
        	<div class="form-group">
        		<label><?php echo Language::$description; ?></label>
        		<?php echo $form->textArea($model,'description', array('class'=>'form-control', 'placeholder'=>'Holis?')); ?>
        		<?php echo $form->error($model,'description'); ?>
        	</div>
        
        	<div class="form-group buttons">
        		<?php echo CHtml::submitButton($model->isNewRecord ? Language::$create : Language::$update, array('class'=>'btn btn-primary')); ?>
        	</div>
        
            <?php $this->endWidget(); ?>
            
            </div>
    </div><!-- form -->
</section>