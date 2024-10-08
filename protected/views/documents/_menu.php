<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'globalSidebar')); ?>
<li class="<?php if(Yii::app()->controller->id === 'documents' && Yii::app()->controller->action->id === 'index') echo 'active' ?> treeview">
  <a href="#">
    <i class="fa fa-clone"></i> <span><?php echo Language::$games; ?></span>
    <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
    <li <?php if(Yii::app()->controller->id === 'documents' && Yii::app()->controller->action->id === 'index') echo 'class="active"'  ?>><a href="<?php echo URL; ?>/documents/index"><i class="fa fa-list-ol"></i> <?php echo Language::$projectList; ?></a></li>
    
    <?php if (!Yii::app()->user->isGuest and (in_array('admin', Yii::app()->user->roles) or in_array('designer', Yii::app()->user->roles))){?>
      <li <?php if(Yii::app()->controller->id === 'documents' && Yii::app()->controller->action->id === 'create') echo 'class="active"'  ?>><a href="<?php echo URL; ?>/project/create"><i class="fa fa-plus"></i> <?php echo Language::$newProject; ?></a></li>
    <?php } ?>
  </ul>
</li>
<?php $this->endWidget();?>