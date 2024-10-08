<?php echo $this->renderPartial('_menu'); ?>
<?php echo $this->renderPartial('_menu2', array('model'=>$model)); ?>

<section class="content-header">
  <h1 class="hidden-xs"><?php echo Language::$games; ?> <small><?php echo Language::$projectUpdate; ?></small></h1>

  <ol class="breadcrumb">
    <li><a href="<?php echo URL;?>/"><i class="fa fa-dashboard"></i> <?php echo Language::$home; ?></a></li>
    <li><a href="<?php echo URL . '/project';?>"><?php echo Language::$projectList; ?></a></li>
    <li><a href="<?php echo URL . '/project/' . $model->id;?>"><?php echo $model->name; ?></a></li>
    <li class="active"><?php echo Language::$areasLevels; ?></li>
  </ol>
</section>

<section class="content">
<div class="text-center">
  <a href="<?php echo URL . '/project/areas/' . $model->id;?>" class="btn btn-app bg-green">
    <span class="badge bg-red"><?php echo $areas; ?></span>
    <i class="fa fa-map-o"></i> <?php echo Language::$areas; ?>
  </a>

  <a href="<?php echo URL . '/project/levels/' . $model->id;?>" class="btn btn-app bg-green">
    <span class="badge bg-red"><?php echo $levels; ?></span>
    <i class="fa fa-map-signs"></i> <?php echo Language::$levels; ?>
  </a>

  <a href="<?php echo URL . '/project/enviroment/' . $model->id;?>" class="btn btn-app bg-green">
    <span class="badge bg-red"><?php echo $enviroment; ?></span>
    <i class="fa fa-futbol-o"></i> <?php echo Language::$enviromentObjects; ?>
  </a>
</div>

<?php echo $this->renderPartial('_areaslevels', array(
	'model'=>$model,
  'sections'=>$sections,
	)); ?>
</section>