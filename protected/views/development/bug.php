<?php
echo $this->renderPartial('_menu'); $activities = false;
echo $this->renderPartial('_menu2', array('project'=>$project));
$submit = false;
?>

<section class="content-header">
  <h1 class="hidden-xs"><?php echo Language::$development; ?> <small><?php echo Language::$bug; ?></small></h1>

  <ol class="breadcrumb">
    <li><a href="<?php echo URL;?>/"><i class="fa fa-dashboard"></i> <?php echo Language::$home; ?></a></li>
    <li><a href="<?php echo URL . '/development';?>"><?php echo Language::$development; ?></a></li>
    <li><a href="<?php echo URL . '/development/' . $project->id;?>"><?php echo $project->name; ?></a></li>
    <li class="active"><?php echo Functions::subString(strip_tags($model->description), 24); ?></li>
  </ol>
</section>

<div class="jumbotron" data-step="1" data-intro="<?php echo Language::$developmentTaskHelp1; ?>" data-position="bottom">
    <div class="container">
        <a class="btn btn-danger" href="javascript:void(0);" onclick="javascript:introJs().start();" style="position: absolute; right: 10%;"><?php echo Language::$help; ?></a>
        <?php if (in_array('admin', Yii::app()->user->roles) or in_array('programmer', Yii::app()->user->roles) and !$model->code){ $activities = true; ?>
            <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'bug-form',
            'enableAjaxValidation'=>false,
            'htmlOptions'=>array('enctype'=>'multipart/form-data'),
            )); ?>
                <h1><?php echo Language::$viewCode ?></h1>
                <p><?php echo Language::$registerWorktime; ?></p>
                <div class="form-group">
                    <?php echo $form->checkBox($model,'code', array('checked'=>'1', 'hidden'=>'1')); ?>
                </div>
                <div class="form-group buttons">
                    <?php echo CHtml::submitButton(Language::$markAsCoded, array('class'=>'btn btn-danger btn-lg', 'onclick'=>'submitTime()')); ?>
                </div>
            <?php $this->endWidget(); ?>
        <?php } ?>
        
        <?php if (in_array('admin', Yii::app()->user->roles) or in_array('tester', Yii::app()->user->roles) and $model->code and !$model->test){ $activities = true; ?>
            <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'bug-form',
            'enableAjaxValidation'=>false,
            'htmlOptions'=>array('enctype'=>'multipart/form-data'),
            )); ?>
                <h1><?php echo Language::$viewTest ?></h1>
                <p><?php echo Language::$registerWorktime; ?></p>
                <div class="form-group">
                    <?php echo $form->checkBox($model,'test', array('checked'=>'1', 'hidden'=>'1')); ?>
                </div>
                <div class="form-group buttons">
                    <?php echo CHtml::submitButton(Language::$markAsTested, array('class'=>'btn btn-warning btn-lg', 'onclick'=>'submitTime()')); ?>
                </div>
            <?php $this->endWidget(); ?>
        <?php } ?>
        <?php if (!$activities){ echo '<h1>' . Language::$noActivities . '</h1><p>' . Language::$noActivitiesMessage . '</p>'; } ?>
    </div>
</div>

