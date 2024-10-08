<?php
$story = Yii::app()->controller->action->id === 'story' ||
         Yii::app()->controller->action->id === 'characters' ||
         Yii::app()->controller->action->id === 'enviroment' ||
         Yii::app()->controller->action->id === 'cutscenes' ||
         Yii::app()->controller->action->id === 'dialogs' ||
         Yii::app()->controller->id === 'character' ||
         Yii::app()->controller->id === 'enviroment' ||
         Yii::app()->controller->id === 'cutscene' ||
         Yii::app()->controller->id === 'dialog';

$levels = Yii::app()->controller->action->id === 'areaslevels' ||
          Yii::app()->controller->action->id === 'areas' ||
          Yii::app()->controller->action->id === 'levels' ||
          Yii::app()->controller->id === 'area' ||
          Yii::app()->controller->id === 'level';

$interface = Yii::app()->controller->action->id === 'interface' ||
             Yii::app()->controller->action->id === 'screens' ||
             Yii::app()->controller->action->id === 'sounds' ||
             Yii::app()->controller->action->id === 'music' ||
             Yii::app()->controller->id === 'screen' ||
             Yii::app()->controller->id === 'sound' ||
             Yii::app()->controller->id === 'music';

$technical = Yii::app()->controller->action->id === 'technical' ||
             Yii::app()->controller->action->id === 'components' ||
             Yii::app()->controller->id === 'component';

$art = Yii::app()->controller->action->id === 'art' ||
       Yii::app()->controller->action->id === 'graphics' ||
       Yii::app()->controller->id === 'graphic';

$management = Yii::app()->controller->action->id === 'management' ||
       Yii::app()->controller->action->id === 'resources' ||
       Yii::app()->controller->id === 'resource' ||
       Yii::app()->controller->action->id === 'tasks' ||
       Yii::app()->controller->id === 'task';

$this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'specificSidebar'));

$admin      = in_array('admin', Yii::app()->user->roles) or Yii::app()->user->id != $model->leader_id;
$designer   = in_array('designer', Yii::app()->user->roles);
$artist     = in_array('artist', Yii::app()->user->roles);
$programmer = in_array('programmer', Yii::app()->user->roles);
$composer   = in_array('composer', Yii::app()->user->roles);
$writer     = in_array('writer', Yii::app()->user->roles);
$tester     = in_array('tester', Yii::app()->user->roles);
?>

