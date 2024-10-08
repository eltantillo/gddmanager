<?php echo $this->renderPartial('_menu'); ?>
<?php echo $this->renderPartial('_menu2', array('model'=>$model)); ?>

<section class="content-header">
  <h1 class="hidden-xs"><?php echo Language::$team; ?> <small><?php echo Language::$updateMember; ?></small></h1>

  <ol class="breadcrumb">
    <li><a href="<?php echo URL;?>/"><i class="fa fa-dashboard"></i> <?php echo Language::$home; ?></a></li>
    <li><a href="<?php echo URL . '/user';?>"><?php echo Language::$userList; ?></a></li>
    <li><a href="<?php echo URL . '/user/' . $model->id;?>"><?php echo $model->name != '' ? $model->name : $model->email; ?></a></li>
    <li><?php echo Language::$update; ?></li>
  </ol>
</section>

<section class="content">
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</section>