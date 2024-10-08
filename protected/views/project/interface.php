<?php echo $this->renderPartial('_menu'); ?>
<?php echo $this->renderPartial('_menu2', array('model'=>$model)); ?>

<section class="content-header">
  <h1 class="hidden-xs"><?php echo Language::$games; ?> <small><?php echo Language::$projectUpdate; ?></small></h1>

  <ol class="breadcrumb">
    <li><a href="<?php echo URL;?>/"><i class="fa fa-dashboard"></i> <?php echo Language::$home; ?></a></li>
    <li><a href="<?php echo URL . '/project';?>"><?php echo Language::$projectList; ?></a></li>
    <li><a href="<?php echo URL . '/project/' . $model->id;?>"><?php echo $model->name; ?></a></li>
    <li class="active"><?php echo Language::$interface; ?></li>
  </ol>
</section>

<section class="content">

<div class="text-center">
  <a href="<?php echo URL . '/project/screens/' . $model->id;?>" class="btn btn-app bg-green">
    <span class="badge bg-red"><?php echo $screens; ?></span>
    <i class="fa fa-desktop"></i> <?php echo Language::$screens; ?>
  </a>

  <a href="<?php echo URL . '/project/sounds/' . $model->id;?>" class="btn btn-app bg-green">
    <span class="badge bg-red"><?php echo $sounds; ?></span>
    <i class="fa fa-volume-up"></i> <?php echo Language::$sounds; ?>
  </a>

  <a href="<?php echo URL . '/project/music/' . $model->id;?>" class="btn btn-app bg-green">
    <span class="badge bg-red"><?php echo $music; ?></span>
    <i class="fa fa-music"></i> <?php echo Language::$music; ?>
  </a>
</div>

<?php echo $this->renderPartial('_interface', array(
	'model'=>$model,
  'sections'=>$sections,
	)); ?>
</section>