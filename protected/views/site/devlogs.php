<section class="content-header">
	<h1 class="hidden-xs"><?php echo Language::$games; ?> <small><?php echo Language::$devlogs; ?></small></h1>

	<ol class="breadcrumb">
		<li><a href="<?php echo URL;?>/"><i class="fa fa-dashboard"></i> <?php echo Language::$home; ?></a></li>
		<li><?php echo Language::$devlogs; ?></li>
	</ol>
</section>

<section class="content">
    
    <div class="row">
        <?php
          foreach ($models as $model) {
			$project = Project::model()->findbyPk($model->project_id);
            $cover = file_exists($_SERVER['DOCUMENT_ROOT'] . Yii::app()->request->baseUrl . '/files/' . $project->company_id . '/' . $project->id . '/cover.png') ? URL . '/files/' . $project->company_id . '/' . $project->id . '/cover.png' : URL . '/img/cover.png';
            $banner = file_exists($_SERVER['DOCUMENT_ROOT'] . Yii::app()->request->baseUrl . '/files/' . $project->company_id . '/' . $project->id . '/banner.png') ? URL . '/files/' . $project->company_id . '/' . $project->id . '/banner.png' : false;
        ?>
        <div class="col-md-4">
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <a href="<?php echo URL . '/site/devlogs/' . $model->id ?>">
            <div class="widget-user-header bg-green" <?php if ($banner){ ?>style="background: url('<?php echo $banner; ?>') center center;" <?php } ?>>
              <h3 class="widget-user-username"><?php echo $model->title; ?></h3>
              <h5 class="widget-user-desc"><?php echo $project->name; ?></h5>
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="<?php echo $cover; ?>" alt="Project Cover">
            </div>
            </a>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-12">
                  <div class="description-block">
                      <!-- Description or something -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>

</section>