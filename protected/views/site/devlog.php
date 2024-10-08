<?php
$cover = file_exists($_SERVER['DOCUMENT_ROOT'] . Yii::app()->request->baseUrl . '/files/' . $project->company_id . '/' . $project->id . '/cover.png') ? URL . '/files/' . $project->company_id . '/' . $project->id . '/cover.png' : URL . '/img/cover.png'; 
$banner = file_exists($_SERVER['DOCUMENT_ROOT'] . Yii::app()->request->baseUrl . '/files/' . $project->company_id . '/' . $project->id . '/banner.png') ? URL . '/files/' . $project->company_id . '/' . $project->id . '/banner.png' : false;
?>

<section class="content-header">
	<h1 class="hidden-xs"><?php echo Language::$games; ?> <small><?php echo Language::$devlogs; ?></small></h1>

	<ol class="breadcrumb">
		<li><a href="<?php echo URL;?>/"><i class="fa fa-dashboard"></i> <?php echo Language::$home; ?></a></li>
		<li><a href="<?php echo URL . '/site/devlogs/';?>"><?php echo Language::$devlogs; ?></a></li>
		<li class="active"><?php echo $model->title; ?></li>
	</ol>
</section>

<section class="content">

    <div class="row">
    	<div class="col-md-12">
    		<div class="box box-widget widget-user">
    			<!-- Add the bg color to the header using any of the bg-* classes -->
    			<div class="widget-user-header bg-green" <?php if ($banner){ ?>style="background: url('<?php echo $banner; ?>') center center;" <?php } ?>>
    				<h3 class="widget-user-username"><?php echo $model->title; ?></h4>
    				<h5 class="widget-user-desc"><?php echo $project->name; ?></h5>
    			</div>
    			<div class="widget-user-image">
    				<img class="img-circle" src="<?php echo $cover; ?>" alt="Project Cover">
    			</div>
    			<div class="box-footer">
    				
					<div class="description-block">
						<h2>
							<?php if ($project->website != ''){ ?><a href="<?php echo $project->website; ?>" title="<?php echo Language::$website; ?>" target="_blank"><i class="fa fa-globe"></i></a><?php } ?>
							<?php if ($project->twitter != ''){ ?><a href="<?php echo $project->twitter; ?>" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a><?php } ?>
							<?php if ($project->discord != ''){ ?><a href="<?php echo $project->discord; ?>" title="Discord" target="_blank"><i class="fa fa-discord"></i></a><?php } ?>
							<?php if ($project->reddit != ''){ ?><a href="<?php echo $project->reddit; ?>" title="Reddit" target="_blank"><i class="fa fa-reddit"></i></a><?php } ?>
							<?php if ($project->youtube != ''){ ?><a href="<?php echo $project->youtube; ?>" title="Youtube" target="_blank"><i class="fa fa-youtube"></i></a><?php } ?>
							<?php if ($project->twitch != ''){ ?><a href="<?php echo $project->twitch; ?>" title="Twitch" target="_blank"><i class="fa fa-twitch"></i></a><?php } ?>
							<?php if ($project->tumblr != ''){ ?><a href="<?php echo $project->tumblr; ?>" title="Tumblr" target="_blank"><i class="fa fa-tumblr"></i></a><?php } ?>
							<?php if ($project->snapchat != ''){ ?><a href="<?php echo $project->snapchat; ?>" title="Snapchat" target="_blank"><i class="fa fa-snapchat"></i></a><?php } ?>
							<?php if ($project->facebook != ''){ ?><a href="<?php echo $project->facebook; ?>" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a><?php } ?>
						</h2>
					</div>
					
    				<div class="col-xs-12 border-right">
    				    <?php echo $model->content; ?>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>

</section>