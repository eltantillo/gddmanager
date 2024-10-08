<?php echo $this->renderPartial('_menu'); ?>

<section class="content-header">
  <h1 class="hidden-xs">Game Projects <small>Create Game Project</small></h1>

  <ol class="breadcrumb">
    <li><a href="<?php echo URL;?>/"><i class="fa fa-dashboard"></i> <?php echo Language::$home; ?></a></li>
    <li><a href="<?php echo URL . '/project';?>">Game Projects</a></li>
    <li class="active"><?php echo Language::$create; ?></li>
  </ol>
</section>

<section class="content">
<?php echo $this->renderPartial('_create', array(
	'model'    => $model,
	'users'    => $users,
	)); ?>
</section>