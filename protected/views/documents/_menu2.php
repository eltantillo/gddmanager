<?php
$this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'specificSidebar')); ?>
	<?php if ($overview){ ?>
		<li><a href="#overview"><i class="fa fa-list"></i> <span><?php echo Language::$overview; ?></span></a></li>
	<?php } ?>

	<?php if ($gameplay){ ?>
		<li><a href="#gameplay"><i class="fa fa-gamepad"></i> <span><?php echo Language::$gameplayMechanics; ?></span></a></li>
	<?php } ?>

	<?php if ($story){ ?>
		<li class="treeview"><a href="#"><i class="fa fa-user"></i> <span><?php echo Language::$storyCharacters; ?></span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
		<ul class="treeview-menu">
			<li><a href="#story"><i class="fa fa-users"></i> <span><?php echo Language::$storyCharacters; ?></span></a></li>
			<?php if ($character){ ?><li><a href="#characters"><i class="fa fa-users"></i> <span><?php echo Language::$characters; ?></span></a></li><?php } ?>
			<?php if ($enviroment){ ?><li><a href="#enviromentObjects"><i class="fa fa-futbol-o"></i> <span><?php echo Language::$enviromentObjects; ?></span></a></li><?php } ?>
			<?php if ($cutscene){ ?><li><a href="#cutscenes"><i class="fa fa-video-camera"></i> <span><?php echo Language::$cutscenes; ?></span></a></li><?php } ?>
			<?php if ($dialog){ ?><li><a href="#dialogs"><i class="fa fa-commenting-o"></i> <span><?php echo Language::$dialogs; ?></span></a></li><?php } ?>
		</ul>
		</li>
	<?php } ?>

	<?php if ($areas){ ?>
		<li class="treeview"><a href="#"><i class="fa fa-map-o"></i> <span><?php echo Language::$areasLevels; ?></span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
		<ul class="treeview-menu">
			<li><a href="#areasLevels"><i class="fa fa-map-o"></i> <span><?php echo Language::$areasLevels; ?></span></a></li>
			<?php if ($area){ ?><li><a href="#areas"><i class="fa fa-map-o"></i> <span><?php echo Language::$areas; ?></span></a></li><?php } ?>
			<?php if ($level){ ?><li><a href="#levels"><i class="fa fa-map-signs"></i> <span><?php echo Language::$levels; ?></span></a></li><?php } ?>
		</ul>
	<?php } ?>

	<?php if ($interface){ ?>
		<li class="treeview"><a href="#"><i class="fa fa-desktop"></i> <span><?php echo Language::$interface; ?></span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
		<ul class="treeview-menu">
			<li><a href="#interface"><i class="fa fa-desktop"></i> <span><?php echo Language::$interface; ?></span></a></li>
			<?php if ($screen){ ?><li><a href="#screens"><i class="fa fa-desktop"></i> <span><?php echo Language::$screens; ?></span></a></li><?php } ?>
			<?php if ($sound){ ?><li><a href="#sounds"><i class="fa fa-volume-up"></i> <span><?php echo Language::$sounds; ?></span></a></li><?php } ?>
			<?php if ($music){ ?><li><a href="#music"><i class="fa fa-music"></i> <span><?php echo Language::$music; ?></span></a></li><?php } ?>
		</ul>
	<?php } ?>

	<?php if ($technical){ ?>
		<li class="treeview"><a href="#"><i class="fa fa-code"></i> <span><?php echo Language::$technical; ?></span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
		<ul class="treeview-menu">
			<li><a href="#technical"><i class="fa fa-code"></i> <span><?php echo Language::$technical; ?></span></a></li>
			<?php if ($component){ ?><li><a href="#components"><i class="fa fa-file-code-o"></i> <span><?php echo Language::$softwareComponents; ?></span></a></li><?php } ?>
		</ul>
	<?php } ?>

	<?php if ($art){ ?>
		<li class="treeview"><a href="#"><i class="fa fa-image"></i> <span><?php echo Language::$gameArt; ?></span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
		<ul class="treeview-menu">
			<li><a href="#art"><i class="fa fa-image"></i> <span><?php echo Language::$gameArt; ?></span></a></li>
			<?php if ($graphic){ ?><li><a href="#graphics"><i class="fa fa-image"></i> <span><?php echo Language::$graphics; ?></span></a></li><?php } ?>
		</ul>
	<?php } ?>

	<?php if ($management){ ?>
		<li class="treeview"><a href="#"><i class="fa fa-dashboard"></i> <span><?php echo Language::$management; ?></span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
		<ul class="treeview-menu">
			<li><a href="#management"><i class="fa fa-dashboard"></i> <span><?php echo Language::$management; ?></span></a></li>
			<?php if ($resource){ ?><li><a href="#resources"><i class="fa fa-cubes"></i> <span><?php echo Language::$resources; ?></span></a></li><?php } ?>
		</ul>
	<?php } ?>

<?php $this->endWidget();?>