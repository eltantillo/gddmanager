<?php
$this->pageTitle=Yii::app()->name;

$bg = array('255487.jpg', '255572.jpg', '255661.jpg', '255801.jpg', '440236.jpg', '440354.jpg', '440365.jpg', '440459.jpg', '440583.jpg', '440939.jpg', '441443.jpg', '440563.jpg' ); // array of filenames
$i = rand(0, count($bg)-1); // generate random number size of the array
$selectedBg = "$bg[$i]"; // set variable equal to which random filename was chosen
?>

<div class="white-bg">
    <div class="site-top" style="background-image: url(<?php echo URL . '/img/website/' . $selectedBg; ?>);">
    	<div class="site-header">
    		<div class="welcome-text">
    			<img src="<?php echo URL; ?>/img/favicon.png" alt="Game Design Document Logo" width="150px">
    			<h1><?php echo Language::$gddeasy; ?></h1>
    			<h3><span><?php echo Language::$mainSlogan; ?></span></h3>
    			<br/><br/>
    			<a href="<?php echo URL; ?>/site/register" class="btn btn-success btn-lg"><?php echo Language::$register; ?></a>
    			<a href="<?php echo URL; ?>/site/login" class="btn btn-danger btn-lg"><?php echo Language::$login; ?></a>
        	</div>
    	</div>
    </div>

    <section class="content">
        <br/><br/>
        <!--div  class="text-center">
            <h3>Games</h3>
        </div-->
        
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
      
        <div class="text-center">
            <a href="<?php echo URL; ?>/documents/" class="btn btn-warning btn-lg"><?php echo Language::$viewAllGames; ?></a>
        </div>
    </section>
    
    
    <section class="site-secondary">
        <br/><br/><br/><br/>
        <div  class="text-center">
            <h3><?php echo Language::$features; ?></h3>
        </div>
        <div class="text-center">
            <div class="row">
            	<div class="col-md-4">
            	    <i class="fa fa-list-ol big-icon"></i>
            	    <h2><?php echo Language::$backlog; ?></h2>
            	    <h4 class="features"><?php echo Language::$backlogDesc; ?></h4>
            	</div>
            	<!--div class="col-md-4">
            	    <i class="fa fa-flag-checkered big-icon"></i>
            	    <h2><?php echo Language::$iterariveDesign; ?></h2>
            	    <h4 class="features"><?php echo Language::$iterariveDesignDesc; ?></h4>
            	</div-->
            	<div class="col-md-4">
            	    <i class="fa fa-globe big-icon"></i>
            	    <h2><?php echo Language::$visibility; ?></h2>
            	    <h4 class="features"><?php echo Language::$visibilityDesc; ?></h4>
            	</div>
            	<div class="col-md-4">
            	    <i class="fa fa-comments-o big-icon"></i>
            	    <h2><?php echo Language::$messaging; ?></h2>
            	    <h4 class="features"><?php echo Language::$messagingDesc; ?></h4>
            	</div>
            </div>
            <div class="row">
            	<div class="col-md-4">
            	    <i class="fa fa-edit big-icon"></i>
            	    <h2><?php echo Language::$customization; ?></h2>
            	    <h4 class="features"><?php echo Language::$customizationDesc; ?></h4>
            	</div>
            	<div class="col-md-4">
            	    <i class="fa fa-clock-o big-icon"></i>
            	    <h2><?php echo Language::$timesheets; ?></h2>
            	    <h4 class="features"><?php echo Language::$timesheetsDesc; ?></h4>
            	</div>
            	<div class="col-md-4">
            	    <i class="fa fa-paperclip big-icon"></i>
            	    <h2><?php echo Language::$attachments; ?></h2>
            	    <h4 class="features"><?php echo Language::$attachmentsDesc; ?></h4>
            	</div>
            </div>
            <div class="row">
            	<div class="col-md-4">
            	    <i class="fa fa-credit-card big-icon"></i>
            	    <h2><?php echo Language::$referralsProgram; ?></h2>
            	    <h4 class="features"><?php echo Language::$referralsProgramDesc; ?></h4>
            	</div>
            	<div class="col-md-4">
            	    <i class="fa fa-share-alt big-icon"></i>
            	    <h2><?php echo Language::$share; ?></h2>
            	    <h4 class="features"><?php echo Language::$shareDesc; ?></h4>
            	</div>
            	<div class="col-md-4">
            	    <i class="fa fa-question-circle big-icon"></i>
            	    <h2><?php echo Language::$support; ?></h2>
            	    <h4 class="features"><?php echo Language::$supportDesc; ?></h4>
            	</div>
            	<!--div class="col-md-4">
            	    <i class="fa fa-flag-checkered big-icon"></i>
            	    <h2><?php echo Language::$integrations; ?></h2>
            	    <h4 class="features"><?php echo Language::$integrationsDesc; ?></h4>
            	</div>
            	<div class="col-md-4">
            	    <i class="fa fa-pie-chart big-icon"></i>
            	    <h2><?php echo Language::$reports; ?></h2>
            	    <h4 class="features"><?php echo Language::$reportsDesc; ?></h4>
            	</div>
            	<div class="col-md-4">
            	    <i class="fa fa-globe big-icon"></i>
            	    <h2><?php echo Language::$visibility; ?></h2>
            	    <h4 class="features"><?php echo Language::$visibilityDesc; ?></h4>
            	</div-->
            </div>
            <div class="row">
            	<div class="col-md-12">
                    <br/><br/>
            	    <?php echo Language::$gddIsFree; ?>
            	    <p>*<?php echo Language::$validAccountLess; ?></p>
            	    <br/><br/>
            	    <a href="<?php echo URL; ?>/site/register" class="btn btn-success btn-lg"><?php echo Language::$register; ?></a>
    			    <a href="<?php echo URL; ?>/site/login" class="btn btn-danger btn-lg"><?php echo Language::$login; ?></a>
            	</div>
            </div>
        </div>
        <br/><br/><br/><br/>
    </section>

    <section class="content">
        <br/><br/>
        <div  class="text-center">
            <h3><?php echo Language::$simpleToUse; ?></h3>
        </div>
        <br/><br/><br/><br/>
        <div class="row">
            <div class="text-center col-md-6">
            	<h2><?php echo Language::$buildTeam; ?></h2>
            	<hr>
            	<h4><?php echo Language::$buildTeamDesc; ?></h4>
            </div>
            <div class="text-center col-md-6">
                <img class="img-responsive center" src="<?php echo URL; ?>/img/website/team.png" alt="GDDManager Team">
        	    <br/>
        	    <a href="<?php echo URL; ?>/user" class="btn btn-success btn-lg"><?php echo Language::$viewTeam;?></a>
            </div>
        </div>
        <br/><br/><br/><br/>
        <div class="row">
            <div class="text-center col-md-6">
                <img class="img-responsive center" src="<?php echo URL; ?>/img/website/project.png" alt="GDDManager Projects">
                <br/>
                <a href="<?php echo URL; ?>/project" class="btn btn-success btn-lg"><?php echo Language::$viewProject;?></a>
            </div>
            <div class="text-center col-md-6">
            	<h2><?php echo Language::$startProject;?></h2>
            	<hr>
            	<h4><?php echo Language::$startProjectDesc;?></h4>
            </div>
        </div>
        <br/><br/><br/><br/>
        <div class="row">
            <div class="text-center col-md-6">
            	<h2><?php echo Language::$workProject;?></h2>
            	<hr>
            	<h4><?php echo Language::$workProjectDesc;?></h4>
            </div>
            <div class="text-center col-md-6">
                <img class="img-responsive center" src="<?php echo URL; ?>/img/website/tasks.png" alt="GDDManager Tasks">
                <br/>
                <a href="<?php echo URL; ?>/development" class="btn btn-success btn-lg"><?php echo Language::$viewWork;?></a>
            </div>
        </div>
        <br/><br/><br/><br/>
        <div class="row">
            <div class="text-center col-md-6">
                <img class="img-responsive center" src="<?php echo URL; ?>/img/website/document.png" alt="GDDManager Documents">
                <br/>
                <a href="<?php echo URL; ?>/documents" class="btn btn-success btn-lg"><?php echo Language::$viewDoc;?></a>
            </div>
            <div class="text-center col-md-6">
            	<h2><?php echo Language::$genDoc;?></h2>
            	<hr>
            	<h4><?php echo Language::$genDocDesc;?></h4>
            </div>
        </div>
        <br/><br/>
        <!--br/><br/><br/><br/>
        <div class="row">
            <div class="text-center col-md-12">
        	    <video width="100%" controls>
                    <source src="<?php echo URL; ?>/img/infographic.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div-->
    </section>
</div>