<section class="content" data-step="3" data-intro="<?php echo Language::$developmentTaskHelp3; ?>" data-position="top">
    <div class="row">
    
        <?php if (in_array('admin', Yii::app()->user->roles) or in_array('designer', Yii::app()->user->roles)){ ?>
			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'change-form',
				'enableAjaxValidation'=>false,
				'htmlOptions'=>array('enctype'=>'multipart/form-data'),
			)); ?>
  			<section class="col-lg-12 connectedSortable ui-sortable" data-step="4" data-intro="<?php echo Language::$developmentTaskHelp4; ?>" data-position="left">
  			<div class="box box-primary box-solid collapsed-box">
            <div class="box-header with-border">
            	<h3 class="box-title"><?php echo Language::$changeRequest; ?></h3>
            	<div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
        		<div class="form">
                  <div class="box-body">
                  	<div class="form-group">
                  		<?php echo $form->textArea($change,'description', array('class'=>'form-control textarea', 'placeholder'=>Language::$changeDesc)); ?>
                  		<?php echo $form->error($change,'description'); ?>
                  	</div>
                  	<div class="form-group">
                      <label><?php echo Language::$changeState; ?></label>
                      <select id="state" name="state" class="form-control">
                        <option value="code" <?php if (!$model->code){ echo "selected"; } ?>><?php echo Language::$viewCode; ?></option>
                        <option value="test" <?php if ($model->code and !$model->test){ echo "selected"; } ?>><?php echo Language::$viewTest; ?></option>
                      </select>
                  	</div>
                  	<div class="form-group">
                  		<?php echo $form->fileField($change,'file'); ?>
          						<?php echo $form->checkBox($change,'file', array('checked'=>'1', 'hidden'=>'1')); ?>
                  	</div>
                  	<div class="form-group buttons">
                  		<?php echo CHtml::submitButton(Language::$create, array('class'=>'btn btn-primary')); ?>
                  	</div>
                  </div>
                </div>
              </div>
            </section>
    	    <?php $this->endWidget(); ?>
	    <?php } ?>
		
    <?php if (count($changes) > 0){ foreach($changes as $c){ ?>
  			<section class="col-lg-12 connectedSortable ui-sortable">
  			  <div class="box box-danger box-solid">
            <div class="box-header with-border"><?php echo Language::$changeRequest; ?></div>
            <div class="box-body">
              <?php
                echo $c->description;
                if ($c->file != null){
          				$ext  = explode('.', $c->file);
          				$file = Yii::app()->request->baseUrl . '/files/' . Yii::app()->user->company . '/' . $project->id . '/changes/' . $c->id . '.' . end($ext);
          				if (file_exists($_SERVER['DOCUMENT_ROOT'] . $file)){
        				    echo '<div class="box-footer text-center">';
        				    echo '<h4>' . Language::$design . '</h4>';
        				    echo '<p>
        				          <img src="' . $file . '" class="img-responsive center-block"/><br/>
        				          <a href="' . $file . '" class="btn btn-info" download><span class="glyphicon glyphicon-circle-arrow-down"></span> ' . Language::$download . '</a></p>';
        				    echo '</div>';
                  
                  }
                }
              ?>
            </div>
          </div>
        </section>
		<?php }} ?>
		
        <section class="col-lg-12 connectedSortable ui-sortable">
            <div class="box box-success box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo $model->description; ?></h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <?php
					if($model->trigger != null){
					    echo '<h4>' . Language::$trigger . '</h4>';
					    echo '<p>' . $model->trigger . '</p>';
					}
					if($model->message != null){
					    echo '<h4>' . Language::$message . '</h4>';
					    echo '<p>' . $model->message . '</p>';
					}
					if($model->severity != null){
					    echo '<h4>' . Language::$severity . '</h4>';
					    echo '<p>' . Language::$severityOptions[$model->severity] . '</p>';
					}
                    ?>
                </div>
                <?php
                if($model->picture != null){
                    $ext  = explode('.', $model->picture);
                    $file = Yii::app()->request->baseUrl . '/files/' . Yii::app()->user->company . '/' . $project->id . '/bugs/' . $model->id . '.' . end($ext);
                    if (file_exists($_SERVER['DOCUMENT_ROOT'] . $file)){
                        echo '<div class="box-footer text-center">';
                        echo '<h4>' . Language::$picture . '</h4>';
                        echo '<p>
                        <img src="' . $file . '" class="img-responsive center-block"/><br/>
                        <a href="' . $file . '" class="btn btn-info" download><span class="glyphicon glyphicon-circle-arrow-down"></span> ' . Language::$download . '</a></p>';
                        echo '</div>';
                    }
                }
                ?>
            </div>
        </section>
  
        <?php if(count($timesheets) > 0){ ?>
        <section class="col-lg-12 connectedSortable ui-sortable">
            <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title"><?php echo Language::$time; ?></h3>
      
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <?php
                    if (count($timesheets) > 0){
                        echo '<p>' . sprintf(Language::$levelTimeCurrentMessage, Functions::getTime($model->time)) . '</p>';
                        //print part times
                        echo '<button class="btn btn-success" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">' . Language::$timesheets . '</button>';
                        echo '<div class="collapse table-responsive" id="collapseExample"><table class="table table-hover table-condensed"><thead>';
                        echo '<tr><th>' . Language::$date . '</th>' . 
                            '<th>' . Language::$user . '</th>' . 
                            '<th>' . Language::$state . '</th>' . 
                            '<th width="50%">' . Language::$description . '</th>' . 
                            '<th>' . Language::$time . '</th>';
                        if (in_array('admin', Yii::app()->user->roles)){
                            echo '<th>' . Language::$action . '</th>';
                        }
                        echo '</tr></thead><tbody>';
                        foreach($timesheets as $time){
                            echo '<tr>' . 
                                '<td>' . substr($time->date, 0, 10) . '</td>' . 
                                '<td>' . Functions::getNames($time->user_id) . '</td>' . 
                                '<td>' . Language::$states[$time->state] . '</td>' .
                                '<td>' . $time->description . '</td>' . 
                                '<td>' . Functions::getTime($time->time) . '</td>';
                            if (in_array('admin', Yii::app()->user->roles)){
                                echo '<td> <a href="../timesheet/' . $time->id . '"><i class="fa fa-edit"></i></a>&nbsp; <a href="../timesheetdelete/' . $time->id . '"  onclick="return confirm(\'' . Language::$confirmDelete . '\')"><i class="fa fa-trash"></i></a></td>';
                            }
                            echo '</tr>';
                        }
                        echo '</tbody></table></div>';
                    }
                  ?>
                </div>
                <!-- /.box-body -->
              </div>
        </section>
        <?php } ?>
    </div>
</section>

<?php
if ($activities){
    $this->renderPartial('_timesheet', array(
        'timesheet' => $timesheet,
        'submit' => $submit,
        'type' => 'bug',
    ));
}
?>