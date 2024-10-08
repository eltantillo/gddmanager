<section class="content-header">
  <h1 class="hidden-xs"><?php echo Language::$company; ?> <small><?php echo Language::$edit; ?></small></h1>

  <ol class="breadcrumb">
    <li><a href="<?php echo URL . '/';?>"><i class="fa fa-dashboard"></i> <?php echo Language::$home; ?></a></li>
    <li><a href="<?php echo URL . '/company';?>"><?php echo $model->name; ?></a></li>
    <li class="active"><?php echo Language::$edit; ?></li>
  </ol>
</section>

<section class="content">
<?php echo $this->renderPartial('_form', array(
  'model'      => $model,
)); ?>
</section>