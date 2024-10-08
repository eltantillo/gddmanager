<?php echo $this->renderPartial('_menu'); ?>
<section class="content-header">
  <h1 class="hidden-xs"><?php echo Language::$documents; ?> <small><?php echo Language::$documentList; ?></small></h1>

  <ol class="breadcrumb">
    <li><a href="<?php echo URL;?>/"><i class="fa fa-dashboard"></i> <?php echo Language::$home; ?></a></li>
    <li class="active"><?php echo Language::$documents; ?></li>
  </ol>
</section>

<?php if (count($projects) == 0){ ?>
<div class="jumbotron">
    <div class="container">
        <h1><?php echo Language::$noDocuments; ?></h1>
        <p><?php echo Language::$noDocumentsMessage; ?></p>
        <p><?php if(!Yii::app()->user->isGuest and (in_array('admin', Yii::app()->user->roles) or in_array('designer', Yii::app()->user->roles))){ echo Language::$noProjectsCreate; } ?></p>
    </div>
</div>
<?php } ?>

<section class="content">
  <div class="row">
    <?php
      foreach ($projects as $project) {
        $cover = file_exists($_SERVER['DOCUMENT_ROOT'] . Yii::app()->request->baseUrl . '/files/' . $project->company_id . '/' . $project->id . '/cover.png') ? URL . '/files/' . $project->company_id . '/' . $project->id . '/cover.png' : URL . '/img/cover.png';
        $banner = file_exists($_SERVER['DOCUMENT_ROOT'] . Yii::app()->request->baseUrl . '/files/' . $project->company_id . '/' . $project->id . '/banner.png') ? URL . '/files/' . $project->company_id . '/' . $project->id . '/banner.png' : false;
    ?>
    <div class="col-md-4">
      <div class="box box-widget widget-user">
        <!-- Add the bg color to the header using any of the bg-* classes -->
        <a href="<?php echo URL . '/documents/' . $project->id ?>">
        <div class="widget-user-header bg-green" <?php if ($banner){ ?>style="background: url('<?php echo $banner; ?>') center center;" <?php } ?>>
          <h3 class="widget-user-username"><?php echo $project->name; ?></h3>
          <h5 class="widget-user-desc"><?php echo $project->genre; ?></h5>
        </div>
        <div class="widget-user-image">
          <img class="img-circle" src="<?php echo $cover; ?>" alt="Project Cover">
        </div>
        </a>
        <div class="box-footer">
          <div class="row">
            <div class="col-sm-12">
              <div class="description-block">
                <?php echo Language::$version . ': ' . $project->version; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>
  </div>
</section>
