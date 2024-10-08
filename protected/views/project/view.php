<?php
echo $this->renderPartial('_menu');
echo $this->renderPartial('_menu2', array('model'=>$model));
$cover = file_exists($_SERVER['DOCUMENT_ROOT'] . Yii::app()->request->baseUrl . '/files/' . $model->company_id . '/' . $model->id . '/cover.png') ? URL . '/files/' . $model->company_id . '/' . $model->id . '/cover.png' : URL . '/img/cover.png'; 
$banner = file_exists($_SERVER['DOCUMENT_ROOT'] . Yii::app()->request->baseUrl . '/files/' . $model->company_id . '/' . $model->id . '/banner.png') ? URL . '/files/' . $model->company_id . '/' . $model->id . '/banner.png' : false;
?>

<section class="content-header">
	<h1 class="hidden-xs"><?php echo Language::$games; ?> <small><?php echo Language::$projectDetail; ?></small></h1>

	<ol class="breadcrumb">
		<li><a href="<?php echo URL;?>/"><i class="fa fa-dashboard"></i> <?php echo Language::$home; ?></a></li>
		<li><a href="<?php echo URL . '/project';?>"><?php echo Language::$projectList; ?></a></li>
		<li class="active"><?php echo $model->name; ?></li>
	</ol>
</section>

<section class="content">

<a class="btn btn-danger" href="javascript:void(0);" onclick="javascript:introJs().start();" style="float: right;">Help</a>
<br/><br/>

<div class="row">
	<div class="col-md-12">
		<div class="box box-widget widget-user">
			<!-- Add the bg color to the header using any of the bg-* classes -->
			<div class="widget-user-header bg-green" <?php if ($banner){ ?>style="background: url('<?php echo $banner; ?>') center center;" <?php } ?>>
				<h3 class="widget-user-username"><?php echo $model->name; ?></h4>
				<h5 class="widget-user-desc"><?php echo Language::$version; ?> <?php echo $model->version; ?></h5>
			</div>
			<div class="widget-user-image">
				<img class="img-circle" src="<?php echo $cover; ?>" alt="Project Cover">
			</div>
			<div class="box-footer">
					<div class="col-sm-4 border-right">
						<div class="description-block">
							<span class="description-text"><?php echo mb_strtoupper(Language::$team); ?></span>
							<h5 class="description-header"><?php echo Functions::getNames($model->team); ?></h5>
						</div>
						<!-- /.description-block -->
					</div>
					<!-- /.col -->
					<div class="col-sm-4 border-right">
						<div class="description-block">
							<span class="description-text"><?php echo mb_strtoupper(Language::$genre); ?></span>
							<h5 class="description-header"><?php echo $model->genre; ?></h5>
						</div>
						<!-- /.description-block -->
					</div>
					<!-- /.col -->
					<div class="col-sm-4">
						<div class="description-block">
							<span class="description-text"><?php echo mb_strtoupper(Language::$audience); ?></span>
							<h5 class="description-header"><?php echo $model->audience; ?></h5>
						</div>
						<!-- /.description-block -->
					</div>
					<!-- /.col -->
			</div>
		</div>
	</div>
</div>

