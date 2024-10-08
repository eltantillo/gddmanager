<?php
$overview = ($project->name != null) || ($project->team != null) || ($project->leader_id != null) || ($project->copyright != null) || ($project->concept != null) || ($project->features != null) || ($project->genre != null) || ($project->audience != null) || ($project->look != null) || count($overviewSections) > 0;

$gameplay = ($project->progression != null) || ($project->objectives != null) || ($project->flow != null) || ($project->physics != null) || ($project->movement != null) || ($project->combat != null) || ($project->economy != null) || ($project->switches != null) || ($project->pick != null) || ($project->talk != null) || ($project->read != null) || ($project->options != null) || ($project->save != null) || ($project->cheats != null) || count($gameplaySections) > 0;

$character  = count($characters) > 0;
$enviroment = count($enviroments) > 0;
$cutscene   = count($cutscenes) > 0;
$dialog     = count($dialogs) > 0;

$story = ($project->backstory != null) || ($project->plot != null) || ($project->license != null) || count($storySections) > 0 || $character || $enviroment || $cutscene || $dialog;

$area  = count($areas) > 0;
$level = count($levels) > 0;

$areasLevels = ($project->look != null) || count($areasSections) > 0 || $area || $level;

$screen = count($screens) > 0;
$sound  = count($sounds) > 0;
$music  = count($musics) > 0;

$interface = ($project->screen_flow != null) || ($project->HUD != null) || ($project->rendering != null) || ($project->camera != null) || ($project->lighting != null) || ($project->controls != null) || ($project->help != null) || count($interfaceSections) > 0;

$component = count($components) > 0;

$technical = ($project->target_hardware != null) || ($project->dev_enviroment != null) || ($project->dev_standards != null) || ($project->engine != null) || ($project->network != null) || ($project->conventions != null) || count ($technicalSections) > 0 || $component;

$graphic = count($graphics) > 0;

$art = ($project->look != null) || ($project->style != null) || count($artSections) > 0 || $graphic;

$resource = count($resources) > 0;

$management = /*($project->budget != null) || */($project->monetization != null) || ($project->risks != null) || ($project->marketing != null) || ($project->production_date != null) || ($project->launch_date != null) || count($managementSections) || $resource;


echo $this->renderPartial('_menu');
echo $this->renderPartial('_menu2', array(
	'project' => $project,

	'overview'   => $overview,
	'gameplay'   => $gameplay,
	'story'      => $story,
	'areas'      => $areasLevels,
	'interface'  => $interface,
	'technical'  => $technical,
	'art'        => $art,
	'management' => $management,

	'character'  => $character,
	'enviroment' => $enviroment,
	'cutscene'   => $cutscene,
	'dialog'     => $dialog,
	'area'       => $area,
	'level'      => $level,
	'screen'     => $screen,
	'sound'      => $sound,
	'music'      => $music,
	'component'  => $component,
	'graphic'    => $graphic,
	'resource'   => $resource,
));

$cover = file_exists($_SERVER['DOCUMENT_ROOT'] . Yii::app()->request->baseUrl . '/files/' . $project->company_id . '/' . $project->id . '/cover.png') ? URL . '/files/' . $project->company_id . '/' . $project->id . '/cover.png' : URL . '/img/cover.png';
$banner = file_exists($_SERVER['DOCUMENT_ROOT'] . Yii::app()->request->baseUrl . '/files/' . $project->company_id . '/' . $project->id . '/banner.png') ? URL . '/files/' . $project->company_id . '/' . $project->id . '/banner.png' : false;
?>

<section class="content-header">
  <h1 class="hidden-xs"><?php echo Language::$documents; ?> <small><?php echo Language::$documentDetail; ?></small></h1>

  <ol class="breadcrumb">
    <li><a href="<?php echo URL;?>/"><i class="fa fa-dashboard"></i> <?php echo Language::$home; ?></a></li>
    <li><a href="<?php echo URL . '/documents';?>"><?php echo Language::$documents; ?></a></li>
    <li class="active"><?php echo $project->name; ?></li>
  </ol>
</section>

<div class="site-top" <?php if ($banner){ ?>style="background-image: url('<?php echo $banner; ?>')" <?php } ?>>
	<div class="site-header">
    	<div class="welcome-text">
			<img src="<?php echo $cover; ?>" alt="Game Design Document Logo" width="150px" class="img-circle">
			<h2><?php echo $project->name; ?></h2>
			<p><?php echo Language::$gddby . ' ' . $project->company->name; ?></p>
			<!--h3><span><?php echo substr($project->concept, 0, 256); if (strlen($project->concept) > 256){ echo '...'; } ?></span></h3-->
			<br/>
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
	</div>
</div>

