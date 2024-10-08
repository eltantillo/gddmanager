<?php
$filter = isset($_GET['graphics'])   || Yii::app()->controller->action->id === 'graphic' ||
          isset($_GET['sounds'])     || Yii::app()->controller->action->id === 'sound' ||
          isset($_GET['music'])      || Yii::app()->controller->action->id === 'music' ||
          isset($_GET['components']) || Yii::app()->controller->action->id === 'component' ||
          isset($_GET['bugs'])       || Yii::app()->controller->action->id === 'bug' ||
          isset($_GET['screens'])    || Yii::app()->controller->action->id === 'screen' ||
          isset($_GET['cutscenes'])  || Yii::app()->controller->action->id === 'cutscene' ||
          isset($_GET['levels'])     || Yii::app()->controller->action->id === 'level' ||
          isset($_GET['dialogs'])    || Yii::app()->controller->action->id === 'dialog' ||
          isset($_GET['tasks'])      || Yii::app()->controller->action->id === 'task';

$this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'specificSidebar'));
?>
<li class="active treeview">
  <a href="#">
    <i class="fa fa-gamepad"></i> <span><?php echo Functions::subString($project->name, 22) ?></span>
    <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
    <li <?php if(Yii::app()->controller->action->id === 'view' && !$filter and !isset($_GET['bugreport'])) echo 'class="active"';  ?> ><a href="<?php echo URL; ?>/development/<?php echo $project->id; ?>"><i class="fa fa-list-ol"></i> <?php echo Language::$taskstodo; ?></a></li>
    <?php if (in_array('admin', Yii::app()->user->roles) or in_array('designer', Yii::app()->user->roles)){?>
      <li class="treeview<?php if($filter) echo ' active';  ?>" data-step="2" data-intro="<?php echo Language::$developmentHelp2; ?>" data-position="right">
        <a href="#">
          <i class="fa fa-search"></i> <span><?php echo Language::$filter; ?></span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li <?php if (isset($_GET['graphics']) or Yii::app()->controller->action->id === 'graphic') echo 'class="active"'; ?> ><a href="<?php echo URL; ?>/development/<?php echo $project->id; ?>?graphics=all"><i class="fa fa-image"></i> <?php echo Language::$graphics; ?></a></li>
          <li <?php if (isset($_GET['sounds']) or Yii::app()->controller->action->id === 'sound') echo 'class="active"'; ?> ><a href="<?php echo URL; ?>/development/<?php echo $project->id; ?>?sounds=all"><i class="fa fa-volume-up"></i> <?php echo Language::$sounds; ?></a></li>
          <li <?php if (isset($_GET['music']) or Yii::app()->controller->action->id === 'music') echo 'class="active"'; ?> ><a href="<?php echo URL; ?>/development/<?php echo $project->id; ?>?music=all"><i class="fa fa-music"></i> <?php echo Language::$music; ?></a></li>
          <li <?php if (isset($_GET['components']) or Yii::app()->controller->action->id === 'component') echo 'class="active"'; ?> ><a href="<?php echo URL; ?>/development/<?php echo $project->id; ?>?components=all"><i class="fa fa-file-code-o"></i> <?php echo Language::$softwareComponents; ?></a></li>
          <li <?php if (isset($_GET['bugs']) or Yii::app()->controller->action->id === 'bug') echo 'class="active"'; ?> ><a href="<?php echo URL; ?>/development/<?php echo $project->id; ?>?bugs=all"><i class="fa fa-bug"></i> <?php echo Language::$bugs; ?></a></li>
          <li <?php if (isset($_GET['screens']) or Yii::app()->controller->action->id === 'screen') echo 'class="active"'; ?> ><a href="<?php echo URL; ?>/development/<?php echo $project->id; ?>?screens=all"><i class="fa fa-desktop"></i> <?php echo Language::$screens; ?></a></li>
          <li <?php if (isset($_GET['cutscenes']) or Yii::app()->controller->action->id === 'cutscene') echo 'class="active"'; ?> ><a href="<?php echo URL; ?>/development/<?php echo $project->id; ?>?cutscenes=all"><i class="fa fa-video-camera"></i> <?php echo Language::$cutscenes; ?></a></li>
          <li <?php if (isset($_GET['levels']) or Yii::app()->controller->action->id === 'level') echo 'class="active"'; ?> ><a href="<?php echo URL; ?>/development/<?php echo $project->id; ?>?levels=all"><i class="fa fa-map-signs"></i> <?php echo Language::$levels; ?></a></li>
          <li <?php if (isset($_GET['dialogs']) or Yii::app()->controller->action->id === 'dialog') echo 'class="active"'; ?> ><a href="<?php echo URL; ?>/development/<?php echo $project->id; ?>?dialogs=all"><i class="fa fa-commenting-o"></i> <?php echo Language::$dialogs; ?></a></li>
          <li <?php if (isset($_GET['tasks']) or Yii::app()->controller->action->id === 'task') echo 'class="active"'; ?> ><a href="<?php echo URL; ?>/development/<?php echo $project->id; ?>?tasks=all"><i class="fa fa-tasks"></i> <?php echo Language::$tasks; ?></a></li>
        </ul>
      </li>
    <?php } ?>
    
    <li <?php if (isset($_GET['bugreport'])) echo 'class="active"'; ?> ><a href="<?php echo URL; ?>/development/<?php echo $project->id; ?>?bugreport"><i class="fa fa-bug"></i> <?php echo Language::$reportBug; ?></a></li>
    <?php if (in_array('admin', Yii::app()->user->roles) or in_array('designer', Yii::app()->user->roles)){ ?>
      <li data-step="3" data-intro="<?php echo Language::$developmentHelp3; ?>" data-position="right"><a href="<?php echo URL; ?>/project/<?php echo $project->id; ?>"><i class="fa fa-edit"></i> <?php echo Language::$projectDetail; ?></a></li>
    <?php } ?>
    <!--li><a><i class="fa fa-clock-o"></i> <?php echo Language::$timesheets; ?></a></li-->
  </ul>
</li>
<?php $this->endWidget();?>