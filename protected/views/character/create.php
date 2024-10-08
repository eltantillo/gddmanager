<?php echo $this->renderPartial('//project/_menu'); ?>
<?php echo $this->renderPartial('//project/_menu2', array('model'=>$project)); ?>


<section class="content-header">
  <h1 class="hidden-xs"><?php echo Language::$games; ?> <small><?php echo Language::$projectUpdate; ?></small></h1>

  <ol class="breadcrumb">
    <li><a href="<?php echo URL . '/';?>"><i class="fa fa-dashboard"></i> <?php echo Language::$home; ?></a></li>
    <li><a href="<?php echo URL . '/project';?>"><?php echo Language::$projectList; ?></a></li>
    <li><a href="<?php echo URL . '/project/' . $project->id;?>"><?php echo $project->name; ?></a></li>
    <li><a href="<?php echo URL . '/project/story/' . $project->id;?>"><?php echo Language::$storyCharacters; ?></a></li>
    <li><a href="<?php echo URL . '/project/characters/' . $project->id;?>"><?php echo Language::$characters; ?></a></li>
    <li class="active"><?php echo Language::$create; ?></li>
  </ol>
</section>

<section class="content">
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</section>