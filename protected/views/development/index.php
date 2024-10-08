<?php echo $this->renderPartial('_menu'); ?>

<section class="content-header">
  <h1 class="hidden-xs"><?php echo Language::$development; ?> <small><?php echo Language::$projectList; ?></small></h1>

  <ol class="breadcrumb">
    <li><a href="<?php echo URL;?>/"><i class="fa fa-dashboard"></i> <?php echo Language::$home; ?></a></li>
    <li class="active"><?php echo Language::$development; ?></li>
  </ol>
</section>

<?php if (count($projects) == 0){ ?>
<div class="jumbotron">
    <div class="container">
        <h1><?php echo Language::$noProjects; ?></h1>
        <p><?php echo Language::$noProjectsMessage; ?></p>
        <p><?php if(in_array('admin', Yii::app()->user->roles) or in_array('designer', Yii::app()->user->roles)){ echo Language::$noProjectsCreate; } ?></p>
    </div>
</div>
<?php } ?>

<section class="content">
  <div class="row">

    <?php
    foreach ($projects as $project) {
      $totalTasks = 0;
      $completedTasks = 0;
      $bugs       = Bug::model()->findAllbyAttributes(array('project_id' => $project->id));
      $components = Component::model()->findAllbyAttributes(array('project_id' => $project->id));
      $custcenes  = Cutscene::model()->findAllbyAttributes(array('project_id' => $project->id));
      $dialogs    = Dialog::model()->findAllbyAttributes(array('project_id' => $project->id));
      $graphics   = Graphic::model()->findAllbyAttributes(array('project_id' => $project->id));
      $levels     = Level::model()->findAllbyAttributes(array('project_id' => $project->id));
      $musics     = Music::model()->findAllbyAttributes(array('project_id' => $project->id));
      $sounds     = Sound::model()->findAllbyAttributes(array('project_id' => $project->id));
      $tasks      = Task::model()->findAllbyAttributes(array('project_id' => $project->id));
    	
    	foreach($bugs       as $bug){       $totalTasks += 1;                    if ($bug->test){       $completedTasks += 1; }}
    	foreach($components as $component){ $totalTasks += $component->time_est; if ($component->test){ $completedTasks += $component->time_est; }}
    	foreach($custcenes  as $custcene){  $totalTasks += $custcene->time_est;  if ($custcene->test){  $completedTasks += $custcene->time_est; }}
    	foreach($dialogs    as $dialog){    $totalTasks += $dialog->time_est;    if ($dialog->test){    $completedTasks += $dialog->time_est; }}
    	foreach($graphics   as $graphic){   $totalTasks += $graphic->time_est;   if ($graphic->finish){ $completedTasks += $graphic->time_est; }}
    	foreach($levels     as $level){     $totalTasks += $level->time_est;     if ($level->test){     $completedTasks += $level->time_est; }}
    	foreach($musics     as $music){     $totalTasks += $music->time_est;     if ($music->valid){    $completedTasks += $music->time_est; }}
    	foreach($sounds     as $sound){     $totalTasks += $sound->time_est;     if ($sound->valid){    $completedTasks += $sound->time_est; }}
    	foreach($tasks      as $task){      $totalTasks += 1;                    if ($task->finish){    $completedTasks += 1; }}
    	
    	if ($totalTasks == 0){$totalTasks = 1;}
    	$percent = sprintf("%.2f%%", ($completedTasks * 100) / $totalTasks);
      
      $cover = file_exists($_SERVER['DOCUMENT_ROOT'] . Yii::app()->request->baseUrl . '/files/' . $project->company_id . '/' . $project->id . '/cover.png') ? URL . '/files/' . $project->company_id . '/' . $project->id . '/cover.png' : URL . '/img/cover.png';
      $banner = file_exists($_SERVER['DOCUMENT_ROOT'] . Yii::app()->request->baseUrl . '/files/' . $project->company_id . '/' . $project->id . '/banner.png') ? URL . '/files/' . $project->company_id . '/' . $project->id . '/banner.png' : false;
    ?>
    <div class="col-md-4">
      <div class="box box-widget widget-user">
        <!-- Add the bg color to the header using any of the bg-* classes -->
        <a href="<?php echo URL . '/development/' . $project->id ?>">
        <div class="widget-user-header bg-green"  <?php if ($banner){ ?>style="background: url('<?php echo $banner; ?>') center center;" <?php } ?>>
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
    
                <div class="progress active">
                    <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $percent; ?>"></div>
                </div>
                <strong><?php echo $percent; ?> <?php echo Language::$completed; ?></strong>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>
  </div>
</section>