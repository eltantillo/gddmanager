<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'globalSidebar')); ?>
<li class="<?php if(Yii::app()->controller->action->id == 'index' || Yii::app()->controller->action->id == 'create') echo 'active' ?> treeview">
  <a href="#">
    <i class="fa fa-users"></i> <span><?php echo Language::$team; ?></span>
    <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
    <li <?php if(Yii::app()->controller->action->id == 'index') echo 'class="active"'  ?>><a href="<?php echo URL; ?>/user/index"><i class="fa fa-list-ol"></i> <?php echo Language::$userList; ?></a></li>
    
    <?php if (in_array('admin', Yii::app()->user->roles)){?>
      <li <?php if(Yii::app()->controller->action->id == 'create') echo 'class="active"'  ?>><a href="<?php echo URL; ?>/user/create"><i class="fa fa-plus"></i> <?php echo Language::$newUser; ?></a></li>
    <?php } ?>
  </ul>
</li>
<?php $this->endWidget();?>