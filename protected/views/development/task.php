<?php
echo $this->renderPartial('_menu'); $activities = false;
echo $this->renderPartial('_menu2', array('project'=>$project));
$submit = false;
?>

<section class="content-header">
  <h1 class="hidden-xs"><?php echo Language::$development; ?> <small><?php echo Language::$task; ?></small></h1>

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
        <?php if (!$model->finish){ $activities = true; ?>
            <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'task-form',
            'enableAjaxValidation'=>false,
            'htmlOptions'=>array('enctype'=>'multipart/form-data'),
            )); ?>
                <h1><?php echo Language::$viewPending ?></h1>
                <p><?php echo Language::$registerWorktime; ?></p>
                <div class="form-group">
                    <?php echo $form->checkBox($model,'finish', array('checked'=>'1', 'hidden'=>'1')); ?>
                </div>
                <div class="form-group buttons">
                    <?php echo CHtml::submitButton(Language::$markAsDone, array('class'=>'btn btn-danger btn-lg', 'onclick'=>'submitTime()')); ?>
                </div>
            <?php $this->endWidget(); ?>
        <?php } ?>
        <?php if (!$activities){ echo '<h1>' . Language::$noActivities . '</h1><p>' . Language::$noActivitiesMessage . '</p>'; } ?>
    </div>
</div>

<section class="content" data-step="3" data-intro="<?php echo Language::$developmentTaskHelp3; ?>" data-position="top">
    <div class="row">
        <section class="col-lg-12 connectedSortable ui-sortable" data-step="4" data-intro="<?php echo Language::$developmentTaskHelp4; ?>" data-position="left">
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
					if($model->description != null){
					    echo '<h4>' . Language::$description . '</h4>';
					    echo '<p>' . $model->description . '</p>';
					}
                    ?>
                </div>
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
        'type' => 'task',
    ));
}
?>