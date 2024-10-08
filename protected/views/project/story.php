<?php echo $this->renderPartial('_menu'); ?>
<?php echo $this->renderPartial('_menu2', array('model'=>$model)); ?>

<section class="content-header">
  <h1 class="hidden-xs"><?php echo Language::$games; ?> <small><?php echo Language::$projectUpdate; ?></small></h1>

  <ol class="breadcrumb">
    <li><a href="<?php echo URL;?>/"><i class="fa fa-dashboard"></i> <?php echo Language::$home; ?></a></li>
    <li><a href="<?php echo URL . '/project';?>"><?php echo Language::$projectList; ?></a></li>
    <li><a href="<?php echo URL . '/project/' . $model->id;?>"><?php echo $model->name; ?></a></li>
    <li class="active"><?php echo Language::$storyCharacters; ?></li>
  </ol>
</section>

<section class="content">

<div class="text-center">
  <a href="<?php echo URL . '/project/characters/' . $model->id;?>" class="btn btn-app bg-green">
    <span class="badge bg-red"><?php echo $characters; ?></span>
    <i class="fa fa-users"></i> <?php echo Language::$characters; ?>
  </a>

  <a href="<?php echo URL . '/project/cutscenes/' . $model->id;?>" class="btn btn-app bg-green">
    <span class="badge bg-red"><?php echo $cutscenes; ?></span>
    <i class="fa fa-video-camera"></i> <?php echo Language::$cutscenes; ?>
  </a>

  <a href="<?php echo URL . '/project/dialogs/' . $model->id;?>" class="btn btn-app bg-green">
    <span class="badge bg-red"><?php echo $dialogs; ?></span>
    <i class="fa fa-commenting-o"></i> <?php echo Language::$dialogs; ?>
  </a>
</div>

<?php echo $this->renderPartial('_story', array(
	'model'=>$model,
  'sections'=>$sections,
	)); ?>
</section>