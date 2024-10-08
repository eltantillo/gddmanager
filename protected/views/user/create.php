<?php echo $this->renderPartial('_menu'); ?>

<section class="content-header">
  <h1 class="hidden-xs">
    <?php echo Language::$team; ?> <small><?php echo Language::$createMember; ?></small>
  </h1>

  <ol class="breadcrumb">
    <li><a href="<?php echo URL;?>/"><i class="fa fa-dashboard"></i> <?php echo Language::$home; ?></a></li>
    <li><a href="<?php echo URL . '/user';?>"><?php echo Language::$userList; ?></a></li>
    <li class="active"><?php echo Language::$create; ?></li>
  </ol>
</section>

<section class="content">
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</section>