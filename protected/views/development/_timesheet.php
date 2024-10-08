<div class="timesheet" data-step="2" data-intro="<?php echo Language::$developmentTaskHelp2; ?>" data-position="top">
    <?php $form=$this->beginWidget('CActiveForm', array(
    		'id'=>'timesheet-form',
    		'enableAjaxValidation'=>false,
    		'htmlOptions'=>array('enctype'=>'multipart/form-data', 'class'=>'timer-form'),
    	)); ?>
    
    	<div class="form-group col-xs-3" id="time">
    		<?php echo $form->textField($timesheet,'time', array('class'=>'form-control')); ?>
    		<?php echo $form->error($timesheet,'time'); ?>
    	</div>
    
    	<div class="form-group col-xs-5 col-sm-6">
    		<?php echo $form->textField($timesheet,'description', array('class'=>'form-control', 'placeholder'=>Language::$description)); ?>
    		<?php echo $form->error($timesheet,'description'); ?>
    	</div>
    
    	<div class="form-group col-xs-4 col-sm-3 text-right">
            <button type='button' id="play" onclick="setCounter()" class="btn btn-success"><i class="fa fa-play"></i> <span class="hidden-xs hidden-sm hidden-md"><?php echo Language::$start; ?></button>
            <button type='button' id="stop" onclick="setCounter()" class="btn btn-danger hidden"><i class="fa fa-stop"></i> <span class="hidden-xs hidden-sm hidden-md"><?php echo Language::$stop; ?></button>
            <button type="submit" name="search" class="btn btn-primary" <?php if ($submit){ echo 'onclick="submitForm()"'; } ?>><i class="fa fa-save"></i> <span class="hidden-xs hidden-sm hidden-md"><?php echo Language::$save; ?></button>
    	</div>
    <?php $this->endWidget(); ?>
</div>

<script type="text/javascript">
	time = document.getElementById('Timesheet_time');
	
    <?php if ($submit){ ?>
    submitForm = function(){
        $.ajax({
            type: 'post',
            url: window.location.href,
            data: $("#<?php echo $type; ?>-form").serialize(),
        });
    }
    <?php } ?>
</script>