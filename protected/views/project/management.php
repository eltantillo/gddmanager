<?php echo $this->renderPartial('_menu'); ?>
<?php echo $this->renderPartial('_menu2', array('model'=>$model)); ?>

<section class="content-header">
  <h1 class="hidden-xs"><?php echo Language::$games; ?> <small><?php echo Language::$projectUpdate; ?></small></h1>

  <ol class="breadcrumb">
    <li><a href="<?php echo URL;?>/"><i class="fa fa-dashboard"></i> <?php echo Language::$home; ?></a></li>
    <li><a href="<?php echo URL . '/project';?>"><?php echo Language::$projectList; ?></a></li>
    <li><a href="<?php echo URL . '/project/' . $model->id;?>"><?php echo $model->name; ?></a></li>
    <li class="active"><?php echo Language::$management; ?></li>
  </ol>
</section>

<section class="content">

<div class="text-center">
  <a href="<?php echo URL . '/project/tasks/' . $model->id;?>" class="btn btn-app bg-green">
    <span class="badge bg-red"><?php echo $tasks; ?></span>
    <i class="fa fa-tasks"></i> <?php echo Language::$tasks; ?>
  </a>
  
  <a href="<?php echo URL . '/project/resources/' . $model->id;?>" class="btn btn-app bg-green">
    <span class="badge bg-red"><?php echo $resources; ?></span>
    <i class="fa fa-cubes"></i> <?php echo Language::$resources; ?>
  </a>
</div>

<?php echo $this->renderPartial('_management', array(
	'model'=>$model,
  'sections'=>$sections,
	)); ?>
</section>