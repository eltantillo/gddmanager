<?php
$this->pageTitle=Yii::app()->name;
?>

<div class="white-bg">

    <section class="content">
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
        	    <a href="user" class="btn btn-success btn-lg"><?php echo Language::$viewTeam;?></a>
            </div>
        </div>
        <br/><br/><br/><br/>
        <div class="row">
            <div class="text-center col-md-6">
                <img class="img-responsive center" src="<?php echo URL; ?>/img/website/project.png" alt="GDDManager Projects">
                <br/>
                <a href="project" class="btn btn-success btn-lg"><?php echo Language::$viewProject;?></a>
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
                <a href="development" class="btn btn-success btn-lg"><?php echo Language::$viewWork;?></a>
            </div>
        </div>
        <br/><br/><br/><br/>
        <div class="row">
            <div class="text-center col-md-6">
                <img class="img-responsive center" src="<?php echo URL; ?>/img/website/document.png" alt="GDDManager Documents">
                <br/>
                <a href="documents" class="btn btn-success btn-lg"><?php echo Language::$viewDoc;?></a>
            </div>
            <div class="text-center col-md-6">
            	<h2><?php echo Language::$genDoc;?></h2>
            	<hr>
            	<h4><?php echo Language::$genDocDesc;?></h4>
            </div>
        </div>
        <br/><br/><br/><br/>
    </section>
</div>