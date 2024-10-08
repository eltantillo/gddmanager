<?php echo $this->renderPartial('_menu'); ?>
<?php echo $this->renderPartial('_menu2', array('model'=>$model)); ?>

<section class="content-header">
  <h1 class="hidden-xs"><?php echo Language::$games; ?> <small><?php echo Language::$projectUpdate; ?></small></h1>

  <ol class="breadcrumb">
    <li><a href="<?php echo URL;?>/"><i class="fa fa-dashboard"></i> <?php echo Language::$home; ?></a></li>
    <li><a href="<?php echo URL . '/project';?>"><?php echo Language::$projectList; ?></a></li>
    <li><a href="<?php echo URL . '/project/' . $model->id;?>"><?php echo $model->name; ?></a></li>
    <li><a href="<?php echo URL . '/project/technical/' . $model->id;?>"><?php echo Language::$technical; ?></a></li>
    <li class="active"><?php echo Language::$softwareComponents; ?></li>
  </ol>
</section>

<section class="content-header">
  <form method="POST">
  	<input type="hidden" name="create">
  	<button class="btn btn-success"><i class="fa fa-file-code-o"></i> <?php echo Language::$createNew . ' ' . Language::$softwareComponent; ?></button>
  </form>
</section>

<section class="content">
<?php foreach ($components as $component) { ?>

<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
  <!-- small box -->
  <div class="small-box bg-green">
    <div class="icon">
      <i class="fa fa-file-code-o"></i>
    </div>

    <div class="inner">
      <div class='info-box-text'><h3><p><?php echo $component->name ?></p></h3></div>
      <?php echo Functions::subString(strip_tags($component->description), 64); ?>
    </div>
    
    <a href="<?php echo URL . '/component/update/' . $component->id . '?project=' . $model->id;?>" class="small-box-footer">
      <?php echo Language::$edit; ?> <i class="fa fa-arrow-circle-right"></i>
    </a>
  </div>
</div>

<?php } ?>
</section>