<?php
echo $this->renderPartial('_menu');
echo $this->renderPartial('_menu2', array('project'=>$project));
$filter = isset($_GET['graphics']) ||
          isset($_GET['sounds']) ||
          isset($_GET['music']) ||
          isset($_GET['components']) ||
          isset($_GET['bugs']) ||
          isset($_GET['screens']) ||
          isset($_GET['cutscenes']) ||
          isset($_GET['levels']) ||
          isset($_GET['dialogs']) ||
          isset($_GET['tasks']);
$notasks = sizeof($graphics) == 0 and
           sizeof($sounds) == 0 and
           sizeof($musics) == 0 and
           sizeof($components) == 0 and
           sizeof($bugs) == 0 and
           sizeof($screens) == 0 and
           sizeof($cutscenes) == 0 and
           sizeof($levels) == 0 and
           sizeof($dialogs) == 0 and
           sizeof($tasks) == 0;

?>
<section class="content-header">
  <h1 class="hidden-xs"><?php echo Language::$development; ?> <small><?php echo Language::$taskList; ?></small></h1>

  <ol class="breadcrumb">
    <li><a href="<?php echo URL;?>/"><i class="fa fa-dashboard"></i> <?php echo Language::$home; ?></a></li>
    <li><a href="<?php echo URL . '/development';?>"><?php echo Language::$development; ?></a></li>
    <li class="active"><?php echo $project->name; ?></li>
  </ol>
</section>

<?php if ($notasks and !isset($_GET['bugreport'])){?>
<div class="jumbotron">
  <div class="container">
    <h1><?php echo Language::$noTasks; ?></h1>
    <p><?php echo Language::$noTasksMessage; ?></p>
    <a class="btn btn-large btn-success" href="javascript:void(0);" onclick="javascript:introJs().start();"><?php echo Language::$help; ?></a>
  </div>
</div>
<?php } ?>
  