<li class="active treeview">
  <a href="#">
    <i class="fa fa-gamepad"></i> <span><?php echo Functions::subString($model->name, 22) ?></span>
    <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
    <li <?php if(Yii::app()->controller->action->id === 'view') echo 'class="active"'  ?>><a href="<?php echo URL;?>/project/<?php echo $model->id;?>"><i class="fa fa-info-circle"></i> <?php echo Language::$information; ?></a></li>
    <li <?php if(Yii::app()->controller->action->id === 'devlogs' or Yii::app()->controller->id === 'devlog') echo 'class="active"'; ?> data-step="2" data-intro="<?php echo Language::$projectHelp2; ?>" data-position="right"><a href="<?php echo URL;?>/project/devlogs/<?php echo $model->id;?>"><i class="fa fa-newspaper-o"></i> <?php echo Language::$devlogs; ?></a></li>
    <!-- Tasks -->
      <li class="treeview <?php
      if(
        Yii::app()->controller->action->id === 'characters' ||
        Yii::app()->controller->action->id === 'enviroment' ||
        Yii::app()->controller->action->id === 'graphics' ||
        Yii::app()->controller->action->id === 'sounds' ||
        Yii::app()->controller->action->id === 'music' ||
        Yii::app()->controller->action->id === 'components' ||
        Yii::app()->controller->action->id === 'screens' ||
        Yii::app()->controller->action->id === 'cutscenes' ||
        Yii::app()->controller->action->id === 'areas' ||
        Yii::app()->controller->action->id === 'levels' ||
        Yii::app()->controller->action->id === 'dialogs' ||
        Yii::app()->controller->action->id === 'tasks' ||
        Yii::app()->controller->id === 'character' ||
        Yii::app()->controller->id === 'enviroment' ||
        Yii::app()->controller->id === 'graphic' ||
        Yii::app()->controller->id === 'sound' ||
        Yii::app()->controller->id === 'music' ||
        Yii::app()->controller->id === 'component' ||
        Yii::app()->controller->id === 'screen' ||
        Yii::app()->controller->id === 'cutscene' ||
        Yii::app()->controller->id === 'area' ||
        Yii::app()->controller->id === 'level' ||
        Yii::app()->controller->id === 'dialog' ||
        Yii::app()->controller->id === 'task'
      )

        echo ' active' ?>" data-step="3" data-intro="<?php echo Language::$projectHelp3; ?>" data-position="right">
        <a href="#">
          <i class="fa fa-tasks"></i> <span><?php echo Language::$resourcesTasks; ?></span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <?php if ($admin or $designer or $artist){ ?>
            <li <?php if (Yii::app()->controller->action->id === 'graphics' or Yii::app()->controller->id === 'graphic') echo 'class="active"'; ?> ><a href="<?php echo URL; ?>/project/graphics/<?php echo $model->id; ?>"><i class="fa fa-image"></i> <?php echo Language::$graphics; ?></a></li>
          <?php } if ($admin or $designer or $composer){ ?>
            <li <?php if (Yii::app()->controller->action->id === 'sounds' or Yii::app()->controller->id === 'sound') echo 'class="active"'; ?> ><a href="<?php echo URL; ?>/project/sounds/<?php echo $model->id; ?>"><i class="fa fa-volume-up"></i> <?php echo Language::$sounds; ?></a></li>
          <?php } if ($admin or $designer or $composer){ ?>
            <li <?php if (Yii::app()->controller->action->id === 'music' or Yii::app()->controller->id === 'music') echo 'class="active"'; ?> ><a href="<?php echo URL; ?>/project/music/<?php echo $model->id; ?>"><i class="fa fa-music"></i> <?php echo Language::$music; ?></a></li>
          <?php } if ($admin or $designer or $writer){ ?>
            <li <?php if (Yii::app()->controller->action->id === 'dialogs' or Yii::app()->controller->id === 'dialog') echo 'class="active"'; ?> ><a href="<?php echo URL; ?>/project/dialogs/<?php echo $model->id; ?>"><i class="fa fa-commenting-o"></i> <?php echo Language::$dialogs; ?></a></li>
          <?php } if ($admin or $designer or $programmer){ ?>
            <li <?php if (Yii::app()->controller->action->id === 'screens' or Yii::app()->controller->id === 'screen') echo 'class="active"'; ?> ><a href="<?php echo URL; ?>/project/screens/<?php echo $model->id; ?>"><i class="fa fa-desktop"></i> <?php echo Language::$screens; ?></a></li>
          <?php } if ($admin or $designer or $writer){ ?>
            <li <?php if (Yii::app()->controller->action->id === 'cutscenes' or Yii::app()->controller->id === 'cutscene') echo 'class="active"'; ?> ><a href="<?php echo URL; ?>/project/cutscenes/<?php echo $model->id; ?>"><i class="fa fa-video-camera"></i> <?php echo Language::$cutscenes; ?></a></li>
          <?php } if ($admin or $designer or $writer){ ?>
            <li <?php if (Yii::app()->controller->action->id === 'areas' or Yii::app()->controller->id === 'area') echo 'class="active"'; ?> ><a href="<?php echo URL; ?>/project/areas/<?php echo $model->id; ?>"><i class="fa fa-map-o"></i> <?php echo Language::$areas; ?></a></li>
          <?php } if ($admin or $designer or $writer){ ?>
            <li <?php if (Yii::app()->controller->action->id === 'levels' or Yii::app()->controller->id === 'level') echo 'class="active"'; ?> ><a href="<?php echo URL; ?>/project/levels/<?php echo $model->id; ?>"><i class="fa fa-map-signs"></i> <?php echo Language::$levels; ?></a></li>
          <?php } if ($admin or $designer or $programmer){ ?>
            <li <?php if (Yii::app()->controller->action->id === 'components' or Yii::app()->controller->id === 'component') echo 'class="active"'; ?> ><a href="<?php echo URL; ?>/project/components/<?php echo $model->id; ?>"><i class="fa fa-file-code-o"></i> <?php echo Language::$softwareComponents; ?></a></li>
          <?php } if ($admin or $designer or $writer){ ?>
            <li <?php if (Yii::app()->controller->action->id === 'characters' or Yii::app()->controller->id === 'character') echo 'class="active"'; ?> ><a href="<?php echo URL; ?>/project/characters/<?php echo $model->id; ?>"><i class="fa fa-users"></i> <?php echo Language::$characters; ?></a></li>
          <?php } if ($admin or $designer or $writer){ ?>
            <li <?php if (Yii::app()->controller->action->id === 'enviroment' or Yii::app()->controller->id === 'enviroment') echo 'class="active"'; ?> ><a href="<?php echo URL; ?>/project/enviroment/<?php echo $model->id; ?>"><i class="fa fa-futbol-o"></i> <?php echo Language::$enviromentObjects; ?></a></li>
          <?php } if ($admin or $designer){ ?>
            <li <?php if (Yii::app()->controller->action->id === 'tasks' or Yii::app()->controller->id === 'task') echo 'class="active"'; ?> ><a href="<?php echo URL; ?>/project/tasks/<?php echo $model->id; ?>"><i class="fa fa-tasks"></i> <?php echo Language::$tasks; ?></a></li>
          <?php } ?>
        </ul>
    </li>

    <!-- Sections -->
    <li class="treeview<?php
      if(
        Yii::app()->controller->action->id === 'overview' ||
        Yii::app()->controller->action->id === 'gameplay' ||
        $story ||
        $levels ||
        $interface ||
        $technical ||
        $art ||
        $management
      )

        echo ' active' ?>">
      <a href="#">
        <i class="fa fa-pencil-square-o"></i> <span><?php echo Language::$documents; ?></span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <?php if ($admin or $designer){ ?>
          <li <?php if(Yii::app()->controller->action->id === 'overview') echo 'class="active"'  ?>><a href="<?php echo URL;?>/project/overview/<?php echo $model->id;?>"><i class="fa fa-list"></i> <?php echo Language::$overview; ?></a></li>
        <?php } if ($admin or $designer){ ?>
          <li <?php if(Yii::app()->controller->action->id === 'gameplay') echo 'class="active"'  ?>><a href="<?php echo URL;?>/project/gameplay/<?php echo $model->id;?>"><i class="fa fa-gamepad"></i> <?php echo Language::$gameplayMechanics; ?></a></li>
        <?php } if ($admin or $designer or $writer){ ?>
          <li <?php if($story) echo 'class="active"'  ?>><a href="<?php echo URL;?>/project/story/<?php echo $model->id;?>"><i class="fa fa-user"></i> <?php echo Language::$storyCharacters; ?></a></li>
        <?php } if ($admin or $designer or $writer){ ?>
          <li <?php if($levels) echo 'class="active"'  ?>><a href="<?php echo URL;?>/project/areaslevels/<?php echo $model->id;?>"><i class="fa fa-map-o"></i> <?php echo Language::$areasLevels; ?></a></li>
        <?php } if ($admin or $designer or $programmer){ ?>
          <li <?php if($interface) echo 'class="active"'  ?>><a href="<?php echo URL;?>/project/interface/<?php echo $model->id;?>"><i class="fa fa-desktop"></i> <?php echo Language::$interface; ?></a></li>
        <?php } if ($admin or $designer or $programmer){ ?>
          <li <?php if($technical) echo 'class="active"'  ?>><a href="<?php echo URL;?>/project/technical/<?php echo $model->id;?>"><i class="fa fa-code"></i> <?php echo Language::$technical; ?></a></li>
        <?php } if ($admin or $designer or $artist){ ?>
          <li <?php if($art) echo 'class="active"'  ?>><a href="<?php echo URL;?>/project/art/<?php echo $model->id;?>"><i class="fa fa-image"></i> <?php echo Language::$gameArt; ?></a></li>
        <?php } if ($admin or $designer){ ?>
          <li <?php if($management) echo 'class="active"'  ?>><a href="<?php echo URL;?>/project/management/<?php echo $model->id;?>"><i class="fa fa-dashboard"></i> <?php echo Language::$management; ?></a></li>
        <?php } ?>
      </ul>

    <!-- Delete -->
    <?php if ($admin){?>
      <li><?php echo CHtml::link('<i class="fa fa-ban"></i>' . Language::$delete, array('project/delete', 'id'=>$model->id), array('onclick'=>'return confirm("' . Language::$confirmDelete . '")')); ?></li>
    <?php } ?>
  </ul>
</li>
<?php $this->endWidget();?>