<div class="row">
	<?php if (in_array('admin', Yii::app()->user->roles) or in_array('designer', Yii::app()->user->roles)){ ?>
		<div class="col-md-6" data-step="1" data-intro="<?php echo Language::$projectHelp1; ?>" data-position="right">
			<!-- Box Comment -->
			<div class="box box-widget">
				<div class="box-header with-border">
					<div class="user-block">
						<span><span class="fa fa-list gi-2x block-icon"/></span>
						<span class="username"><a href="<?php echo URL;?>/project/overview/<?php echo $model->id;?>"><?php echo Language::$overview; ?></a></span>
						<span class="description"><?php echo Language::$overviewDesc; ?></span>
					</div>
					<!-- /.user-block -->
					<div class="box-tools">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
						</button>
						<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
					</div>
					<!-- /.box-tools -->
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<p class="text-right">
						<a href="<?php echo URL;?>/project/overview/<?php echo $model->id;?>" class="btn btn-success"><i class="fa fa-edit"></i> <?php echo Language::$edit; ?></a>
					</p>
					<?php if($model->name != null){ ?>
						<h4><?php echo Language::$projectName; ?></h4>
						<p><?php echo $model->name; ?></p>
					<?php } ?>
	
					<?php if($model->team != null){ ?>
						<h4><?php echo Language::$teamMembers; ?></h4>
						<p><?php echo Functions::getNames($model->team); ?></p>
					<?php } ?>
					
					<?php if($model->leader_id != null){ ?>
						<h4><?php echo Language::$projectLead; ?></h4>
						<p><?php echo Functions::getNames($model->leader_id); ?></p>
					<?php } ?>
					
					<?php if($model->copyright != null){ ?>
						<h4><?php echo Language::$gameCopyright; ?></h4>
						<p><?php echo $model->copyright; ?></p>
					<?php } ?>
					
					<?php if($model->concept != null){ ?>
						<h4><?php echo Language::$gameConcept; ?></h4>
						<p><?php echo $model->concept; ?></p>
					<?php } ?>
					
					<?php if($model->features != null){ ?>
						<h4><?php echo Language::$gameFeatures; ?></h4>
						<p><?php echo $model->features; ?></p>
					<?php } ?>
					
					<?php if($model->genre != null){ ?>
						<h4><?php echo Language::$gameGenre; ?></h4>
						<p><?php echo $model->genre; ?></p>
					<?php } ?>
					
					<?php if($model->audience != null){ ?>
						<h4><?php echo Language::$gameAudience; ?></h4>
						<p><?php echo $model->audience; ?></p>
					<?php } ?>
					
					<?php if($model->look != null){ ?>
						<h4><?php echo Language::$gameLookFeel; ?></h4>
						<p><?php echo $model->look; ?></p>
					<?php } ?>
					
					<?php foreach ($overviewSections as $overviewSection) {
						echo '<h4>' . $overviewSection->name . '</h4>';
						if($overviewSection->content != null){
							echo '<p>' . $overviewSection->content . '</p>';
						}
						if($overviewSection->file != null){
							echo '<p><a href="' . $overviewSection->file . '"><span class="fa fa-paperclip"/></span> Attached File</a></p>';
						}
					} ?>
					
				</div>
			</div>
			<!-- /.box -->
		</div>
	<?php } ?>

	<?php if (in_array('admin', Yii::app()->user->roles) or in_array('designer', Yii::app()->user->roles)){ ?>
		<div class="col-md-6">
			<!-- Box Comment -->
			<div class="box box-widget">
				<div class="box-header with-border">
					<div class="user-block">
						<span><span class="fa fa-gamepad gi-2x block-icon"/></span>
						<span class="username"><a href="<?php echo URL;?>/project/gameplay/<?php echo $model->id;?>"><?php echo Language::$gameplayMechanics; ?></a></span>
						<span class="description"><?php echo Language::$gameplayDesc; ?></span>
					</div>
					<!-- /.user-block -->
					<div class="box-tools">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
						</button>
						<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
					</div>
					<!-- /.box-tools -->
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<p class="text-right">
						<a href="<?php echo URL;?>/project/gameplay/<?php echo $model->id;?>" class="btn btn-success"><i class="fa fa-edit"></i> <?php echo Language::$edit; ?></a>
					</p>
					<?php if($model->progression != null){ ?>
						<h4><?php echo Language::$gameProgression; ?></h4>
						<p><?php echo $model->progression; ?></p>
					<?php } ?>
	
					<?php if($model->objectives != null){ ?>
						<h4><?php echo Language::$gameObjectives; ?></h4>
						<p><?php echo $model->objectives; ?></p>
					<?php } ?>
					
					<?php if($model->flow != null){ ?>
						<h4><?php echo Language::$gameFlow; ?></h4>
						<p><?php echo $model->flow; ?></p>
					<?php } ?>
					
					<?php if($model->physics != null){ ?>
						<h4><?php echo Language::$gamePhysics; ?></h4>
						<p><?php echo $model->physics; ?></p>
					<?php } ?>
					
					<?php if($model->movement != null){ ?>
						<h4><?php echo Language::$gameMove; ?></h4>
						<p><?php echo $model->movement; ?></p>
					<?php } ?>
					
					<?php if($model->combat != null){ ?>
						<h4><?php echo Language::$gameCombat; ?></h4>
						<p><?php echo $model->combat; ?></p>
					<?php } ?>
					
					<?php if($model->economy != null){ ?>
						<h4><?php echo Language::$gameEconomy; ?></h4>
						<p><?php echo $model->economy; ?></p>
					<?php } ?>
					
					<?php if($model->switches != null){ ?>
						<h4><?php echo Language::$switchesButtons; ?></h4>
						<p><?php echo $model->switches; ?></p>
					<?php } ?>
					
					<?php if($model->pick != null){ ?>
						<h4><?php echo Language::$pickCarryDrop; ?></h4>
						<p><?php echo $model->pick; ?></p>
					<?php } ?>
					
					<?php if($model->talk != null){ ?>
						<h4><?php echo Language::$gameTalking; ?></h4>
						<p><?php echo $model->talk; ?></p>
					<?php } ?>
					
					<?php if($model->read != null){ ?>
						<h4><?php echo Language::$gameReading; ?></h4>
						<p><?php echo $model->read; ?></p>
					<?php } ?>
					
					<?php if($model->options != null){ ?>
						<h4><?php echo Language::$gameOptions; ?></h4>
						<p><?php echo $model->options; ?></p>
					<?php } ?>
					
					<?php if($model->save != null){ ?>
						<h4><?php echo Language::$replaySave; ?></h4>
						<p><?php echo $model->save; ?></p>
					<?php } ?>
					
					<?php if($model->cheats != null){ ?>
						<h4><?php echo Language::$cheatsEasterEggs; ?></h4>
						<p><?php echo $model->cheats; ?></p>
					<?php } ?>
					
					<?php foreach ($gameplaySections as $gameplaySection) {
						echo '<h4>' . $gameplaySection->name . '</h4>';
						if($gameplaySection->content != null){
							echo '<p>' . $gameplaySection->content . '</p>';
						}
						if($gameplaySection->file != null){
							echo '<p><a href="' . $gameplaySection->file . '"><span class="fa fa-paperclip"/></span> Attached File</a></p>';
						}
					} ?>
					
				</div>
			</div>
			<!-- /.box -->
		</div>
	<?php } ?>

	<?php if (in_array('admin', Yii::app()->user->roles) or in_array('designer', Yii::app()->user->roles) or in_array('writer', Yii::app()->user->roles)){ ?>
	<div class="col-md-6">
		<!-- Box Comment -->
		<div class="box box-widget">
			<div class="box-header with-border">
				<div class="user-block">
					<span><span class="fa fa-user gi-2x block-icon"/></span>
					<span class="username"><a href="<?php echo URL;?>/project/story/<?php echo $model->id;?>"><?php echo Language::$storyCharacters; ?></a></span>
					<span class="description"><?php echo Language::$storyDesc; ?></span>
				</div>
				<!-- /.user-block -->
				<div class="box-tools">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
					</button>
					<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
				</div>
				<!-- /.box-tools -->
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<p class="text-right">
					<a href="<?php echo URL;?>/project/story/<?php echo $model->id;?>" class="btn btn-success"><i class="fa fa-edit"></i> <?php echo Language::$edit; ?></a>
				</p>
				<?php if($model->backstory != null){ ?>
					<h4><?php echo Language::$gameBackstory; ?></h4>
					<p><?php echo $model->backstory; ?></p>
				<?php } ?>

				<?php if($model->plot != null){ ?>
					<h4><?php echo Language::$gamePlot; ?></h4>
					<p><?php echo $model->plot; ?></p>
				<?php } ?>
				
				<?php if($model->license != null){ ?>
					<h4><?php echo Language::$gameLicense; ?></h4>
					<p><?php echo $model->license; ?></p>
				<?php } ?>
				
				<?php foreach ($storySections as $storySection) {
					echo '<h4>' . $storySection->name . '</h4>';
					if($storySection->content != null){
						echo '<p>' . $storySection->content . '</p>';
					}
					if($storySection->file != null){
						echo '<p><a href="' . $storySection->file . '"><span class="fa fa-paperclip"/></span> Attached File</a></p>';
					}
				} ?>
				
			</div>
		</div>
		<!-- /.box -->
	</div>
	<?php } ?>

	<?php if (in_array('admin', Yii::app()->user->roles) or in_array('designer', Yii::app()->user->roles) or in_array('writer', Yii::app()->user->roles)){ ?>
	<div class="col-md-6">
		<!-- Box Comment -->
		<div class="box box-widget">
			<div class="box-header with-border">
				<div class="user-block">
					<span><span class="fa fa-map-o gi-2x block-icon"/></span>
					<span class="username"><a href="<?php echo URL;?>/project/areaslevels/<?php echo $model->id;?>"><?php echo Language::$areasLevels; ?></a></span>
					<span class="description"><?php echo Language::$areasDesc; ?></span>
				</div>
				<!-- /.user-block -->
				<div class="box-tools">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
					</button>
					<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
				</div>
				<!-- /.box-tools -->
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<p class="text-right">
					<a href="<?php echo URL;?>/project/areaslevels/<?php echo $model->id;?>" class="btn btn-success"><i class="fa fa-edit"></i> <?php echo Language::$edit; ?></a>
				</p>
				<?php if($model->look != null){ ?>
					<h4><?php echo Language::$gameLookFeel; ?></h4>
					<p><?php echo $model->look; ?></p>
				<?php } ?>
				
				<?php foreach ($areasSections as $areasSection) {
					echo '<h4>' . $areasSection->name . '</h4>';
					if($areasSection->content != null){
						echo '<p>' . $areasSection->content . '</p>';
					}
					if($areasSection->file != null){
						echo '<p><a href="' . $areasSection->file . '"><span class="fa fa-paperclip"/></span> Attached File</a></p>';
					}
				} ?>
				
			</div>
		</div>
		<!-- /.box -->
	</div>
	<?php } ?>

	<?php if (in_array('admin', Yii::app()->user->roles) or in_array('designer', Yii::app()->user->roles) or in_array('programmer', Yii::app()->user->roles)){ ?>
	<div class="col-md-6">
		<!-- Box Comment -->
		<div class="box box-widget">
			<div class="box-header with-border">
				<div class="user-block">
					<span><span class="fa fa-desktop gi-2x block-icon"/></span>
					<span class="username"><a href="<?php echo URL;?>/project/interface/<?php echo $model->id;?>"><?php echo Language::$interface; ?></a></span>
					<span class="description"><?php echo Language::$interfaceDesc; ?></span>
				</div>
				<!-- /.user-block -->
				<div class="box-tools">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
					</button>
					<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
				</div>
				<!-- /.box-tools -->
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<p class="text-right">
					<a href="<?php echo URL;?>/project/interface/<?php echo $model->id;?>" class="btn btn-success"><i class="fa fa-edit"></i> <?php echo Language::$edit; ?></a>
				</p>
				<?php if($model->screen_flow != null){ ?>
					<h4><?php echo Language::$gameScreenFlow; ?></h4>
					<p><?php echo $model->screen_flow; ?></p>
				<?php } ?>

				<?php if($model->HUD != null){ ?>
					<h4><?php echo Language::$gameHUD; ?></h4>
					<p><?php echo $model->HUD; ?></p>
				<?php } ?>
				
				<?php if($model->rendering != null){ ?>
					<h4><?php echo Language::$gameRendering; ?></h4>
					<p><?php echo $model->rendering; ?></p>
				<?php } ?>
				
				<?php if($model->camera != null){ ?>
					<h4><?php echo Language::$gameCamera; ?></h4>
					<p><?php echo $model->camera; ?></p>
				<?php } ?>
				
				<?php if($model->lighting != null){ ?>
					<h4><?php echo Language::$gameLighting; ?></h4>
					<p><?php echo $model->lighting; ?></p>
				<?php } ?>
				
				<?php if($model->controls != null){ ?>
					<h4><?php echo Language::$gameControls; ?></h4>
					<p><?php echo $model->controls; ?></p>
				<?php } ?>
				
				<?php if($model->help != null){ ?>
					<h4><?php echo Language::$gameHelp; ?></h4>
					<p><?php echo $model->help; ?></p>
				<?php } ?>
				
				<?php foreach ($interfaceSections as $interfaceSection) {
					echo '<h4>' . $interfaceSection->name . '</h4>';
					if($interfaceSection->content != null){
						echo '<p>' . $interfaceSection->content . '</p>';
					}
					if($interfaceSection->file != null){
						echo '<p><a href="' . $interfaceSection->file . '"><span class="fa fa-paperclip"/></span> Attached File</a></p>';
					}
				} ?>
				
			</div>
		</div>
		<!-- /.box -->
	</div>
	<?php } ?>

	<?php if (in_array('admin', Yii::app()->user->roles) or in_array('designer', Yii::app()->user->roles) or in_array('programmer', Yii::app()->user->roles)){ ?>
	<div class="col-md-6">
		<!-- Box Comment -->
		<div class="box box-widget">
			<div class="box-header with-border">
				<div class="user-block">
					<span><span class="fa fa-code gi-2x block-icon"/></span>
					<span class="username"><a href="<?php echo URL;?>/project/technical/<?php echo $model->id;?>"><?php echo Language::$technical; ?></a></span>
					<span class="description"><?php echo Language::$technicalDesc; ?></span>
				</div>
				<!-- /.user-block -->
				<div class="box-tools">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
					</button>
					<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
				</div>
				<!-- /.box-tools -->
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<p class="text-right">
					<a href="<?php echo URL;?>/project/technical/<?php echo $model->id;?>" class="btn btn-success"><i class="fa fa-edit"></i> <?php echo Language::$edit; ?></a>
				</p>
				<?php if($model->target_hardware != null){ ?>
					<h4><?php echo Language::$gameHardware; ?></h4>
					<p><?php echo $model->target_hardware; ?></p>
				<?php } ?>

				<?php if($model->dev_enviroment != null){ ?>
					<h4><?php echo Language::$gameDevEnv; ?></h4>
					<p><?php echo $model->dev_enviroment; ?></p>
				<?php } ?>
				
				<?php if($model->dev_standards != null){ ?>
					<h4><?php echo Language::$gameDevStandards; ?></h4>
					<p><?php echo $model->dev_standards; ?></p>
				<?php } ?>
				
				<?php if($model->engine != null){ ?>
					<h4><?php echo Language::$gameEngine; ?></h4>
					<p><?php echo $model->engine; ?></p>
				<?php } ?>
				
				<?php if($model->network != null){ ?>
					<h4><?php echo Language::$gameNetwork; ?></h4>
					<p><?php echo $model->network; ?></p>
				<?php } ?>
				
				<?php if($model->conventions != null){ ?>
					<h4><?php echo Language::$codeConventions; ?></h4>
					<p><?php echo $model->conventions; ?></p>
				<?php } ?>
				
				<?php foreach ($technicalSections as $technicalSection) {
					echo '<h4>' . $technicalSection->name . '</h4>';
					if($technicalSection->content != null){
						echo '<p>' . $technicalSection->content . '</p>';
					}
					if($technicalSection->file != null){
						echo '<p><a href="' . $technicalSection->file . '"><span class="fa fa-paperclip"/></span> Attached File</a></p>';
					}
				} ?>
				
			</div>
		</div>
		<!-- /.box -->
	</div>
	<?php } ?>

	<?php if (in_array('admin', Yii::app()->user->roles) or in_array('designer', Yii::app()->user->roles) or in_array('artist', Yii::app()->user->roles)){ ?>
	<div class="col-md-6">
		<!-- Box Comment -->
		<div class="box box-widget">
			<div class="box-header with-border">
				<div class="user-block">
					<span><span class="fa fa-image gi-2x block-icon"/></span>
					<span class="username"><a href="<?php echo URL;?>/project/art/<?php echo $model->id;?>"><?php echo Language::$gameArt; ?></a></span>
					<span class="description"><?php echo Language::$artDesc; ?></span>
				</div>
				<!-- /.user-block -->
				<div class="box-tools">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
					</button>
					<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
				</div>
				<!-- /.box-tools -->
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<p class="text-right">
					<a href="<?php echo URL;?>/project/art/<?php echo $model->id;?>" class="btn btn-success"><i class="fa fa-edit"></i> <?php echo Language::$edit; ?></a>
				</p>
				<?php if($model->look != null){ ?>
					<h4><?php echo Language::$gameLookFeel; ?></h4>
					<p><?php echo $model->look; ?></p>
				<?php } ?>

				<?php if($model->style != null){ ?>
					<h4><?php echo Language::$artStyle; ?></h4>
					<p><?php echo $model->style; ?></p>
				<?php } ?>
				
				<?php foreach ($artSections as $artSection) {
					echo '<h4>' . $artSection->name . '</h4>';
					if($artSection->content != null){
						echo '<p>' . $artSection->content . '</p>';
					}
					if($artSection->file != null){
						echo '<p><a href="' . $artSection->file . '"><span class="fa fa-paperclip"/></span> Attached File</a></p>';
					}
				} ?>
				
			</div>
		</div>
		<!-- /.box -->
	</div>
	<?php } ?>

	<?php if (in_array('admin', Yii::app()->user->roles) or in_array('designer', Yii::app()->user->roles)){ ?>
	<div class="col-md-6">
		<!-- Box Comment -->
		<div class="box box-widget">
			<div class="box-header with-border">
				<div class="user-block">
					<span><span class="fa fa-dashboard gi-2x block-icon"/></span>
					<span class="username"><a href="<?php echo URL;?>/project/management/<?php echo $model->id;?>"><?php echo Language::$management; ?></a></span>
					<span class="description"><?php echo Language::$managementDesc; ?></span>
				</div>
				<!-- /.user-block -->
				<div class="box-tools">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
					</button>
					<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
				</div>
				<!-- /.box-tools -->
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<p class="text-right">
					<a href="<?php echo URL;?>/project/management/<?php echo $model->id;?>" class="btn btn-success"><i class="fa fa-edit"></i> <?php echo Language::$edit; ?></a>
				</p>
				<?php if($model->budget != null){ ?>
					<h4><?php echo Language::$projectBudget; ?></h4>
					<p><?php echo Language::$currencySymbol[$model->currency] . ' ' . number_format($model->budget, 2); ?></p>
				<?php } ?>

				<?php if($model->monetization != null){ ?>
					<h4><?php echo Language::$projectMonetization; ?></h4>
					<p><?php echo $model->monetization; ?></p>
				<?php } ?>
				
				<?php if($model->risks != null){ ?>
					<h4><?php echo Language::$projectRisks; ?></h4>
					<p><?php echo $model->risks; ?></p>
				<?php } ?>
				
				<?php if($model->marketing != null){ ?>
					<h4><?php echo Language::$projectMarketing; ?></h4>
					<p><?php echo $model->marketing; ?></p>
				<?php } ?>
				
				<?php if($model->production_date != null){ ?>
					<h4><?php echo Language::$projectProduction; ?></h4>
					<p><?php echo $model->production_date; ?></p>
				<?php } ?>
				
				<?php if($model->launch_date != null){ ?>
					<h4><?php echo Language::$projectRelease; ?></h4>
					<p><?php echo $model->launch_date; ?></p>
				<?php } ?>
				
				<?php foreach ($managementSections as $managementSection) {
					echo '<h4>' . $managementSection->name . '</h4>';
					if($managementSection->content != null){
						echo '<p>' . $managementSection->content . '</p>';
					}
					if($managementSection->file != null){
						echo '<p><a href="' . $managementSection->file . '"><span class="fa fa-paperclip"/></span> Attached File</a></p>';
					}
				} ?>
				
			</div>
		</div>
		<!-- /.box -->
	</div>
	<?php } ?>

</div>

</section>