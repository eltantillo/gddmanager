<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'specificSidebar')); ?>
<li class="active treeview">
  <a href="#">
    <i class="fa fa-user"></i> <span>
      <?php
        echo substr($model->email, 0, 22);
        if (strlen($model->email) > 22){
          echo '...';
        }
        ?>
    </span>
    <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
    <li <?php if(Yii::app()->controller->action->id == 'view') echo 'class="active"'  ?>><a href="<?php echo URL;?>/user/<?php echo $model->id;?>"><i class="fa fa-info-circle"></i> <?php echo Language::$information; ?></a></li>
    
    <?php if (in_array('admin', Yii::app()->user->roles) || Yii::app()->user->id == $model->id){?>
      <li <?php if(Yii::app()->controller->action->id == 'update') echo 'class="active"'  ?>><a href="<?php echo URL;?>/user/update/<?php echo $model->id;?>"><i class="fa fa-pencil-square-o"></i> <?php echo Language::$update; ?></a></li>

      <?php } if (in_array('admin', Yii::app()->user->roles) and count(User::model()->findAllbyAttributes(array('company_id'=>Yii::app()->user->company))) > 1){?>
      <li><?php echo CHtml::link('<i class="fa fa-ban"></i> ' . Language::$delete, array('user/delete', 'id'=>$model->id), array('onclick'=>'return confirm("' . Language::$confirmDelete . '")')); ?></li>
    <?php } ?>

  </ul>
</li>
<?php $this->endWidget();?>