<section class="content">
	<div class="box box-solid">
		<div class="box-body document">
			<?php if($overview){ echo '<p style="page-break-before: always"/><h3 id="overview" class="document-title"><small>' . Language::$overviewDesc . '</small><br/>' . Language::$overview . '</h3><p style="page-break-before: always"/>'; ?>
			
			<div class="box box-solid">
				<div class="row">
	                <div class="col-md-3">
	                	<center>
	                    <img src="<?php echo $cover; ?>" alt="Game Design Document Logo" class="img-responsive text-center">
	                    </center>
	                </div>
	                <div class="col-md-9">
	                	<?php if($project->name != null){ ?>
	                        <h4><?php echo $project->name; if($project->price != null){ ?> <span class="label label-success pull-right" style="font-size:18px;"><?php echo Language::$currencySymbol[$project->currency] . ' ' . number_format($project->price, 2); ?></span></h4> <?php } ?>
						<?php } ?>
	                	<?php if($project->genre != null){ ?>
	                        <p><strong><?php echo Language::$gameGenre; ?></strong>: <?php echo $project->genre; ?></p>
						<?php } ?>
	                	<?php if($project->audience != null){ ?>
	                        <p><strong><?php echo Language::$gameAudience; ?></strong>: <?php echo $project->audience; ?></p>
						<?php } ?>
	                	<?php if($project->copyright != null){ ?>
	                        <p><strong><?php echo Language::$gameCopyright; ?></strong>: <?php echo $project->copyright; ?></p>
						<?php } ?>
	                </div>
				
					<?php if($project->concept != null){ ?>
	                	<div class="col-xs-12">
	                		<br/>
							<p><?php echo $project->concept; ?></p>
						</div>
					<?php } ?>
				</div>
            </div>
			
			<?php if($project->features != null){ ?>
				<h4 class="document-heading1"><?php echo Language::$gameFeatures; ?></h4>
				<p><?php echo $project->features; ?></p>
			<?php } ?>
			
			<?php foreach ($overviewSections as $overviewSection) {
				echo '<h4 class="document-heading1">' . $overviewSection->name . '</h4>';
				if($overviewSection->content != null){
					echo '<p>' . $overviewSection->content . '</p>';
				}
				if($overviewSection->file != null){
	                $ext  = explode('.', $overviewSection->file);
	                $file = Yii::app()->request->baseUrl . '/files/' . $project->company_id . '/' . $project->id . '/sections/' . $overviewSection->id . '.' . end($ext);
	                if (file_exists($_SERVER['DOCUMENT_ROOT'] . $file)){
						echo '<p><a href="' . $file .'"><span class="fa fa-paperclip"/></span> Attached File</a></p>';
	                }
				}
			}} ?>
			
			<!-- Team -->
			<?php if($project->leader_id != null or $project->team != null){ ?>
				<p style="page-break-before: always"/>
				<h4 id="team" class="document-subtitle"><?php echo Language::$team; ?></h4>
			<?php } ?>
			<div class="text-center">
				<?php
				if($project->leader_id != null){
					$avatar = file_exists($_SERVER['DOCUMENT_ROOT'] . Yii::app()->request->baseUrl . '/files/' . $project->company_id . '/avatars/' . $project->leader_id . '.png') ? URL . '/files/' . $project->company_id . '/avatars/' . $project->leader_id . '.png' : URL . '/img/avatar.png';
					$user = Functions::getUserData($project->leader_id)[0]
				?>
					<h4 class="document-heading2"><?php echo Language::$projectLead; ?></h4>
					<ul class="users-list clearfix">
						<li>
							<a class="users-list-name" href="<?php echo URL; ?>/user/<?php echo $user['id']; ?>">
								<img src="<?php echo $avatar; ?>" alt="User Image" width="100px"><br/>
								<?php echo $user['name']; ?>
							</a>
							<span class="users-list-date"><?php echo $user['roles']; ?></span>
							<span class="users-list-date"><?php echo $user['location']; ?> <?php echo Language::$timezones[$user['timezone']]; ?></span>
							<span class="users-list-date"><?php echo $user['email']; ?></span>
						</li>
					</ul>
				<?php } ?>
	
				<?php if($project->team != null){ ?>
				
					<h4 class="document-heading2"><?php echo Language::$teamMembers; ?></h4>
					<ul class="users-list clearfix">
					<?php
						foreach(Functions::getUserData($project->team) as $user){
							$avatar = file_exists($_SERVER['DOCUMENT_ROOT'] . URL . '/files/' . $project->company_id . '/avatars/' . $user['id'] . '.png') ? URL . '/files/' . $project->company_id . '/avatars/' . $user['id'] . '.png' : URL . '/img/avatar.png';
					?>
						<li>
							<a class="users-list-name" href="<?php echo URL; ?>/user/<?php echo $user['id']; ?>">
								<img src="<?php echo $avatar; ?>" alt="User Image" width="100px"><br/>
								<?php echo $user['name']; ?>
							</a>
							<span class="users-list-date"><?php echo $user['roles']; ?></span>
							<span class="users-list-date"><?php echo $user['location']; ?> <?php echo Language::$timezones[$user['timezone']]; ?></span>
							<span class="users-list-date"><?php echo $user['email']; ?></span>
						</li>
				<?php } ?>
					</ul>
				<?php } ?>
			</div>


			<?php if($gameplay and !Yii::app()->user->isGuest){ echo '<p style="page-break-before: always"/><h3 id="gameplay" class="document-title"><small>' . Language::$gameplayDesc . '</small><br/>' . Language::$gameplayMechanics . '</h3><p style="page-break-before: always"/>'; ?>
			<?php if($project->progression != null){ ?>
					<h4 class="document-heading1"><?php echo Language::$gameProgression; ?></h4>
					<p><?php echo $project->progression; ?></p>
				<?php } ?>

				<?php if($project->objectives != null){ ?>
					<h4 class="document-heading1"><?php echo Language::$gameObjectives; ?></h4>
					<p><?php echo $project->objectives; ?></p>
				<?php } ?>
				
				<?php if($project->flow != null){ ?>
					<h4 class="document-heading1"><?php echo Language::$gameFlow; ?></h4>
					<p><?php echo $project->flow; ?></p>
				<?php } ?>
				
				<?php if($project->physics != null){ ?>
					<h4 class="document-heading1"><?php echo Language::$gamePhysics; ?></h4>
					<p><?php echo $project->physics; ?></p>
				<?php } ?>
				
				<?php if($project->movement != null){ ?>
					<h4 class="document-heading1"><?php echo Language::$gameMove; ?></h4>
					<p><?php echo $project->movement; ?></p>
				<?php } ?>
				
				<?php if($project->combat != null){ ?>
					<h4 class="document-heading1"><?php echo Language::$gameCombat; ?></h4>
					<p><?php echo $project->combat; ?></p>
				<?php } ?>
				
				<?php if($project->economy != null){ ?>
					<h4 class="document-heading1"><?php echo Language::$gameEconomy; ?></h4>
					<p><?php echo $project->economy; ?></p>
				<?php } ?>
				
				<?php if($project->switches != null){ ?>
					<h4 class="document-heading1"><?php echo Language::$switchesButtons; ?></h4>
					<p><?php echo $project->switches; ?></p>
				<?php } ?>
				
				<?php if($project->pick != null){ ?>
					<h4 class="document-heading1"><?php echo Language::$pickCarryDrop; ?></h4>
					<p><?php echo $project->pick; ?></p>
				<?php } ?>
				
				<?php if($project->talk != null){ ?>
					<h4 class="document-heading1"><?php echo Language::$gameTalking; ?></h4>
					<p><?php echo $project->talk; ?></p>
				<?php } ?>
				
				<?php if($project->read != null){ ?>
					<h4 class="document-heading1"><?php echo Language::$gameReading; ?></h4>
					<p><?php echo $project->read; ?></p>
				<?php } ?>
				
				<?php if($project->options != null){ ?>
					<h4 class="document-heading1"><?php echo Language::$gameOptions; ?></h4>
					<p><?php echo $project->options; ?></p>
				<?php } ?>
				
				<?php if($project->save != null){ ?>
					<h4 class="document-heading1"><?php echo Language::$replaySave; ?></h4>
					<p><?php echo $project->save; ?></p>
				<?php } ?>
				
				<?php if($project->cheats != null){ ?>
					<h4 class="document-heading1"><?php echo Language::$cheatsEasterEggs; ?></h4>
					<p><?php echo $project->cheats; ?></p>
				<?php } ?>
				
				<?php foreach ($gameplaySections as $gameplaySection) {
					echo '<h4 class="document-heading1">' . $gameplaySection->name . '</h4>';
					if($gameplaySection->content != null){
						echo '<p>' . $gameplaySection->content . '</p>';
					}
					if($gameplaySection->file != null){
						$ext  = explode('.', $gameplaySection->file);
						$file = Yii::app()->request->baseUrl . '/files/' . $project->company_id . '/' . $project->id . '/sections/' . $gameplaySection->id . '.' . end($ext);
						if (file_exists($_SERVER['DOCUMENT_ROOT'] . $file)){
							echo '<p><a href="' . $file .'"><span class="fa fa-paperclip"/></span> Attached File</a></p>';
						}
					}
				}} ?>


			<?php if($story){ echo '<p style="page-break-before: always"/><h3 id="story" class="document-title"><small>' . Language::$storyDesc . '</small><br/>' . Language::$storyCharacters . '</h3><p style="page-break-before: always"/>'; ?>
			
			<?php if($project->license != null){ ?>
				<h4 class="document-heading1"><?php echo Language::$gameLicense; ?></h4>
				<p><?php echo $project->license; ?></p>
			<?php } ?>
			
			<?php if($project->backstory != null){ ?>
				<h4 class="document-heading1"><?php echo Language::$gameBackstory; ?></h4>
				<p><?php echo $project->backstory; ?></p>
			<?php } ?>

			<?php if($project->plot != null){ ?>
				<h4 class="document-heading1"><?php echo Language::$gamePlot; ?></h4>
				<p><?php echo $project->plot; ?></p>
			<?php } ?>
			
			<?php foreach ($storySections as $storySection) {
				echo '<h4 class="document-heading1">' . $storySection->name . '</h4>';
				if($storySection->content != null){
					echo '<p>' . $storySection->content . '</p>';
				}
				if($storySection->file != null){
					$ext  = explode('.', $storySection->file);
					$file = Yii::app()->request->baseUrl . '/files/' . $project->company_id . '/' . $project->id . '/sections/' . $storySection->id . '.' . end($ext);
					if (file_exists($_SERVER['DOCUMENT_ROOT'] . $file)){
						echo '<p><a href="' . $file .'"><span class="fa fa-paperclip"/></span> Attached File</a></p>';
					}
				}
			} ?>
			
			<?php if (count($characters) > 0){ ?>
				<p style="page-break-before: always"/>
				<h4 id="characters" class="document-subtitle"><?php echo Language::$characters; ?></h4>
				<?php foreach ($characters as $character) {
					echo '<h5 class="document-heading1">' . $character->name . '</h5>';
					if($character->attributes_list != null and !Yii::app()->user->isGuest){
						echo '<h6 class="document-heading2">' . Language::$attributes . '</h6>';
						echo '<p>' . $character->attributes_list . '</p>';
					}
					if($character->state_machine != null and !Yii::app()->user->isGuest){
						echo '<h6 class="document-heading2">' . Language::$stateMachine . '</h6>';
						echo '<p>' . $character->state_machine . '</p>';
					}
					if($character->backstory != null){
						echo '<h6 class="document-heading2">' . Language::$backstory . '</h6>';
						echo '<p>' . $character->backstory . '</p>';
					}
					if($character->personality != null){
						echo '<h6 class="document-heading2">' . Language::$personality . '</h6>';
						echo '<p>' . $character->personality . '</p>';
					}
					if($character->characteristics != null and !Yii::app()->user->isGuest){
						echo '<h6 class="document-heading2">' . Language::$characteristics . '</h6>';
						echo '<p>' . $character->characteristics . '</p>';
					}
					if($character->abilities != null and !Yii::app()->user->isGuest){
						echo '<h6 class="document-heading2">' . Language::$abilities . '</h6>';
						echo '<p>' . $character->abilities . '</p>';
					}
					if($character->relevance != null and !Yii::app()->user->isGuest){
						echo '<h6 class="document-heading2">' . Language::$relevance . '</h6>';
						echo '<p>' . $character->relevance . '</p>';
					}
					if($character->relationship != null and !Yii::app()->user->isGuest){
						echo '<h6 class="document-heading2">' . Language::$relationship . '</h6>';
						echo '<p>' . $character->relationship . '</p>';
					}
					if($character->statistics != null and !Yii::app()->user->isGuest){
						echo '<h6 class="document-heading2">' . Language::$statistics . '</h6>';
						echo '<p>' . $character->statistics . '</p>';
					}
					if($character->ai_type != null and !Yii::app()->user->isGuest){
						echo '<h6 class="document-heading2">' . Language::$AIType . '</h6>';
						echo '<p>' . $character->ai_type . '</p>';
					}
					if($character->ai_collition != null and !Yii::app()->user->isGuest){
						echo '<h6 class="document-heading2">' . Language::$AICollision . '</h6>';
						echo '<p>' . $character->ai_collition . '</p>';
					}
					if($character->ai_pathfinding != null and !Yii::app()->user->isGuest){
						echo '<h6 class="document-heading2">' . Language::$AIPathfinding . '</h6>';
						echo '<p>' . $character->ai_pathfinding . '</p>';
					}
				}} ?>
			
			<?php if (count($enviroments) > 0 and !Yii::app()->user->isGuest){ ?>
				<p style="page-break-before: always"/>
				<h4 id="enviromentObjects" class="document-subtitle"><?php echo Language::$enviromentObjects; ?></h4>
				<?php foreach ($enviroments as $enviroment) {
					echo '<h5 class="document-heading1">' . $enviroment->name . '</h5>';
					if($enviroment->attributes_list != null){
						echo '<h6 class="document-heading2">' . Language::$attributes . '</h6>';
						echo '<p>' . $enviroment->attributes_list . '</p>';
					}
					if($enviroment->characteristics != null){
						echo '<h6 class="document-heading2">' . Language::$characteristics . '</h6>';
						echo '<p>' . $enviroment->characteristics . '</p>';
					}
					if($enviroment->relevance != null){
						echo '<h6 class="document-heading2">' . Language::$relevance . '</h6>';
						echo '<p>' . $enviroment->relevance . '</p>';
					}
					if($enviroment->relationship != null){
						echo '<h6 class="document-heading2">' . Language::$relationship . '</h6>';
						echo '<p>' . $enviroment->relationship . '</p>';
					}
					if($enviroment->statistics != null){
						echo '<h6 class="document-heading2">' . Language::$statistics . '</h6>';
						echo '<p>' . $enviroment->statistics . '</p>';
					}
				}} ?>
			
			<?php if (count($cutscenes) > 0 and !Yii::app()->user->isGuest){ ?>
				<p style="page-break-before: always"/>
				<h4 id="cutscenes" class="document-subtitle"><?php echo Language::$cutscenes; ?></h4>
				<?php foreach ($cutscenes as $cutscene) {
					echo '<h5 class="document-heading1">' . $cutscene->description . '</h5>';
					if($cutscene->storyboard != null){
						echo '<h6 class="document-heading2">' . Language::$storyboard . '</h6>';
						echo '<p>' . $cutscene->storyboard . '</p>';
					}
					if($cutscene->script != null){
						echo '<h6 class="document-heading2">' . Language::$script . '</h6>';
						echo '<p>' . $cutscene->script . '</p>';
					}
					if($cutscene->time_est != null){
						$real = '';
						if($cutscene->time != null){
							$real = '</p><p>' . sprintf(Language::$cutsceneTimeRealMessage, Functions::getTime($cutscene->time));
						}
					    echo '<h6 class="document-heading2">' . Language::$time . '</h6>';
					    echo '<p>' . sprintf(Language::$cutsceneTimeMessage, Functions::getTime($cutscene->time_est * 60)) . ' ' . $real . '</p>';
					}
				}} ?>
			
			<?php if (count($dialogs) > 0 and !Yii::app()->user->isGuest){ ?>
				<p style="page-break-before: always"/>
				<h4 id="dialogs" class="document-subtitle"><?php echo Language::$dialogs; ?></h4>
				<?php foreach ($dialogs as $dialog) {
					echo '<h5 class="document-heading1">' . $dialog->name . '</h5>';
					if($dialog->character != null){
						echo '<h6 class="document-heading2">' . Language::$character . '</h6>';
						echo '<p>' . $dialog->character->name . '</p>';
					}
					if($dialog->context != null){
						echo '<h6 class="document-heading2">' . Language::$context . '</h6>';
						echo '<p>' . $dialog->context . '</p>';
					}
					if($dialog->content != null){
						echo '<h6 class="document-heading2">' . Language::$dialog . '</h6>';
						echo '<p>' . $dialog->content . '</p>';
					}
				}}} ?>


			<?php if($areasLevels and !Yii::app()->user->isGuest){ echo '<p style="page-break-before: always"/><h3 id="areasLevels" class="document-title"><small>' . Language::$areasDesc . '</small><br/>' . Language::$areasLevels . '</h3><p style="page-break-before: always"/>';
				foreach ($areasSections as $areasSection) {
					echo '<h4 class="document-heading1">' . $areasSection->name . '</h4>';
					if($areasSection->content != null){
						echo '<p>' . $areasSection->content . '</p>';
					}
					if($areasSection->file != null){
						$ext  = explode('.', $areasSection->file);
						$file = Yii::app()->request->baseUrl . '/files/' . $project->company_id . '/' . $project->id . '/sections/' . $areasSection->id . '.' . end($ext);
						if (file_exists($_SERVER['DOCUMENT_ROOT'] . $file)){
							echo '<p><a href="' . $file .'"><span class="fa fa-paperclip"/></span> Attached File</a></p>';
						}
					}
				}
			?>
			
			<?php if (count($areas) > 0){ ?>
				<p style="page-break-before: always"/>
				<h4 id="areas" class="document-subtitle"><?php echo Language::$areas; ?></h4>
				<?php foreach ($areas as $area) {
					echo '<h5 class="document-heading1">' . $area->name . '</h5>';
					if($area->description != null){
						echo '<h6 class="document-heading2">' . Language::$description . '</h6>';
						echo '<p>' . $area->description . '</p>';
					}
					if($area->characteristics != null){
						echo '<h6 class="document-heading2">' . Language::$characteristics . '</h6>';
						echo '<p>' . $area->characteristics . '</p>';
					}
					if($area->connections != null){
						echo '<h6 class="document-heading2">' . Language::$connections . '</h6>';
						echo '<p>' . $area->connections . '</p>';
					}
				}} ?>
			
			<?php if (count($levels) > 0){ ?>
				<p style="page-break-before: always"/>
				<h4 id="levels" class="document-subtitle"><?php echo Language::$levels; ?></h4>
				<?php foreach ($levels as $level) {
					echo '<h5 class="document-heading1">' . $level->name . '</h5>';
					if($level->synopsis != null){
						echo '<h6 class="document-heading2">' . Language::$synopsis . '</h6>';
						echo '<p>' . $level->synopsis . '</p>';
					}
					if($level->introduction != null){
						echo '<h6 class="document-heading2">' . Language::$introduction . '</h6>';
						echo '<p>' . $level->introduction . '</p>';
					}
					if($level->objectives != null){
						echo '<h6 class="document-heading2">' . Language::$gameObjectives . '</h6>';
						echo '<p>' . $level->objectives . '</p>';
					}
					if($level->description != null){
						echo '<h6 class="document-heading2">' . Language::$description . '</h6>';
						echo '<p>' . $level->description . '</p>';
					}
					if($level->design != null){
						echo '<h6 class="document-heading2">' . Language::$design . '</h6>';
						echo '<p>' . $level->design . '</p>';
					}
					if($level->path != null){
						echo '<h6 class="document-heading2">' . Language::$path . '</h6>';
						echo '<p>' . $level->path . '</p>';
					}
					if($level->encounters != null){
						echo '<h6 class="document-heading2">' . Language::$encounters . '</h6>';
						echo '<p>' . $level->encounters . '</p>';
					}
					if($level->walkthrough != null){
						echo '<h6 class="document-heading2">' . Language::$walkthrough . '</h6>';
						echo '<p>' . $level->walkthrough . '</p>';
					}
					if($level->closing != null){
						echo '<h6 class="document-heading2">' . Language::$closing . '</h6>';
						echo '<p>' . $level->closing . '</p>';
					}
					if($level->time_est != null){
						$real = '';
						if($level->time != null){
							$real = '</p><p>' . sprintf(Language::$levelTimeRealMessage, Functions::getTime($level->time));
						}
					    echo '<h6 class="document-heading2">' . Language::$time . '</h6>';
					    echo '<p>' . sprintf(Language::$levelTimeMessage, Functions::getTime($level->time_est * 60)) . ' ' . $real . '</p>';
					}
				}}} ?>


			<?php if($interface and !Yii::app()->user->isGuest){ echo '<p style="page-break-before: always"/><h3 id="interface" class="document-title"><small>' . Language::$interfaceDesc . '</small><br/>' . Language::$interface . '</h3><p style="page-break-before: always"/>'; ?>
			<?php if($project->screen_flow != null){ ?>
				<h4 class="document-heading1"><?php echo Language::$gameScreenFlow; ?></h4>
				<p><?php echo $project->screen_flow; ?></p>
			<?php } ?>

			<?php if($project->HUD != null){ ?>
				<h4 class="document-heading1"><?php echo Language::$gameHUD; ?></h4>
				<p><?php echo $project->HUD; ?></p>
			<?php } ?>
			
			<?php if($project->rendering != null){ ?>
				<h4 class="document-heading1"><?php echo Language::$gameRendering; ?></h4>
				<p><?php echo $project->rendering; ?></p>
			<?php } ?>
			
			<?php if($project->camera != null){ ?>
				<h4 class="document-heading1"><?php echo Language::$gameCamera; ?></h4>
				<p><?php echo $project->camera; ?></p>
			<?php } ?>
			
			<?php if($project->lighting != null){ ?>
				<h4 class="document-heading1"><?php echo Language::$gameLighting; ?></h4>
				<p><?php echo $project->lighting; ?></p>
			<?php } ?>
			
			<?php if($project->controls != null){ ?>
				<h4 class="document-heading1"><?php echo Language::$gameControls; ?></h4>
				<p><?php echo $project->controls; ?></p>
			<?php } ?>
			
			<?php if($project->help != null){ ?>
				<h4 class="document-heading1"><?php echo Language::$gameHelp; ?></h4>
				<p><?php echo $project->help; ?></p>
			<?php } ?>
			
			<?php foreach ($interfaceSections as $interfaceSection) {
				echo '<h4 class="document-heading1">' . $interfaceSection->name . '</h4>';
				if($interfaceSection->content != null){
					echo '<p>' . $interfaceSection->content . '</p>';
				}
				if($interfaceSection->file != null){
					$ext  = explode('.', $interfaceSection->file);
					$file = Yii::app()->request->baseUrl . '/files/' . $project->company_id . '/' . $project->id . '/sections/' . $interfaceSection->id . '.' . end($ext);
					if (file_exists($_SERVER['DOCUMENT_ROOT'] . $file)){
						echo '<p><a href="' . $file .'"><span class="fa fa-paperclip"/></span> Attached File</a></p>';
					}
				}
			} ?>
			
			<?php if (count($screens) > 0){ ?>
				<p style="page-break-before: always"/>
				<h4 id="screens" class="document-subtitle"><?php echo Language::$screens; ?></h4>
				<?php foreach ($screens as $screen) {
					echo '<h5 class="document-heading1">' . $screen->name . '</h5>';
					if($screen->description != null){
						echo '<h6 class="document-heading2">' . Language::$description . '</h6>';
						echo '<p>' . $screen->description . '</p>';
					}
					if($screen->file != null){
						$ext  = explode('.', $screen->file);
						$file = Yii::app()->request->baseUrl . '/files/' . $project->company_id . '/' . $project->id . '/sections/' . $screen->id . '.' . end($ext);
						if (file_exists($_SERVER['DOCUMENT_ROOT'] . $file)){
							echo '<p><a href="' . $file .'"><span class="fa fa-paperclip"/></span> Attached File</a></p>';
						}
					}
					if($screen->time_est != null){
						$real = '';
						if($screen->time != null){
							$real = '</p><p>' . sprintf(Language::$screenTimeRealMessage, Functions::getTime($screen->time));
						}
					    echo '<h6 class="document-heading2">' . Language::$time . '</h6>';
					    echo '<p>' . sprintf(Language::$screenTimeMessage, Functions::getTime($screen->time_est * 60)) . ' ' . $real . '</p>';
					}
				}} ?>
			
			<?php if (count($sounds) > 0){ ?>
				<p style="page-break-before: always"/>
				<h4 id="sounds" class="document-subtitle"><?php echo Language::$sounds; ?></h4>
				<?php foreach ($sounds as $sound) {
					echo '<h5 class="document-heading1">' . $sound->name . '</h5>';
					if($sound->description != null){
						echo '<h6 class="document-heading2">' . Language::$description . '</h6>';
						echo '<p>' . $sound->description . '</p>';
					}
					if($sound->time_est != null){
						$real = '';
						if($sound->time != null){
							$real = '</p><p>' . sprintf(Language::$soundTimeRealMessage, Functions::getTime($sound->time));
						}
					    echo '<h6 class="document-heading2">' . Language::$time . '</h6>';
					    echo '<p>' . sprintf(Language::$soundTimeMessage, Functions::getTime($sound->time_est * 60)) . ' ' . $real . '</p>';
					}
					if($sound->file != null){
						$ext  = explode('.', $sound->file);
						$file = Yii::app()->request->baseUrl . '/files/' . $project->company_id . '/' . $project->id . '/sections/' . $sound->id . '.' . end($ext);
						if (file_exists($_SERVER['DOCUMENT_ROOT'] . $file)){
							echo '<p><a href="' . $file .'"><span class="fa fa-paperclip"/></span> Attached File</a></p>';
						}
					}
				}} ?>
			
			<?php if (count($musics) > 0){ ?>
				<p style="page-break-before: always"/>
				<h4 id="music" class="document-subtitle"><?php echo Language::$music; ?></h4>
				<?php foreach ($musics as $music) {
					echo '<h5 class="document-heading1">' . $music->name . '</h5>';
					if($music->description != null){
						echo '<h6 class="document-heading2">' . Language::$description . '</h6>';
						echo '<p>' . $music->description . '</p>';
					}
					if($music->time_est != null){
						$real = '';
						if($music->time != null){
							$real = '</p><p>' . sprintf(Language::$musicTimeRealMessage, Functions::getTime($music->time));
						}
					    echo '<h6 class="document-heading2">' . Language::$time . '</h6>';
					    echo '<p>' . sprintf(Language::$musicTimeMessage, Functions::getTime($music->time_est * 60)) . ' ' . $real . '</p>';
					}
					if($music->file != null){
						$ext  = explode('.', $music->file);
						$file = Yii::app()->request->baseUrl . '/files/' . $project->company_id . '/' . $project->id . '/sections/' . $music->id . '.' . end($ext);
						if (file_exists($_SERVER['DOCUMENT_ROOT'] . $file)){
							echo '<p><a href="' . $file .'"><span class="fa fa-paperclip"/></span> Attached File</a></p>';
						}
					}
				}}} ?>


			<?php if($technical){ echo '<p style="page-break-before: always"/><h3 id="technical" class="document-title"><small>' . Language::$technicalDesc . '</small><br/>' . Language::$technical . '</h3><p style="page-break-before: always"/>'; ?>
			<?php if($project->target_hardware != null){ ?>
				<h4 class="document-heading1"><?php echo Language::$gameHardware; ?></h4>
				<p><?php echo $project->target_hardware; ?></p>
			<?php } ?>

			<?php if($project->dev_enviroment != null and !Yii::app()->user->isGuest){ ?>
				<h4 class="document-heading1"><?php echo Language::$gameDevEnv; ?></h4>
				<p><?php echo $project->dev_enviroment; ?></p>
			<?php } ?>
			
			<?php if($project->dev_standards != null and !Yii::app()->user->isGuest){ ?>
				<h4 class="document-heading1"><?php echo Language::$gameDevStandards; ?></h4>
				<p><?php echo $project->dev_standards; ?></p>
			<?php } ?>
			
			<?php if($project->engine != null){ ?>
				<h4 class="document-heading1"><?php echo Language::$gameEngine; ?></h4>
				<p><?php echo $project->engine; ?></p>
			<?php } ?>
			
			<?php if($project->network != null and !Yii::app()->user->isGuest){ ?>
				<h4 class="document-heading1"><?php echo Language::$gameNetwork; ?></h4>
				<p><?php echo $project->network; ?></p>
			<?php } ?>
			
			<?php if($project->conventions != null and !Yii::app()->user->isGuest){ ?>
				<h4 class="document-heading1"><?php echo Language::$codeConventions; ?></h4>
				<p><?php echo $project->conventions; ?></p>
			<?php } ?>
			
			<?php foreach ($technicalSections as $technicalSection) {
				echo '<h4 class="document-heading1">' . $technicalSection->name . '</h4>';
				if($technicalSection->content != null){
					echo '<p>' . $technicalSection->content . '</p>';
				}
				if($technicalSection->file != null){
					$ext  = explode('.', $technicalSection->file);
					$file = Yii::app()->request->baseUrl . '/files/' . $project->company_id . '/' . $project->id . '/sections/' . $technicalSection->id . '.' . end($ext);
					if (file_exists($_SERVER['DOCUMENT_ROOT'] . $file)){
						echo '<p><a href="' . $file .'"><span class="fa fa-paperclip"/></span> Attached File</a></p>';
					}
				}
			} ?>
			
			<?php if (count($components) > 0 and !Yii::app()->user->isGuest){ ?>
				<p style="page-break-before: always"/>
				<h4 id="components" class="document-subtitle"><?php echo Language::$softwareComponents; ?></h4>
				<?php foreach ($components as $component) {
					echo '<h5 class="document-heading1">' . $component->name . '</h5>';
					if($component->description != null){
						echo '<h6 class="document-heading2">' . Language::$description . '</h6>';
						echo '<p>' . $component->description . '</p>';
					}
					if($component->time_est != null){
						$real = '';
						if($component->time != null){
							$real = '</p><p>' . sprintf(Language::$componentTimeRealMessage, Functions::getTime($component->time));
						}
					    echo '<h6 class="document-heading2">' . Language::$time . '</h6>';
					    echo '<p>' . sprintf(Language::$componentTimeMessage, Functions::getTime($component->time_est * 60)) . ' ' . $real . '</p>';
					}
				}}} ?>


			<?php if($art){ echo '<p style="page-break-before: always"/><h3 id="art" class="document-title"><small>' . Language::$artDesc . '</small><br/>' . Language::$gameArt . '</h3><p style="page-break-before: always"/>'; ?>
			<?php if($project->look != null){ ?>
				<h4 class="document-heading1"><?php echo Language::$gameLookFeel; ?></h4>
				<p><?php echo $project->look; ?></p>
			<?php } ?>

			<?php if($project->style != null){ ?>
				<h4 class="document-heading1"><?php echo Language::$artStyle; ?></h4>
				<p><?php echo $project->style; ?></p>
			<?php } ?>
			
			<?php foreach ($artSections as $artSection) {
				echo '<h4 class="document-heading1">' . $artSection->name . '</h4>';
				if($artSection->content != null){
					echo '<p>' . $artSection->content . '</p>';
				}
				if($artSection->file != null){
					$ext  = explode('.', $artSection->file);
					$file = Yii::app()->request->baseUrl . '/files/' . $project->company_id . '/' . $project->id . '/sections/' . $artSection->id . '.' . end($ext);
					if (file_exists($_SERVER['DOCUMENT_ROOT'] . $file)){
						echo '<p><a href="' . $file .'"><span class="fa fa-paperclip"/></span> Attached File</a></p>';
					}
				}
			} ?>
			
			<?php if (count($graphics) > 0 and !Yii::app()->user->isGuest){ ?>
				<p style="page-break-before: always"/>
				<h4 id="graphics" class="document-subtitle"><?php echo Language::$graphics; ?></h4>
				<?php
				$align = "right";
				foreach ($graphics as $graphic) {
					if ($align == "right"){
						$align = "left";
					}
					else{
						$align = "right";
					}
					echo '<h5 class="document-heading1">' . $graphic->name . '</h5>';
					if($graphic->description != null or $graphic->file != null){
						echo '<h6 class="document-heading2">' . Language::$description . '</h6>';
						if($graphic->description != null){
							
							if($graphic->file != null){
								$ext  = explode('.', $graphic->file);
								$file = Yii::app()->request->baseUrl . '/files/' . $project->company_id . '/' . $project->id . '/graphics/' . $graphic->id . '.' . end($ext);
								if (file_exists($_SERVER['DOCUMENT_ROOT'] . $file)){
									//echo '<p><a href="' . $file .'"><span class="fa fa-paperclip"/></span> Attached File</a></p>';
									echo '<img src="' . $file . '" class="img-responsive" style="max-width:150px; margin-right:25px; margin-left:25px;" align="' . $align . '">';
								}
							}
							echo '<p>' . $graphic->description . '</p><p style="clear: both;"/>';
						}
					}
					if($graphic->time_est != null){
					    echo '<h6 class="document-heading2">' . Language::$time . '</h6>';
						$real = '';
						if($graphic->time != null){
							$real = '</p><p>' . sprintf(Language::$graphicTimeCurrentMessage, Functions::getTime($graphic->time));
						}
					    echo '<p>' . sprintf(Language::$graphicTimeMessage, Functions::getTime($graphic->time_est * 60)) . ' ' . $real . '</p>';
					}
				}}} ?>


			<?php if($management and !Yii::app()->user->isGuest){ echo '<p style="page-break-before: always"/><h3 id="management" class="document-title"><small>' . Language::$managementDesc . '</small><br/>' . Language::$management . '</h3><p style="page-break-before: always"/>'; ?>
			<?php /*if($project->budget != null){ ?>
				<h4 class="document-heading1"><?php echo Language::$projectBudget; ?></h4>
				<p><?php echo Language::$currencySymbol[$project->currency] . ' ' . number_format($project->budget, 2); ?></p>
			<?php }*/ ?>

			<?php if($project->monetization != null){ ?>
				<h4 class="document-heading1"><?php echo Language::$projectMonetization; ?></h4>
				<p><?php echo $project->monetization; ?></p>
			<?php } ?>
			
			<?php if($project->risks != null){ ?>
				<h4 class="document-heading1"><?php echo Language::$projectRisks; ?></h4>
				<p><?php echo $project->risks; ?></p>
			<?php } ?>
			
			<?php if($project->marketing != null){ ?>
				<h4 class="document-heading1"><?php echo Language::$projectMarketing; ?></h4>
				<p><?php echo $project->marketing; ?></p>
			<?php } ?>
			
			<?php if($project->production_date != null){ ?>
				<h4 class="document-heading1"><?php echo Language::$projectProduction; ?></h4>
				<p><?php echo $project->production_date; ?></p>
			<?php } ?>
			
			<?php if($project->launch_date != null){ ?>
				<h4 class="document-heading1"><?php echo Language::$projectRelease; ?></h4>
				<p><?php echo $project->launch_date; ?></p>
			<?php } ?>
			
			<?php foreach ($managementSections as $managementSection) {
				echo '<h4 class="document-heading1">' . $managementSection->name . '</h4>';
				if($managementSection->content != null){
					echo '<p>' . $managementSection->content . '</p>';
				}
				if($managementSection->file != null){
					$ext  = explode('.', $managementSection->file);
					$file = Yii::app()->request->baseUrl . '/files/' . $project->company_id . '/' . $project->id . '/sections/' . $managementSection->id . '.' . end($ext);
					if (file_exists($_SERVER['DOCUMENT_ROOT'] . $file)){
						echo '<p><a href="' . $file .'"><span class="fa fa-paperclip"/></span> Attached File</a></p>';
					}
				}
			} ?>
			
			<?php if (count($resources) > 0){ ?>
				<p style="page-break-before: always"/>
				<h4 id="resources" class="document-subtitle"><?php echo Language::$resources; ?></h4>
				<?php foreach ($resources as $resource) {
					echo '<h5 class="document-heading1">' . $resource->name . '</h5>';
					if($resource->description != null){
						echo '<h6 class="document-heading2">' . Language::$description . '</h6>';
						echo '<p>' . $resource->description . '</p>';
					}
					if($resource->units != null){
						echo '<h6 class="document-heading2">' . Language::$units . '</h6>';
						echo '<p>' . $resource->units . '</p>';
					}
					if($resource->cost != null){
						echo '<h6 class="document-heading2">' . Language::$cost . '</h6>';
						echo '<p>' . Language::$currencySymbol[$project->currency] . ' ' . number_format($resource->cost, 2) . '</p>';
					}
				}}} ?>
		</div>
</section>