<section class="content" data-step="1" data-intro="<?php echo Language::$developmentHelp1; ?>" data-position="left">
  <?php
    $form=$this->beginWidget('CActiveForm', array(
    	'id'=>'bug-form',
    	'enableAjaxValidation'=>false,
    	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
    ));
  ?>
  
  <div class="box box-danger <?php if (!isset($_GET['bugreport'])) echo 'collapsed-box'; ?>">
  <div class="box-header with-border">
  	<h3 class="box-title"><?php echo Language::$reportBug; ?></h3>
  	<div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
      </button>
      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
    </div>
  </div>
  
  <div class="form">
    <div class="box-body">
    	<p class="note"><?php echo Language::$requiredFields; ?></p>
    	<?php echo $form->errorSummary($newBug); ?>
    	
    	<div class="form-group">
    		<label><?php echo Language::$user; ?></label>
    		<?php echo $form->dropDownList($newBug,'user_id', $users,
    			array(
    				'class'=>'form-control',
    				'empty'=>'No assigned user',
    			)); ?>
    		<?php echo $form->error($newBug,'user_id'); ?>
    	</div>
    
    	<div class="form-group">
    		<label><?php echo Language::$description; ?></label>
    		<?php echo $form->textField($newBug,'description', array('class'=>'form-control', 'placeholder'=>Language::$bugDesc)); ?>
    		<?php echo $form->error($newBug,'description'); ?>
    	</div>
    
    	<div class="form-group">
    		<label><?php echo Language::$trigger; ?></label>
    		<?php echo $form->textArea($newBug,'trigger', array('class'=>'form-control textarea', 'placeholder'=>Language::$triggerDesc)); ?>
    		<?php echo $form->error($newBug,'description'); ?>
    	</div>
    
    	<div class="form-group">
    		<label><?php echo Language::$severity; ?></label>
    		<?php echo $form->dropDownList($newBug,'severity', Language::$severityOptions, array('class'=>'form-control')); ?>
    		<?php echo $form->error($newBug,'description'); ?>
    	</div>
    
    	<div class="form-group">
    		<label><?php echo Language::$message; ?></label>
    		<?php echo $form->textArea($newBug,'message', array('class'=>'form-control textarea', 'placeholder'=>Language::$bugMessage)); ?>
    		<?php echo $form->error($newBug,'message'); ?>
    	</div>
    
    	<div class="form-group">
    		<label><?php echo Language::$picture; ?></label>
    		<?php echo $form->fileField($newBug, 'picture'); ?>
    		<?php echo $form->error($newBug,'picture'); ?>
    	</div>
    
    	<div class="form-group buttons">
    		<?php echo CHtml::submitButton($newBug->isNewRecord ? Language::$create : Language::$update, array('class'=>'btn btn-primary')); ?>
    	</div>
    
    <?php $this->endWidget(); ?>
    
    </div>
  </div><!-- form -->
    <!-- /.box-footer -->
  </div>
	
  <?php if (sizeof($tasks) > 0 and (!$filter or isset($_GET['tasks']))){?>
  <div class="box box-success">
    <div class="box-header with-border">
      <h3 class="box-title"><?php echo Language::$tasks; ?></h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover data-table">
          <thead>
          <tr>
            <th><?php echo Language::$priority; ?></th>
            <th width="25%"><?php echo Language::$name; ?></th>
            <th width="50%"><?php echo Language::$description; ?></th>
            <th><?php echo Language::$deadline; ?></th>
            <th><?php echo Language::$status; ?></th>
          </tr>
          </thead>
          <tbody>
          <?php
          foreach ($tasks as $task) {?>
          <tr>
            <td><?php echo $task->id; ?></td>
            <td><a href="task/<?php echo $task->id; ?>"><p><?php echo $task->name; ?></p></a></td>
            <td><?php echo Functions::subString(strip_tags($task->description), 48); ?></td>
            <td><?php echo $task->deadline; ?></td>
            <td>
                <?php
                    if ($task->finish){
                        echo '<span class="label label-success">' . Language::$viewFinish . ' </span>';
                    }
                    else{
                        echo '<span class="label label-danger">' . Language::$viewPending . ' </span>';
                    }
                 ?>
            </td>
          </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
      <!-- /.table-responsive -->
    </div>
    <!-- /.box-body -->
    <div class="box-footer clearfix">
      <a href="?tasks=finish" class="btn btn-sm btn-success btn-flat pull-right"><?php echo Language::$viewFinish; ?></a><span class="pull-right">&nbsp;</span>
      <a href="?tasks=all" class="btn btn-sm btn-default btn-flat pull-right"><?php echo Language::$viewAll ?></a>
    </div>
    <!-- /.box-footer -->
  </div>
  <?php } ?>
	
  <?php if ((in_array('admin', Yii::app()->user->roles) or in_array('designer', Yii::app()->user->roles) or in_array('artist', Yii::app()->user->roles)) and (sizeof($graphics) > 0 and (!$filter or isset($_GET['graphics'])))){?>
  <div class="box box-success">
    <div class="box-header with-border">
      <h3 class="box-title"><?php echo Language::$graphics; ?></h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover data-table">
          <thead>
          <tr>
            <th><?php echo Language::$priority; ?></th>
            <th width="25%"><?php echo Language::$name; ?></th>
            <th width="50%"><?php echo Language::$description; ?></th>
            <th><?php echo Language::$deadline; ?></th>
            <th><?php echo Language::$status; ?></th>
          </tr>
          </thead>
          <tbody>
          <?php
          foreach ($graphics as $graphic) {?>
          <tr>
            <td>
              <?php
              $priority = 0;
              
              $screensD    = Screen::model()->findAllbyAttributes(array(), 'project_id = ' . Yii::app()->user->company . ' AND FIND_IN_SET(' . $graphic->id . ', graphics)');
              $scenesD     = Cutscene::model()->findAllbyAttributes(array(), 'project_id = ' . Yii::app()->user->company . ' AND FIND_IN_SET(' . $graphic->id . ', graphics)');
              $levelsD     = Level::model()->findAllbyAttributes(array(), 'project_id = ' . Yii::app()->user->company . ' AND FIND_IN_SET(' . $graphic->id . ', graphics)');
              $componentsD = Component::model()->findAllbyAttributes(array(), 'project_id = ' . Yii::app()->user->company . ' AND FIND_IN_SET(' . $graphic->id . ', graphics)');
              
              $priority = (count($componentsD) * 4) + (count($screensD) * 3) + (count($scenesD) * 2) + count($levelsD);
              
              echo $priority;
              ?>
            </td>
            <td><a href="graphic/<?php echo $graphic->id; ?>"><p><?php echo $graphic->name; ?></p></a></td>
            <td><?php echo Functions::subString(strip_tags($graphic->description), 48); ?></td>
            <td><?php echo $graphic->deadline; ?></td>
            <td>
                <?php
                    if ($graphic->finish){
                        echo '<span class="label label-success">' . Language::$viewFinish . ' </span>';
                    }
                    else if ($graphic->valid){
                        echo '<span class="label label-info">' . Language::$viewFinal . ' </span>';
                    }
                    else if ($graphic->sketch){
                        echo '<span class="label label-warning">' . Language::$viewValid . ' </span>';
                    }
                    else{
                        echo '<span class="label label-danger">' . Language::$viewSketch . ' </span>';
                    }
                 ?>
            </td>
          </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
      <!-- /.table-responsive -->
    </div>
    <!-- /.box-body -->
    <div class="box-footer clearfix">
      <a href="?graphics=sketch" class="btn btn-sm btn-danger btn-flat pull-right"><?php echo Language::$viewSketch; ?></a><span class="pull-right">&nbsp;</span>
      <a href="?graphics=valid" class="btn btn-sm btn-warning btn-flat pull-right"><?php echo Language::$viewValid; ?></a><span class="pull-right">&nbsp;</span>
      <a href="?graphics=final" class="btn btn-sm btn-info btn-flat pull-right"><?php echo Language::$viewFinal; ?></a><span class="pull-right">&nbsp;</span>
      <a href="?graphics=finish" class="btn btn-sm btn-success btn-flat pull-right"><?php echo Language::$viewFinish; ?></a><span class="pull-right">&nbsp;</span>
      <a href="?graphics=all" class="btn btn-sm btn-default btn-flat pull-right"><?php echo Language::$viewAll ?></a>
    </div>
    <!-- /.box-footer -->
  </div>
  <?php } ?>

  <?php if ((in_array('admin', Yii::app()->user->roles) or in_array('designer', Yii::app()->user->roles) or in_array('composer', Yii::app()->user->roles)) and (sizeof($sounds) > 0 and (!$filter or isset($_GET['sounds'])))){ ?>
  <div class="box box-success">
    <div class="box-header with-border">
      <h3 class="box-title"><?php echo Language::$sounds; ?></h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover data-table">
          <thead>
          <tr>
            <th><?php echo Language::$priority; ?></th>
            <th width="25%"><?php echo Language::$name; ?></th>
            <th width="50%"><?php echo Language::$description; ?></th>
            <th><?php echo Language::$deadline; ?></th>
            <th><?php echo Language::$status; ?></th>
          </tr>
          </thead>
          <tbody>
          <?php foreach ($sounds as $sound) { ?>
          <tr>
            <td>
              <?php
              $priority = 0;
              
              $screensD    = Screen::model()->findAllbyAttributes(array(), 'project_id = ' . Yii::app()->user->company . ' AND FIND_IN_SET(' . $sound->id . ', sounds)');
              $scenesD     = Cutscene::model()->findAllbyAttributes(array(), 'project_id = ' . Yii::app()->user->company . ' AND FIND_IN_SET(' . $sound->id . ', sounds)');
              $levelsD     = Level::model()->findAllbyAttributes(array(), 'project_id = ' . Yii::app()->user->company . ' AND FIND_IN_SET(' . $sound->id . ', sounds)');
              $componentsD = Component::model()->findAllbyAttributes(array(), 'project_id = ' . Yii::app()->user->company . ' AND FIND_IN_SET(' . $sound->id . ', sounds)');
              
              $priority = (count($componentsD) * 4) + (count($screensD) * 3) + (count($scenesD) * 2) + count($levelsD);
              
              echo $priority;
              ?>
            </td>
            <td><a href="sound/<?php echo $sound->id; ?>"><p><?php echo $sound->name; ?></p></a></td>
            <td><?php echo Functions::subString(strip_tags($sound->description), 48); ?></td>
            <td><?php echo $sound->deadline; ?></td>
            <td>
                <?php 
                    if ($sound->valid){
                        echo '<span class="label label-success">' . Language::$viewFinish . ' </span>';
                    }
                    else if ($sound->finish){
                        echo '<span class="label label-warning">' . Language::$viewValid . ' </span>';
                    }
                    else{
                        echo '<span class="label label-danger">' . Language::$viewProduce . ' </span>';
                    }
                 ?>
            </td>
          </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
      <!-- /.table-responsive -->
    </div>
    <!-- /.box-body -->
    <div class="box-footer clearfix">
      <a href="?sounds=produce" class="btn btn-sm btn-danger btn-flat pull-right"><?php echo Language::$viewProduce; ?></a><span class="pull-right">&nbsp;</span>
      <a href="?sounds=valid" class="btn btn-sm btn-warning btn-flat pull-right"><?php echo Language::$viewValid; ?></a><span class="pull-right">&nbsp;</span>
      <a href="?sounds=finish" class="btn btn-sm btn-success btn-flat pull-right"><?php echo Language::$viewFinish; ?></a><span class="pull-right">&nbsp;</span>
      <a href="?sounds=all" class="btn btn-sm btn-default btn-flat pull-right"><?php echo Language::$viewAll ?></a>
    </div>
    <!-- /.box-footer -->
  </div>
  <?php } ?>

  <?php if ((in_array('admin', Yii::app()->user->roles) or in_array('designer', Yii::app()->user->roles) or in_array('composer', Yii::app()->user->roles)) and (sizeof($musics) > 0 and (!$filter or isset($_GET['music'])))){ ?>
  <div class="box box-success">
    <div class="box-header with-border">
      <h3 class="box-title"><?php echo Language::$music; ?></h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover data-table">
          <thead>
          <tr>
            <th><?php echo Language::$priority; ?></th>
            <th width="25%"><?php echo Language::$name; ?></th>
            <th width="50%"><?php echo Language::$description; ?></th>
            <th><?php echo Language::$deadline; ?></th>
            <th><?php echo Language::$status; ?></th>
          </tr>
          </thead>
          <tbody>
          <?php foreach ($musics as $music) { ?>
          <tr>
            <td>
              <?php
              $priority = 0;
              
              $screensD    = Screen::model()->findAllbyAttributes(array(), 'project_id = ' . Yii::app()->user->company . ' AND FIND_IN_SET(' . $music->id . ', music)');
              $scenesD     = Cutscene::model()->findAllbyAttributes(array(), 'project_id = ' . Yii::app()->user->company . ' AND FIND_IN_SET(' . $music->id . ', music)');
              $levelsD     = Level::model()->findAllbyAttributes(array(), 'project_id = ' . Yii::app()->user->company . ' AND FIND_IN_SET(' . $music->id . ', music)');
              
              $priority = (count($screensD) * 3) + (count($scenesD) * 2) + count($levelsD);
              
              echo $priority;
              ?>
            </td>
            <td><a href="music/<?php echo $music->id; ?>"><p><?php echo $music->name; ?></p></a></td>
            <td><?php echo Functions::subString(strip_tags($music->description), 48); ?></td>
            <td><?php echo $music->deadline; ?></td>
            <td>
                <?php 
                    if ($music->valid){
                        echo '<span class="label label-success">' . Language::$viewFinish . ' </span>';
                    }
                    else if ($music->finish){
                        echo '<span class="label label-warning">' . Language::$viewValid . ' </span>';
                    }
                    else{
                        echo '<span class="label label-danger">' . Language::$viewProduce . ' </span>';
                    }
                 ?>
            </td>
          </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
      <!-- /.table-responsive -->
    </div>
    <!-- /.box-body -->
    <div class="box-footer clearfix">
      <a href="?music=produce" class="btn btn-sm btn-danger btn-flat pull-right"><?php echo Language::$viewProduce; ?></a><span class="pull-right">&nbsp;</span>
      <a href="?music=valid" class="btn btn-sm btn-warning btn-flat pull-right"><?php echo Language::$viewValid; ?></a><span class="pull-right">&nbsp;</span>
      <a href="?music=finish" class="btn btn-sm btn-success btn-flat pull-right"><?php echo Language::$viewFinish; ?></a><span class="pull-right">&nbsp;</span>
      <a href="?music=all" class="btn btn-sm btn-default btn-flat pull-right"><?php echo Language::$viewAll ?></a>
    </div>
    <!-- /.box-footer -->
  </div>
  <?php } ?>

  <?php if ((in_array('admin', Yii::app()->user->roles) or in_array('designer', Yii::app()->user->roles) or in_array('programmer', Yii::app()->user->roles) or in_array('tester', Yii::app()->user->roles) or in_array('writer', Yii::app()->user->roles)) and (sizeof($dialogs) > 0 and (!$filter or isset($_GET['dialogs'])))){ ?>
  <div class="box box-success">
    <div class="box-header with-border">
      <h3 class="box-title"><?php echo Language::$dialogs; ?></h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover data-table">
          <thead>
          <tr>
            <th><?php echo Language::$priority; ?></th>
            <th width="25%"><?php echo Language::$name; ?></th>
            <th width="50%"><?php echo Language::$description; ?></th>
            <th><?php echo Language::$deadline; ?></th>
            <th><?php echo Language::$status; ?></th>
          </tr>
          </thead>
          <tbody>
          <?php foreach ($dialogs as $dialog) { ?>
          <tr>
            <th><?php echo 0; ?></th>
            <td><a href="dialog/<?php echo $dialog->id; ?>"><p><?php echo $dialog->name; ?></p></a></td>
            <td><?php echo Functions::subString(strip_tags($dialog->context), 48); ?></td>
            <td><?php echo $dialog->deadline; ?></td>
            <td>
                <?php 
                    if ($dialog->test){
                        echo '<span class="label label-success">' . Language::$viewFinish . ' </span>';
                    }
                    else if ($dialog->code){
                        echo '<span class="label label-info">' . Language::$viewTest . ' </span>';
                    }
                    else if ($dialog->valid){
                        echo '<span class="label label-primary">' . Language::$viewCode . ' </span>';
                    }
                    else if ($dialog->finish){
                        echo '<span class="label label-warning">' . Language::$viewValid . ' </span>';
                    }
                    else{
                        echo '<span class="label label-danger">' . Language::$viewWrite . ' </span>';
                    }
                 ?>
            </td>
          </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
      <!-- /.table-responsive -->
    </div>
    <!-- /.box-body -->
    <div class="box-footer clearfix">
      <a href="?dialogs=write" class="btn btn-sm btn-danger btn-flat pull-right"><?php echo Language::$viewWrite; ?></a><span class="pull-right">&nbsp;</span>
      <a href="?dialogs=valid" class="btn btn-sm btn-warning btn-flat pull-right"><?php echo Language::$viewValid; ?></a><span class="pull-right">&nbsp;</span>
      <a href="?dialogs=code" class="btn btn-sm btn-primary btn-flat pull-right"><?php echo Language::$viewCode; ?></a><span class="pull-right">&nbsp;</span>
      <a href="?dialogs=test" class="btn btn-sm btn-info btn-flat pull-right"><?php echo Language::$viewTest; ?></a><span class="pull-right">&nbsp;</span>
      <a href="?dialogs=finish" class="btn btn-sm btn-success btn-flat pull-right"><?php echo Language::$viewFinish; ?></a><span class="pull-right">&nbsp;</span>
      <a href="?dialogs=all" class="btn btn-sm btn-default btn-flat pull-right"><?php echo Language::$viewAll ?></a>
    </div>
    <!-- /.box-footer -->
  </div>
  <?php } ?>

  <?php if ((in_array('admin', Yii::app()->user->roles) or in_array('designer', Yii::app()->user->roles) or in_array('artist', Yii::app()->user->roles) or in_array('programmer', Yii::app()->user->roles) or in_array('tester', Yii::app()->user->roles)) and (sizeof($screens) > 0 and (!$filter or isset($_GET['screens'])))){ ?>
  <div class="box box-success">
    <div class="box-header with-border">
      <h3 class="box-title"><?php echo Language::$screens; ?></h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover data-table">
          <thead>
          <tr>
            <th><?php echo Language::$priority; ?></th>
            <th width="25%"><?php echo Language::$name; ?></th>
            <th width="50%"><?php echo Language::$description; ?></th>
            <th><?php echo Language::$deadline; ?></th>
            <th><?php echo Language::$status; ?></th>
          </tr>
          </thead>
          <tbody>
          <?php foreach ($screens as $screen) { ?>
          <tr>
            <th><?php echo 0; ?></th>
            <td><a href="screen/<?php echo $screen->id; ?>"><p><?php echo $screen->name; ?></p></a></td>
            <td><?php echo Functions::subString(strip_tags($screen->description), 48); ?></td>
            <td><?php echo $screen->deadline; ?></td>
            <td>
                <?php 
                    if ($screen->test){
                        echo '<span class="label label-success">' . Language::$viewFinish . ' </span>';
                    }
                    else if ($screen->code){
                        echo '<span class="label label-info">' . Language::$viewTest . ' </span>';
                    }
                    else if ($screen->valid){
                        echo '<span class="label label-primary">' . Language::$viewCode . ' </span>';
                    }
                    else if ($screen->finish){
                        echo '<span class="label label-warning">' . Language::$viewValid . ' </span>';
                    }
                    else{
                        echo '<span class="label label-danger">' . Language::$viewDesign . ' </span>';
                    }
                 ?>
            </td>
          </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
      <!-- /.table-responsive -->
    </div>
    <!-- /.box-body -->
    <div class="box-footer clearfix">
      <a href="?screens=design" class="btn btn-sm btn-danger btn-flat pull-right"><?php echo Language::$viewDesign; ?></a><span class="pull-right">&nbsp;</span>
      <a href="?screens=code" class="btn btn-sm btn-warning btn-flat pull-right"><?php echo Language::$viewValid; ?></a><span class="pull-right">&nbsp;</span>
      <a href="?screens=valid" class="btn btn-sm btn-primary btn-flat pull-right"><?php echo Language::$viewCode; ?></a><span class="pull-right">&nbsp;</span>
      <a href="?screens=test" class="btn btn-sm btn-info btn-flat pull-right"><?php echo Language::$viewTest; ?></a><span class="pull-right">&nbsp;</span>
      <a href="?screens=finish" class="btn btn-sm btn-success btn-flat pull-right"><?php echo Language::$viewFinish; ?></a><span class="pull-right">&nbsp;</span>
      <a href="?screens=all" class="btn btn-sm btn-default btn-flat pull-right"><?php echo Language::$viewAll ?></a>
    </div>
    <!-- /.box-footer -->
  </div>
  <?php } ?>

  <?php if ((in_array('admin', Yii::app()->user->roles) or in_array('designer', Yii::app()->user->roles) or in_array('programmer', Yii::app()->user->roles) or in_array('tester', Yii::app()->user->roles) or in_array('writer', Yii::app()->user->roles) or in_array('artist', Yii::app()->user->roles)) and (sizeof($cutscenes) > 0 and (!$filter or isset($_GET['cutscenes'])))){ ?>
  <div class="box box-success">
    <div class="box-header with-border">
      <h3 class="box-title"><?php echo Language::$cutscenes; ?></h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover data-table">
          <thead>
          <tr>
            <th><?php echo Language::$priority; ?></th>
            <th width="25%"><?php echo Language::$name; ?></th>
            <th width="50%"><?php echo Language::$description; ?></th>
            <th><?php echo Language::$deadline; ?></th>
            <th><?php echo Language::$status; ?></th>
          </tr>
          </thead>
          <tbody>
          <?php foreach ($cutscenes as $cutscene) { ?>
          <tr>
            <th>
              <?php
              $priority = 0;
              
              $levelsD = Level::model()->findAllbyAttributes(array(), 'project_id = ' . Yii::app()->user->company . ' AND FIND_IN_SET(' . $cutscene->id . ', cutscenes)');
              
              $priority = count($levelsD);
              
              echo $priority;
              ?>
            </th>
            <td><a href="cutscene/<?php echo $cutscene->id; ?>"><?php echo Functions::subString(strip_tags($cutscene->description), 32); ?></a></td>
            <td><?php echo Functions::subString(strip_tags($cutscene->storyboard), 48); ?></td>
            <td><?php echo $cutscene->deadline; ?></td>
            <td>
                <?php 
                    if ($cutscene->test){
                        echo '<span class="label label-success">' . Language::$viewFinish . ' </span>';
                    }
                    else if ($cutscene->code){
                        echo '<span class="label label-info">' . Language::$viewTest . ' </span>';
                    }
                    else if ($cutscene->valid){
                        echo '<span class="label label-primary">' . Language::$viewCode . ' </span>';
                    }
                    else if ($cutscene->sketch){
                        echo '<span class="label label-default">' . Language::$viewValid . ' </span>';
                    }
                    else if ($cutscene->finish){
                        echo '<span class="label label-warning">' . Language::$viewSketch . ' </span>';
                    }
                    else{
                        echo '<span class="label label-danger">' . Language::$viewWrite . ' </span>';
                    }
                 ?>
            </td>
          </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
      <!-- /.table-responsive -->
    </div>
    <!-- /.box-body -->
    <div class="box-footer clearfix">
      <a href="?cutscenes=write" class="btn btn-sm btn-danger btn-flat pull-right"><?php echo Language::$viewWrite; ?></a><span class="pull-right">&nbsp;</span>
      <a href="?cutscenes=sketch" class="btn btn-sm btn-warning btn-flat pull-right"><?php echo Language::$viewSketch; ?></a><span class="pull-right">&nbsp;</span>
      <a href="?cutscenes=valid" class="btn btn-sm btn-default btn-flat pull-right"><?php echo Language::$viewValid; ?></a><span class="pull-right">&nbsp;</span>
      <a href="?cutscenes=code" class="btn btn-sm btn-primary btn-flat pull-right"><?php echo Language::$viewCode; ?></a><span class="pull-right">&nbsp;</span>
      <a href="?cutscenes=test" class="btn btn-sm btn-info btn-flat pull-right"><?php echo Language::$viewTest; ?></a><span class="pull-right">&nbsp;</span>
      <a href="?cutscenes=finish" class="btn btn-sm btn-success btn-flat pull-right"><?php echo Language::$viewFinish; ?></a><span class="pull-right">&nbsp;</span>
      <a href="?cutscenes=all" class="btn btn-sm btn-default btn-flat pull-right"><?php echo Language::$viewAll ?></a>
    </div>
    <!-- /.box-footer -->
  </div>
  <?php } ?>

  <?php if ((in_array('admin', Yii::app()->user->roles) or in_array('designer', Yii::app()->user->roles) or in_array('programmer', Yii::app()->user->roles) or in_array('tester', Yii::app()->user->roles)) and (sizeof($levels) > 0 and (!$filter or isset($_GET['levels'])))){ ?>
  <div class="box box-success">
    <div class="box-header with-border">
      <h3 class="box-title"><?php echo Language::$levels; ?></h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover data-table">
          <thead>
          <tr>
            <th><?php echo Language::$priority; ?></th>
            <th width="25%"><?php echo Language::$name; ?></th>
            <th width="50%"><?php echo Language::$description; ?></th>
            <th><?php echo Language::$deadline; ?></th>
            <th><?php echo Language::$status; ?></th>
          </tr>
          </thead>
          <tbody>
          <?php foreach ($levels as $level) { ?>
          <tr>
            <th><?php echo 0; ?></th>
            <td><a href="level/<?php echo $level->id; ?>"><p><?php echo $level->name; ?></p></a></td>
            <td><?php echo Functions::subString(strip_tags($level->synopsis), 48); ?></td>
            <td><?php echo $level->deadline; ?></td>
            <td>
                <?php 
                    if ($level->test){
                        echo '<span class="label label-success">' . Language::$viewFinish . ' </span>';
                    }
                    else if ($level->valid){
                        echo '<span class="label label-info">' . Language::$viewTest . ' </span>';
                    }
                    else if ($level->code){
                        echo '<span class="label label-primary">' . Language::$viewValid . ' </span>';
                    }
                    else if ($level->finish){
                        echo '<span class="label label-warning">' . Language::$viewCode . ' </span>';
                    }
                    else{
                        echo '<span class="label label-danger">' . Language::$viewDesign . ' </span>';
                    }
                 ?>
            </td>
          </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
      <!-- /.table-responsive -->
    </div>
    <!-- /.box-body -->
    <div class="box-footer clearfix">
      <a href="?levels=design" class="btn btn-sm btn-danger btn-flat pull-right"><?php echo Language::$viewDesign; ?></a><span class="pull-right">&nbsp;</span>
      <a href="?levels=code" class="btn btn-sm btn-warning btn-flat pull-right"><?php echo Language::$viewCode; ?></a><span class="pull-right">&nbsp;</span>
      <a href="?levels=valid" class="btn btn-sm btn-primary btn-flat pull-right"><?php echo Language::$viewValid; ?></a><span class="pull-right">&nbsp;</span>
      <a href="?levels=test" class="btn btn-sm btn-info btn-flat pull-right"><?php echo Language::$viewTest; ?></a><span class="pull-right">&nbsp;</span>
      <a href="?levels=finish" class="btn btn-sm btn-success btn-flat pull-right"><?php echo Language::$viewFinish; ?></a><span class="pull-right">&nbsp;</span>
      <a href="?levels=all" class="btn btn-sm btn-default btn-flat pull-right"><?php echo Language::$viewAll ?></a>
    </div>
    <!-- /.box-footer -->
  </div>
  <?php } ?>

  <?php if ((in_array('admin', Yii::app()->user->roles) or in_array('programmer', Yii::app()->user->roles) or in_array('tester', Yii::app()->user->roles)) and (sizeof($bugs) > 0 and (!$filter or isset($_GET['bugs'])))){ ?>
  <div class="box box-success">
    <div class="box-header with-border">
      <h3 class="box-title"><?php echo Language::$bugs; ?></h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover data-table">
          <thead>
          <tr>
            <th><?php echo Language::$priority; ?></th>
            <th width="25%"><?php echo Language::$name; ?></th>
            <th width="50%"><?php echo Language::$description; ?></th>
            <th><?php echo Language::$severity; ?></th>
            <th><?php echo Language::$status; ?></th>
          </tr>
          </thead>
          <tbody>
          <?php foreach ($bugs as $bug) { ?>
          <tr>
            <td><?php echo $bug->severity; ?></td>
            <td><a href="bug/<?php echo $bug->id; ?>"><?php echo Functions::subString(strip_tags($bug->description), 48); ?></a></td>
            <td><?php echo $bug->severity; ?></td>
            <td><?php echo Language::$severityOptions[$bug->severity]; ?></td>
            <td>
                <?php 
                    if ($bug->test){
                        echo '<span class="label label-success">' . Language::$viewFix . ' </span>';
                    }
                    else if ($bug->code){
                        echo '<span class="label label-warning">' . Language::$viewTest . ' </span>';
                    }
                    else{
                        echo '<span class="label label-danger">' . Language::$viewCode . ' </span>';
                    }
                 ?>
            </td>
          </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
      <!-- /.table-responsive -->
    </div>
    <!-- /.box-body -->
    <div class="box-footer clearfix">
      <a href="?bugs=code" class="btn btn-sm btn-danger btn-flat pull-right"><?php echo Language::$viewCode; ?></a><span class="pull-right">&nbsp;</span>
      <a href="?bugs=test" class="btn btn-sm btn-warning btn-flat pull-right"><?php echo Language::$viewTest; ?></a><span class="pull-right">&nbsp;</span>
      <a href="?bugs=fix" class="btn btn-sm btn-success btn-flat pull-right"><?php echo Language::$viewFix; ?></a><span class="pull-right">&nbsp;</span>
      <a href="?bugs=all" class="btn btn-sm btn-default btn-flat pull-right"><?php echo Language::$viewAll ?></a>
    </div>
    <!-- /.box-footer -->
  </div>
  <?php } ?>

  <?php if ((in_array('admin', Yii::app()->user->roles) or in_array('designer', Yii::app()->user->roles) or in_array('programmer', Yii::app()->user->roles) or in_array('tester', Yii::app()->user->roles)) and (sizeof($components) > 0 and (!$filter or isset($_GET['components'])))){ ?>
  <div class="box box-success">
    <div class="box-header with-border">
      <h3 class="box-title"><?php echo Language::$softwareComponents; ?></h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover data-table">
          <thead>
          <tr>
            <th><?php echo Language::$priority; ?></th>
            <th width="25%"><?php echo Language::$name; ?></th>
            <th width="50%"><?php echo Language::$description; ?></th>
            <th><?php echo Language::$deadline; ?></th>
            <th><?php echo Language::$status; ?></th>
          </tr>
          </thead>
          <tbody>
          <?php foreach ($components as $component) { ?>
          <tr>
            <td>
              <?php
              $priority = 0;
              if ($component->character_id){
                $priority += 3;
              }
              if ($component->enviroment_id){
                $priority += 3;
              }
              if ($component->screen_id){
                $priority += 3;
              }
              if ($component->cutscene_id){
                $priority += 2;
              }
              if ($component->level_id){
                $priority += 1;
              }
              
              echo $priority;
              ?>
            </td>
            <td><a href="component/<?php echo $component->id; ?>"><p><?php echo $component->name; ?></p></a></td>
            <td><?php echo Functions::subString(strip_tags($component->description), 48); ?></td>
            <td><?php echo $component->deadline; ?></td>
            <td>
                <?php 
                    if ($component->test){
                        echo '<span class="label label-success">' . Language::$viewFinish . ' </span>';
                    }
                    else if ($component->valid){
                        echo '<span class="label label-info">' . Language::$viewTest . ' </span>';
                    }
                    else if ($component->code){
                        echo '<span class="label label-warning">' . Language::$viewValid . ' </span>';
                    }
                    else{
                        echo '<span class="label label-danger">' . Language::$viewCode . ' </span>';
                    }
                 ?>
            </td>
          </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
      <!-- /.table-responsive -->
    </div>
    <!-- /.box-body -->
    <div class="box-footer clearfix">
      <a href="?components=code" class="btn btn-sm btn-danger btn-flat pull-right"><?php echo Language::$viewCode; ?></a><span class="pull-right">&nbsp;</span>
      <a href="?components=valid" class="btn btn-sm btn-warning btn-flat pull-right"><?php echo Language::$viewValid; ?></a><span class="pull-right">&nbsp;</span>
      <a href="?components=test" class="btn btn-sm btn-info btn-flat pull-right"><?php echo Language::$viewTest; ?></a><span class="pull-right">&nbsp;</span>
      <a href="?components=finish" class="btn btn-sm btn-success btn-flat pull-right"><?php echo Language::$viewFinish; ?></a><span class="pull-right">&nbsp;</span>
      <a href="?components=all" class="btn btn-sm btn-default btn-flat pull-right"><?php echo Language::$viewAll ?></a>
    </div>
    <!-- /.box-footer -->
  </div>
  <?php } ?>

</section>