<?php
	$i=0;
	foreach ($sections as $sec):
		if ($i == count($sections) - 1){
			break;
			$i = $i + 1;
		}
	 ?>
	<hr>
	<h3 class="box-title"><?php echo $sec->name; ?></h3>
	<div class="form-group">
		<label><?php echo Language::$name; ?></label>
		<?php echo CHtml::activeTextField($sec, "[$i]name", array('class'=>'form-control', 'placeholder'=>sprintf(Language::$documentSectName, $sec->name))); ?>
		<?php echo $form->error($sec,'name',array('class'=>'alert alert-danger')); ?>
	</div>
	<div class="form-group">
		<label><?php echo Language::$contents; ?></label>
		<?php echo CHtml::activeTextArea($sec, "[$i]content", array('class'=>'form-control textarea', 'placeholder'=>sprintf(Language::$documentSectContents, $sec->name))); ?>
		<?php echo $form->error($sec,'content',array('class'=>'alert alert-danger')); ?>
	</div>
	<div class="form-group">
		<label><?php echo Language::$file; ?></label>
		<?php echo CHtml::activeFileField($sec, "[$i]file"); ?>
		<?php echo $form->error($sec,'file',array('class'=>'alert alert-danger')); ?>
	</div>
<?php 
	$i = $i + 1;
	endforeach
?>

<div class="form-group buttons">
	<?php echo CHtml::submitButton($model->isNewRecord ? Language::$create : Language::$update, array('class'=>'btn btn-primary')); ?>
</div>

</div></div></div>

<div class="box box-success">
<div class="box-header with-border">
	<h3 class="box-title"><?php echo Language::$newDocumentSection; ?></h3>
</div>

<div class="form">
<div class="box-body">
    <p><?php echo Language::$newDocumentSectionDesc; ?></p>

	<div class="form-group">
		<label><?php echo Language::$name; ?></label>
		<?php echo CHtml::activeTextField($sec, "[$i]name", array('class'=>'form-control', 'placeholder'=>Language::$newDocumentSectionName)); ?>
		<?php echo $form->error($sec,'name',array('class'=>'alert alert-danger')); ?>
	</div>
	<div class="form-group">
		<label><?php echo Language::$contents; ?></label>
		<?php echo CHtml::activeTextArea($sec, "[$i]content", array('class'=>'form-control textarea', 'placeholder'=>Language::$newDocumentSectionCont)); ?>
		<?php echo $form->error($sec,'content',array('class'=>'alert alert-danger')); ?>
	</div>
	<div class="form-group">
		<label><?php echo Language::$file; ?></label>
		<?php echo CHtml::activeFileField($sec, "[$i]file"); ?>
		<?php echo $form->error($sec,'file',array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group buttons">
		<?php echo CHtml::submitButton(Language::$create, array('class'=>'btn btn-success')); ?>
	</div>
</div></div>