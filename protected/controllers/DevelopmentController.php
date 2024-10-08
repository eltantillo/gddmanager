<?php

class DevelopmentController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array(
					'index',
					'view',
					'task',
					'graphic',
					'sound',
					'music',
					'component',
					'bug',
					'screen',
					'level',
					'cutscene',
					'dialog',
					'timesheet',
					'timesheetdelete'
				),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionIndex()
	{
		$projects = Project::model()->findAllbyAttributes(array(
			'company_id' => Yii::app()->user->company,
		));
		
		if (!in_array('admin', Yii::app()->user->roles)){
			foreach ($projects as $key => $project) {
				$usersArray = explode(',', $project->team);
				if (!in_array(Yii::app()->user->id, $usersArray) and Yii::app()->user->id != $project->leader_id){
					unset($projects[$key]);
				}
			}
		}

		$this->render('index',array(
			'projects' => $projects,
		));
	}

	public function actionView()
	{
		if(isset($_GET['id'])){
			$project = Project::model()->findbyPk($_GET['id']);
			
			if(isset($_POST['Bug'])){
				$bug = new Bug;
				
				$bug->attributes = $_POST['Bug'];
				$bug->project_id = $project->id;
				
				$bug->picture = CUploadedFile::getInstance($bug,'picture');
				if ($bug->save()){
					if($bug->picture != null){
						$ext = explode('.', $bug->picture);
						$bug->picture->saveAs('files/' . Yii::app()->user->company . '/' . $bug->project_id . '/bugs/' . $bug->id . '.' . end($ext));
					}
				}
			}
			
			if ($project->company_id == Yii::app()->user->company && (in_array('admin', Yii::app()->user->roles) || in_array(Yii::app()->user->id, explode(',', $project->team)) || Yii::app()->user->id == $project->leader_id)){
				$user = User::model()->findByPk(Yii::app()->user->id);
				$user->active_project_id = $project->id;
				$user->update();

				$graphics   = array();
				$sounds     = array();
				$musics     = array();
				$components = array();
				$bugs       = array();
				
				$screens   = array();
				$cutscenes = array();
				$dialogs   = array();
				$levels    = array();
				
				$tasks     = array();
				
				$admin      = in_array('admin', Yii::app()->user->roles);
				$designer   = in_array('designer', Yii::app()->user->roles);
				$artist     = in_array('artist', Yii::app()->user->roles);
				$composer   = in_array('composer', Yii::app()->user->roles);
				$writer     = in_array('writer', Yii::app()->user->roles);
				$programmer = in_array('programmer', Yii::app()->user->roles);
				$tester     = in_array('tester', Yii::app()->user->roles);
				
				// All users
				if (isset($_GET['tasks'])){
					if ($_GET['tasks'] == 'finish'){
						$tasks = Task::model()->findAllbyAttributes(array(
							'project_id' => $project->id,
							'finish' => 1,
						));
					}
					else{
						$tasks = Task::model()->findAllbyAttributes(array(
							'project_id' => $project->id,
						));
					}
				}
				else{
					$tasks = Task::model()->findAllbyAttributes(array(
						'project_id' => $project->id,
						'finish' => 0,
					));
				}

				// Artist
				if ($admin or $designer or $artist){
					if (isset($_GET['graphics'])){
						if ($_GET['graphics'] == 'sketch'){
							$graphics = Graphic::model()->findAllbyAttributes(array(
								'project_id' => $project->id,
								'sketch' => 0,
							));
						}
						else if ($_GET['graphics'] == 'valid'){
							$graphics = Graphic::model()->findAllbyAttributes(array(
								'project_id' => $project->id,
								'sketch' => 1,
								'valid' => 0,
							));
						}
						else if ($_GET['graphics'] == 'final'){
							$graphics = Graphic::model()->findAllbyAttributes(array(
								'project_id' => $project->id,
								'valid' => 1,
								'finish' => 0,
							));
						}
						else if ($_GET['graphics'] == 'finish'){
							$graphics = Graphic::model()->findAllbyAttributes(array(
								'project_id' => $project->id,
								'finish' => 1,
							));
						}
						else{
							$graphics = Graphic::model()->findAllbyAttributes(array(
								'project_id' => $project->id,
							));
						}
					}
					else{
						if ($admin or $designer){
							$graphics = array_merge($graphics, Graphic::model()->findAllbyAttributes(array(
								'project_id' => $project->id,
								'sketch' => 1,
								'valid' => 0,
							)));
						}
						if ($admin or $artist){
							$graphics = array_merge($graphics, Graphic::model()->findAllbyAttributes(array(
								'project_id' => $project->id,
								'sketch' => 0,
								'user_id' => Yii::app()->user->id,
							)));
							$graphics = array_merge($graphics, Graphic::model()->findAllbyAttributes(array(
								'project_id' => $project->id,
								'valid' => 1,
								'finish' => 0,
								'user_id' => Yii::app()->user->id,
							)));
						}
						$graphics = array_unique($graphics);
					}
				}
				
				// Composer
				if ($admin or $designer or $composer){
					if (isset($_GET['sounds'])){
						if ($_GET['sounds'] == 'produce'){
							$sounds = Sound::model()->findAllbyAttributes(array(
								'project_id' => $project->id,
								'finish' => 0,
							));
						}
						else if ($_GET['sounds'] == 'valid'){
							$sounds = Sound::model()->findAllbyAttributes(array(
								'project_id' => $project->id,
								'finish' => 1,
								'valid' => 0,
							));
						}
						else if ($_GET['sounds'] == 'finish'){
							$sounds = Sound::model()->findAllbyAttributes(array(
								'project_id' => $project->id,
								'valid' => 1,
							));
						}
						else{
							$sounds = Sound::model()->findAllbyAttributes(array(
								'project_id' => $project->id,
							));
						}
					}
					else{
						if ($admin or $designer){
							$sounds = array_merge($sounds, Sound::model()->findAllbyAttributes(array(
								'project_id' => $project->id,
								'finish' => 1,
								'valid' => 0,
							)));
						}
						if ($admin or $composer){
							$sounds = array_merge($sounds, Sound::model()->findAllbyAttributes(array(
								'project_id' => $project->id,
								'finish' => 0,
								'user_id' => Yii::app()->user->id,
							)));
						}
						$sounds = array_unique($sounds);
					}


					if (isset($_GET['music'])){
						if ($_GET['music'] == 'produce'){
							$musics = Music::model()->findAllbyAttributes(array(
								'project_id' => $project->id,
								'finish' => 0,
							));
						}
						else if ($_GET['music'] == 'valid'){
							$musics = Music::model()->findAllbyAttributes(array(
								'project_id' => $project->id,
								'finish' => 1,
								'valid' => 0,
							));
						}
						else if ($_GET['music'] == 'finish'){
							$musics = Music::model()->findAllbyAttributes(array(
								'project_id' => $project->id,
								'valid' => 1,
							));
						}
						else{
							$musics = Music::model()->findAllbyAttributes(array(
								'project_id' => $project->id,
							));
						}
					}
					else{
						if ($admin or $designer){
							$musics = array_merge($musics, Music::model()->findAllbyAttributes(array(
								'project_id' => $project->id,
								'finish' => 1,
								'valid' => 0,
							)));
						}
						if ($admin or $composer){
							$musics = array_merge($musics, Music::model()->findAllbyAttributes(array(
								'project_id' => $project->id,
								'finish' => 0,
								'user_id' => Yii::app()->user->id,
							)));
						}
						$musics = array_unique($musics);
					}
				}
				
				// Programmer, Tester and Writer
				if ($admin or $designer or $programmer or $tester or $writer){
					//Dialogs
					if (isset($_GET['dialogs'])){
						if ($_GET['dialogs'] == 'write'){
							$dialogs = Dialog::model()->findAllbyAttributes(array(
								'project_id' => $project->id,
								'finish' => 0,
							));
						}
						else if ($_GET['dialogs'] == 'valid'){
							$dialogs = Dialog::model()->findAllbyAttributes(array(
								'project_id' => $project->id,
								'finish' => 1,
								'valid' => 0,
							));
						}
						else if ($_GET['dialogs'] == 'code'){
							$dialogs = Dialog::model()->findAllbyAttributes(array(
								'project_id' => $project->id,
								'valid' => 1,
								'code' => 0,
							));
						}
						else if ($_GET['dialogs'] == 'test'){
							$dialogs = Dialog::model()->findAllbyAttributes(array(
								'project_id' => $project->id,
								'code' => 1,
								'test' => 0,
							));
						}
						else if ($_GET['dialogs'] == 'finish'){
							$dialogs = Dialog::model()->findAllbyAttributes(array(
								'project_id' => $project->id,
								'test' => 1,
							));
						}
						else{
							$dialogs = Dialog::model()->findAllbyAttributes(array(
								'project_id' => $project->id,
							));
						}
					}
					else{
						if ($admin or $writer){
							$dialogs = array_merge($dialogs, Dialog::model()->findAllbyAttributes(array(
								'project_id' => $project->id,
								'finish' => 0,
								'user_id' => Yii::app()->user->id,
							)));
						}
						if ($admin or $designer){
							$dialogs = array_merge($dialogs, Dialog::model()->findAllbyAttributes(array(
								'project_id' => $project->id,
								'finish' => 1,
								'valid' => 0,
							)));
						}
						if ($admin or $programmer){
							$dialogs = array_merge($dialogs, Dialog::model()->findAllbyAttributes(array(
								'project_id' => $project->id,
								'valid' => 1,
								'code' => 0,
								'user_id' => Yii::app()->user->id,
							)));
						}
						if ($admin or $tester){
							$dialogs = array_merge($dialogs, Dialog::model()->findAllbyAttributes(array(
								'project_id' => $project->id,
								'code' => 1,
								'test' => 0,
								'user_id' => Yii::app()->user->id,
							)));
						}
						$dialogs = array_unique($dialogs);
					}
				}
				
				// Programmer, Tester and Artist
				if ($admin or $designer or $programmer or $tester or $artist){
					//Screens
					if (isset($_GET['screens'])){
						if ($_GET['screens'] == 'design'){
							$screens = Screen::model()->findAllbyAttributes(array(
								'project_id' => $project->id,
								'finish' => 0,
							));
						}
						else if ($_GET['screens'] == 'valid'){
							$screens = Screen::model()->findAllbyAttributes(array(
								'project_id' => $project->id,
								'finish' => 1,
								'valid' => 0,
							));
						}
						else if ($_GET['screens'] == 'code'){
							$screens = Screen::model()->findAllbyAttributes(array(
								'project_id' => $project->id,
								'valid' => 1,
								'code' => 0,
							));
						}
						else if ($_GET['screens'] == 'test'){
							$screens = Screen::model()->findAllbyAttributes(array(
								'project_id' => $project->id,
								'code' => 1,
								'test' => 0,
							));
						}
						else if ($_GET['screens'] == 'finish'){
							$screens = Screen::model()->findAllbyAttributes(array(
								'project_id' => $project->id,
								'test' => 1,
							));
						}
						else{
							$screens = Screen::model()->findAllbyAttributes(array(
								'project_id' => $project->id,
							));
						}
					}
					else{
						if ($admin or $artist){
							$screens = array_merge($screens, Screen::model()->findAllbyAttributes(array(
								'project_id' => $project->id,
								'finish' => 0,
								'user_id' => Yii::app()->user->id,
							)));
						}
						if ($admin or $designer){
							$screens  = array_merge($screens, Screen::model()->findAllbyAttributes(array(
								'project_id' => $project->id,
								'finish' => 1,
								'valid' => 0,
							)));
						}
						if ($admin or $programmer){
							$screens  = array_merge($screens, Screen::model()->findAllbyAttributes(array(
								'project_id' => $project->id,
								'valid' => 1,
								'code' => 0,
								'user_id' => Yii::app()->user->id,
							)));
						}
						if ($admin or $tester){
							$screens  = array_merge($screens, Screen::model()->findAllbyAttributes(array(
								'project_id' => $project->id,
								'valid' => 1,
								'test' => 0,
								'user_id' => Yii::app()->user->id,
							)));
						}
						$screens = array_unique($screens);
					}
				}
				
				// Writer, Artist, Programmer and Tester
				if ($admin or $designer or $writer or $artist or $programmer or $tester){
					//Scenes
					if (isset($_GET['cutscenes'])){
						if ($_GET['cutscenes'] == 'code'){
							$cutscenes = Cutscene::model()->findAllbyAttributes(array(
								'project_id' => $project->id,
								'code' => 0,
							));
						}
						if ($_GET['cutscenes'] == 'valid'){
							$cutscenes = Cutscene::model()->findAllbyAttributes(array(
								'project_id' => $project->id,
								'code' => 1,
								'valid' => 0,
							));
						}
						if ($_GET['cutscenes'] == 'test'){
							$cutscenes = Cutscene::model()->findAllbyAttributes(array(
								'project_id' => $project->id,
								'valid' => 1,
								'test' => 0,
							));
						}
						else if ($_GET['cutscenes'] == 'finish'){
							$cutscenes = Cutscene::model()->findAllbyAttributes(array(
								'project_id' => $project->id,
								'test' => 1,
							));
						}
						else{
							$cutscenes = Cutscene::model()->findAllbyAttributes(array(
								'project_id' => $project->id,
							));
						}
					}
					else{
						if ($admin or $writer){
							$cutscenes = array_merge($cutscenes, Cutscene::model()->findAllbyAttributes(array(
								'project_id' => $project->id,
								'finish' => 0,
								'user_id' => Yii::app()->user->id,
							)));
						}
						if ($admin or $artist){
							$cutscenes = array_merge($cutscenes, Cutscene::model()->findAllbyAttributes(array(
								'project_id' => $project->id,
								'finish' => 1,
								'sketch' => 0,
								'user_id' => Yii::app()->user->id,
							)));
						}
						if ($admin or $designer){
							$cutscenes = array_merge($cutscenes, Cutscene::model()->findAllbyAttributes(array(
								'project_id' => $project->id,
								'sketch' => 1,
								'valid' => 0,
							)));
						}
						if ($admin or $programmer){
							$cutscenes = array_merge($cutscenes, Cutscene::model()->findAllbyAttributes(array(
								'project_id' => $project->id,
								'valid' => 1,
								'code' => 0,
								'user_id' => Yii::app()->user->id,
							)));
						}
						if ($admin or $tester){
							$cutscenes = array_merge($cutscenes, Cutscene::model()->findAllbyAttributes(array(
								'project_id' => $project->id,
								'code' => 1,
								'test' => 0,
								'user_id' => Yii::app()->user->id,
							)));
						}
						$cutscenes = array_unique($cutscenes);
					}
				}

				// Programmer and Tester
				if ($admin or $designer or $programmer or $tester){
					//Software Components
					if (isset($_GET['components'])){
						if ($_GET['components'] == 'code'){
							$components = Component::model()->findAllbyAttributes(array(
								'project_id' => $project->id,
								'code' => 0,
							));
						}
						else if ($_GET['components'] == 'valid'){
							$components = Component::model()->findAllbyAttributes(array(
								'project_id' => $project->id,
								'code' => 1,
								'valid' => 0,
							));
						}
						else if ($_GET['components'] == 'test'){
							$components = Component::model()->findAllbyAttributes(array(
								'project_id' => $project->id,
								'valid' => 1,
								'test' => 0,
							));
						}
						else if ($_GET['components'] == 'finish'){
							$components = Component::model()->findAllbyAttributes(array(
								'project_id' => $project->id,
								'test' => 1,
							));
						}
						else{
							$components = Component::model()->findAllbyAttributes(array(
								'project_id' => $project->id,
							));
						}
					}
					else{
						if ($admin or $programmer){
							$components = array_merge($components, Component::model()->findAllbyAttributes(array(
								'project_id' => $project->id,
								'code' => 0,
								'user_id' => Yii::app()->user->id,
							)));
						}
						if ($admin or $designer){
							$components = array_merge($components, Component::model()->findAllbyAttributes(array(
								'project_id' => $project->id,
								'code' => 1,
								'valid' => 0,
							)));
						}
						if ($admin or $tester){
							$components = array_merge($components, Component::model()->findAllbyAttributes(array(
								'project_id' => $project->id,
								'valid' => 1,
								'test' => 0,
								'user_id' => Yii::app()->user->id,
							)));
						}
						$components = array_unique($components);
					}
					
					//Levels
					if (isset($_GET['levels'])){
						if ($_GET['levels'] == 'design'){
							$levels = Level::model()->findAllbyAttributes(array(
								'project_id' => $project->id,
								'finish' => 0,
							));
						}
						else if ($_GET['levels'] == 'code'){
							$levels = Level::model()->findAllbyAttributes(array(
								'project_id' => $project->id,
								'finish' => 1,
								'code' => 0,
							));
						}
						else if ($_GET['levels'] == 'valid'){
							$levels = Level::model()->findAllbyAttributes(array(
								'project_id' => $project->id,
								'code' => 1,
								'valid' => 0,
							));
						}
						else if ($_GET['levels'] == 'test'){
							$levels = Level::model()->findAllbyAttributes(array(
								'project_id' => $project->id,
								'valid' => 1,
								'test' => 0,
							));
						}
						else if ($_GET['levels'] == 'finish'){
							$levels = Level::model()->findAllbyAttributes(array(
								'project_id' => $project->id,
								'test' => 1,
							));
						}
						else{
							$levels = Level::model()->findAllbyAttributes(array(
								'project_id' => $project->id,
							));
						}
					}
					else{
						if ($admin or $designer){
							$levels = array_merge($levels, Level::model()->findAllbyAttributes(array(
								'project_id' => $project->id,
								'finish' => 0,
							)));
							$levels = array_merge($levels, Level::model()->findAllbyAttributes(array(
								'project_id' => $project->id,
								'code' => 1,
								'valid' => 0,
							)));
						}
						if ($admin or $programmer){
							$levels = array_merge($levels, Level::model()->findAllbyAttributes(array(
								'project_id' => $project->id,
								'finish' => 1,
								'code' => 0,
								'user_id' => Yii::app()->user->id,
							)));
						}
						if ($admin or $tester){
							$levels = array_merge($levels, Level::model()->findAllbyAttributes(array(
								'project_id' => $project->id,
								'valid' => 1,
								'test' => 0,
								'user_id' => Yii::app()->user->id,
							)));
						}
						$levels = array_unique($levels);
					}
					
					//Bugs
					if (isset($_GET['bugs'])){
						if ($_GET['bugs'] == 'code'){
							$bugs = Bug::model()->findAllbyAttributes(array(
								'project_id' => $project->id,
								'code' => 0,
							));
						}
						else if ($_GET['bugs'] == 'test'){
							$bugs = Bug::model()->findAllbyAttributes(array(
								'project_id' => $project->id,
								'code' => 1,
								'test' => 0,
							));
						}
						else if ($_GET['bugs'] == 'fix'){
							$bugs = Bug::model()->findAllbyAttributes(array(
								'project_id' => $project->id,
								'test' => 1,
							));
						}
						else{
							$bugs = Bug::model()->findAllbyAttributes(array(
								'project_id' => $project->id,
							));
						}
					}
					else{
						if ($admin or $programmer){
							$bugs = array_merge($bugs, Bug::model()->findAllbyAttributes(array(
								'project_id' => $project->id,
								'code' => 0,
								'user_id' => Yii::app()->user->id,
							)));
						}
						if ($admin or $tester){
							$bugs = array_merge($bugs, Bug::model()->findAllbyAttributes(array(
								'project_id' => $project->id,
								'code' => 1,
								'test' => 0,
								'user_id' => Yii::app()->user->id,
							)));
						}
						$bugs = array_unique($bugs);
					}
				}
				
				// Remove unworkable tasks
				if (!isset($_GET['components'])/* or $_GET['components'] != "all"*/){
					foreach ($components as $key => $component) {
						//Remove component if dependency not finished
						if ($component->dependency != NULL && !$component->dependency->finished){
							unset($components[$key]);
						}
						//Remove component if graphics sketch not finished
						else{
							$componentGraphics = explode(',', $component->graphics);
							foreach ($componentGraphics as $graph) {
								$g = Graphic::model()->findbyPk($graph);
								if ($g != NULL){
									if (!$g->sketch){
										unset($components[$key]);
									}
								}
							}
						}
					}
				}

				if (!isset($_GET['screens'])/* or $_GET['screens'] != "all"*/){
					foreach ($screens as $key => $screen) {
						//Delete screen if graphics sketch not finished
						$screenGraphics = explode(',', $screen->graphics);
						foreach ($screenGraphics as $graph) {
							$g = Graphic::model()->findbyPk($graph);
							if ($g != NULL){
								if (!$g->sketch){
									unset($screens[$key]);
								}
							}
						}
					}
				}

				if (!isset($_GET['cutscenes'])/* or $_GET['cutscenes'] != "all"*/){
					foreach ($cutscenes as $key => $cutscene) {
						//Delete scene if graphics sketch not finished
						$cutsceneGraphics = explode(',', $cutscene->graphics);
						foreach ($cutsceneGraphics as $graph) {
							$g = Graphic::model()->findbyPk($graph);
							if ($g != NULL){
								if (!$g->sketch){
									unset($cutscenes[$key]);
								}
							}
						}
					}
				}

				if (!isset($_GET['levels'])/* or $_GET['levels'] != "all"*/){
					foreach ($levels as $key => $level) {
						//Delete level if graphics sketch not finished
						$levelGraphics = explode(',', $level->graphics);
						foreach ($levelGraphics as $graph) {
							$g = Graphic::model()->findbyPk($graph);
							if ($g != NULL){
								if (!$g->sketch){
									unset($levels[$key]);
								}
							}
						}
					}
				}
				
				$users = CHtml::listData(
					User::model()->findAllbyAttributes(array(), 'roles LIKE \'%programmer%\' AND company_id = ' . Yii::app()->user->company),
					'id',
					'name'
				);
				$usersArray = explode(',', $project->team);
				foreach ($users as $key => $user) {
					if (!in_array($key, $usersArray)){
						unset($users[$key]);
					}
				}

				$this->render('view',array(
					'project'     => $project,
					'graphics'    => $graphics,
					'sounds'      => $sounds,
					'musics'      => $musics,
					'components'  => $components,
					'bugs'        => $bugs,
					'screens'     => $screens,
					'levels'      => $levels,
					'cutscenes'   => $cutscenes,
					'dialogs'     => $dialogs,
					'tasks'       => $tasks,
					
					'newBug' => new Bug,
					'users'  => $users,
				));
			}
			else{
				$this->redirect('../index');
			}
		}
		else{
			$this->redirect('../index');
		}
	}

	public function actionTask()
	{
		if (isset($_GET['id'])){
			$model = Task::model()->findbyPk($_GET['id']);

			if(isset($_POST['Task'])){
				$model->attributes = $_POST['Task'];
				$model->save();
				$this->redirect('../' . $model->project_id);
			}
			$timesheet = $this->timesheetHandle($model, 'task', 'management');
			
			$timesheets = Timesheet::model()->findAllbyAttributes(array(
				'task_id' => $_GET['id'],
				'task' => 'task',
			));

			$project  = Project::model()->findbyPk($model->project_id);
			$this->render('task',array(
				'model'    => $model,
				'project'  => $project,
				'timesheet'   => $timesheet,
				'timesheets'  => $timesheets,
			));
		}
		else{
			$this->redirect('../index');
		}
	}

	public function actionTimesheet()
	{
		if (isset($_GET['id'])){
			$model = Timesheet::model()->findbyPk($_GET['id']);
			if(isset($_POST['Timesheet']))
			{
				$model->attributes = $_POST['Timesheet'];
				if($model->save())
					$this->redirect('../' . $model->task . '/' . $model->task_id);
			}
			
			$tasks = array(
				'graphic'   => Graphic::model(),
				'sound'     => Sound::model(),
				'music'     => Music::model(),
				'component' => Component::model(),
				'bug'       => Bug::model(),
				'screen'    => Screen::model(),
				'level'     => Level::model(),
				'cutscene'  => Cutscene::model(),
				'dialog'    => Dialog::model(),
			);
			$task = $tasks[$model->task]->findbyPk($model->task_id);
			$project = Project::model()->findbyPk($task->project_id);
			
			$users = CHtml::listData(
				User::model()->findAllbyAttributes(array(), 'company_id = ' . Yii::app()->user->company),
				'id',
				'name'
			);
			
			$this->render('timesheet',array(
				'model'   => $model,
				'users'   => $users,
				'project' => $project,
				'task'    => $task,
			));
		}
	}

	public function actionTimesheetDelete()
	{
		if (isset($_GET['id']) and in_array('admin', Yii::app()->user->roles)){
			$model = Timesheet::model()->findbyPk($_GET['id']);
			$model->delete();
			$this->redirect('../' . $model->task . '/' . $model->task_id);
		}
		$this->redirect($_SERVER['HTTP_REFERER']);
	}
	
	public function timesheetHandle($model, $type, $state){
		if(isset($_POST['Timesheet'])){
			$timesheet = new Timesheet;
		
			$timesheet->attributes = $_POST['Timesheet'];
			$timesheet->user_id    = Yii::app()->user->id;
			$timesheet->task       = $type;
			$timesheet->task_id    = $_GET['id'];
			$timesheet->state      = $state;

			sscanf($timesheet->time, "%d:%d:%d", $hours, $minutes, $seconds);
			$timesheet->time = isset($seconds) ? $hours * 3600 + $minutes * 60 + $seconds : $hours * 60 + $minutes;
			if ($timesheet->time > 0){
				$timesheet->save();
			}
		}
		
		$t = 0;
		$timesheets = Timesheet::model()->findAllbyAttributes(array(
			'task_id' => $_GET['id'],
			'task' => $type,
		));
		foreach($timesheets as $time){
			$t += $time->time;
		}
		if ($t != $model->time){
			$model->time = $t;
			$model->save();
		}
		
		return new Timesheet;
	}

	public function actionGraphic()
	{
		if (isset($_GET['id'])){
			$model = Graphic::model()->findbyPk($_GET['id']);

			if(isset($_POST['Graphic'])){
				$file = $model->file;
				$model->attributes = $_POST['Graphic'];
				
				$model->file = CUploadedFile::getInstance($model,'file');

				if($model->file != null){
					$ext = explode('.', $model->file);
					$model->file->saveAs('files/' . Yii::app()->user->company . '/' . $model->project_id . '/graphics/' . $model->id . '.' . end($ext));
					$file = $model->file;
				}
				$model->file = $file;
				$model->save();
				$this->redirect('../' . $model->project_id);
			}
			
			// Change request
			$change = new Change;
			
			if(isset($_POST['Change'])){
				$file = $change->file;
				$change->attributes = $_POST['Change'];
				$change->task = 'graphic';
				$change->task_id = $_GET['id'];
				$change->file = CUploadedFile::getInstance($change,'file');

				if($change->file != null){
					$ext = explode('.', $change->file);
					$change->file->saveAs('files/' . Yii::app()->user->company . '/' . $model->project_id . '/changes/' . $change->id . '.' . end($ext));
				}
				$file = $change->file;
				$change->file = $file;
				$change->save();
				
				if ($_POST['state'] == 'sketch'){
					$model->sketch = 0;
					$model->valid = 0;
					$model->finish = 0;
				}
				else if ($_POST['state'] == 'valid'){
					$model->sketch = 1;
					$model->valid = 0;
					$model->finish = 0;
				}
				else if ($_POST['state'] == 'finish'){
					$model->sketch = 1;
					$model->valid = 1;
					$model->finish = 0;
				}
				$model->update();
			}
			$changes = Change::model()->findAllbyAttributes(array(
				'task_id' => $_GET['id'],
				'task' => 'graphic',
			));
			
			$state = 'art';
			if ($model->sketch and !$model->valid){
				$state = 'design';
			}
			$timesheet = $this->timesheetHandle($model, 'graphic', $state);
			
			$timesheets = Timesheet::model()->findAllbyAttributes(array(
				'task_id' => $_GET['id'],
				'task' => 'graphic',
			));

			$project  = Project::model()->findbyPk($model->project_id);
			$sections = Section::model()->findAllbyAttributes(array(
				'project_id' => $project->id,
				'section_id' => 6,
			));
			$this->render('graphic',array(
				'model'      => $model,
				'project'    => $project,
				'sections'   => $sections,
				'timesheet'  => $timesheet,
				'timesheets' => $timesheets,
				'change'     => $change,
				'changes'    => $changes,
			));
		}
		else{
			$this->redirect('../index');
		}
	}

	public function actionSound()
	{
		if (isset($_GET['id'])){
			$model = Sound::model()->findbyPk($_GET['id']);

			if(isset($_POST['Sound'])){
				$file = $model->file;
				$model->attributes = $_POST['Sound'];
				$model->file = CUploadedFile::getInstance($model,'file');

				if($model->file != null){
					$ext = explode('.', $model->file);
					$model->file->saveAs('files/' . Yii::app()->user->company . '/' . $model->project_id . '/sounds/' . $model->id . '.' . end($ext));
					$file = $model->file;
				}
				$model->file = $file;
				$model->save();
				$this->redirect('../' . $model->project_id);
			}
			
			// Change request
			$change = new Change;
			
			if(isset($_POST['Change'])){
				$file = $change->file;
				$change->attributes = $_POST['Change'];
				$change->task = 'sound';
				$change->task_id = $_GET['id'];
				$change->file = CUploadedFile::getInstance($change,'file');

				if($change->file != null){
					$ext = explode('.', $change->file);
					$change->file->saveAs('files/' . Yii::app()->user->company . '/' . $model->project_id . '/changes/' . $change->id . '.' . end($ext));
				}
				$file = $change->file;
				$change->file = $file;
				$change->save();
				
				if ($_POST['state'] == 'finish'){
					$model->finish = 0;
					$model->valid = 0;
				}
				else if ($_POST['state'] == 'valid'){
					$model->finish = 1;
					$model->valid = 0;
				}
				$model->update();
			}
			$changes = Change::model()->findAllbyAttributes(array(
				'task_id' => $_GET['id'],
				'task' => 'sound',
			));
			
			$state = 'audio';
			if ($model->file){
				$state = 'design';
			}
			$timesheet = $this->timesheetHandle($model, 'sound', 'design');
			
			$timesheets = Timesheet::model()->findAllbyAttributes(array(
				'task_id' => $_GET['id'],
				'task' => 'sound',
			));

			$project  = Project::model()->findbyPk($model->project_id);
			$sections = Section::model()->findAllbyAttributes(array(
				'project_id' => $project->id,
				'section_id' => 4,
			));
			$this->render('sound',array(
				'model'    => $model,
				'project'  => $project,
				'sections' => $sections,
				'timesheet'   => $timesheet,
				'timesheets'  => $timesheets,
				'change'     => $change,
				'changes'    => $changes,
			));
		}
		else{
			$this->redirect('../index');
		}
	}

	public function actionMusic()
	{
		if (isset($_GET['id'])){
			$model = Music::model()->findbyPk($_GET['id']);

			if(isset($_POST['Music'])){
				$file = $model->file;
				$model->attributes = $_POST['Music'];
				$model->file       = CUploadedFile::getInstance($model,'file');

				if($model->file != null){
					$ext = explode('.', $model->file);
					$model->file->saveAs('files/' . Yii::app()->user->company . '/' . $model->project_id . '/music/' . $model->id . '.' . end($ext));
					$file = $model->file;
				}
				$model->file = $file;
				$model->save();
				$this->redirect('../' . $model->project_id);
			}
			
			// Change request
			$change = new Change;
			
			if(isset($_POST['Change'])){
				$file = $change->file;
				$change->attributes = $_POST['Change'];
				$change->task = 'music';
				$change->task_id = $_GET['id'];
				$change->file = CUploadedFile::getInstance($change,'file');

				if($change->file != null){
					$ext = explode('.', $change->file);
					$change->file->saveAs('files/' . Yii::app()->user->company . '/' . $model->project_id . '/changes/' . $change->id . '.' . end($ext));
				}
				$file = $change->file;
				$change->file = $file;
				$change->save();
				
				if ($_POST['state'] == 'finish'){
					$model->finish = 0;
					$model->valid = 0;
				}
				else if ($_POST['state'] == 'valid'){
					$model->finish = 1;
					$model->valid = 0;
				}
				$model->update();
			}
			$changes = Change::model()->findAllbyAttributes(array(
				'task_id' => $_GET['id'],
				'task' => 'music',
			));
			
			$state = 'audio';
			if ($model->file){
				$state = 'design';
			}
			$timesheet = $this->timesheetHandle($model, 'music', 'design');
			
			$timesheets = Timesheet::model()->findAllbyAttributes(array(
				'task_id' => $_GET['id'],
				'task' => 'music',
			));

			$project  = Project::model()->findbyPk($model->project_id);
			$sections = Section::model()->findAllbyAttributes(array(
				'project_id' => $project->id,
				'section_id' => 4,
			));
			$this->render('music',array(
				'model'    => $model,
				'project'  => $project,
				'sections' => $sections,
				'timesheet'   => $timesheet,
				'timesheets'  => $timesheets,
				'change'     => $change,
				'changes'    => $changes,
			));
		}
		else{
			$this->redirect('../index');
		}
	}

	public function actionComponent()
	{
		if (isset($_GET['id'])){
			$model = Component::model()->findbyPk($_GET['id']);

			if(isset($_POST['Component'])){
				$model->attributes = $_POST['Component'];
				
				// User change to lowest workload
				$users = Functions::getProjectUsers($model->project_id);
				$user = $model->user_id;
				
				if ($model->test){
					$user = null;
				}
				else if ($model->valid){
					$user = $this->getFreeUser($users, 'tester');
				}
				$model->user_id = $user;
				// End user change
				
				$model->save();
				$this->redirect('../' . $model->project_id);
			}
			
			// Change request
			$change = new Change;
			
			if(isset($_POST['Change'])){
				$file = $change->file;
				$change->attributes = $_POST['Change'];
				$change->task = 'component';
				$change->task_id = $_GET['id'];
				$change->file = CUploadedFile::getInstance($change,'file');

				if($change->file != null){
					$ext = explode('.', $change->file);
					$change->file->saveAs('files/' . Yii::app()->user->company . '/' . $model->project_id . '/changes/' . $change->id . '.' . end($ext));
				}
				$file = $change->file;
				$change->file = $file;
				$change->save();
				
				if ($_POST['state'] == 'code'){
					$model->code = 0;
					$model->valid = 0;
					$model->test = 0;
				}
				else if ($_POST['state'] == 'valid'){
					$model->code = 1;
					$model->valid = 0;
					$model->test = 0;
				}
				else if ($_POST['state'] == 'test'){
					$model->code = 1;
					$model->valid = 1;
					$model->test = 0;
				}
				$model->update();
			}
			$changes = Change::model()->findAllbyAttributes(array(
				'task_id' => $_GET['id'],
				'task' => 'component',
			));
			
			$state = 'test';
			if(!$model->code){
				$state = 'code';
			}
			else if(!$model->valid){
				$state = 'design';
			}
			$timesheet = $this->timesheetHandle($model, 'component', $state);
			
			$timesheets = Timesheet::model()->findAllbyAttributes(array(
				'task_id' => $_GET['id'],
				'task' => 'component',
			));
			
			$model->graphics = preg_split('/,/', $model->graphics, null, PREG_SPLIT_NO_EMPTY);
			$model->sounds   = preg_split('/,/', $model->sounds, null, PREG_SPLIT_NO_EMPTY);
			
			$graphics = array();
			$sounds   = array();
			
			foreach ($model->graphics as $graphic) {
				array_push($graphics, Graphic::model()->findbyPk($graphic));
			}
			foreach ($model->sounds as $sound) {
				array_push($sounds, Sound::model()->findbyPk($sound));
			}

			$project  = Project::model()->findbyPk($model->project_id);
			$sections = Section::model()->findAllbyAttributes(array(
				'project_id' => $project->id,
				'section_id' => 5,
			));
			$this->render('component',array(
				'model'    => $model,
				'graphics' => $graphics,
				'sounds'   => $sounds,
				'project'  => $project,
				'sections' => $sections,
				'timesheet'   => $timesheet,
				'timesheets'  => $timesheets,
				'change'     => $change,
				'changes'    => $changes,
			));
		}
		else{
			$this->redirect('../index');
		}
	}

	public function actionBug()
	{
		if (isset($_GET['id'])){
			$model = Bug::model()->findbyPk($_GET['id']);

			if(isset($_POST['Bug'])){
				$model->attributes = $_POST['Bug'];
				
				// User change to lowest workload
				$users = Functions::getProjectUsers($model->project_id);
				$user = $model->user_id;
				
				if ($model->test){
					$user = null;
				}
				else if ($model->code){
					$user = $this->getFreeUser($users, 'tester');
				}
				$model->user_id = $user;
				// End user change
				
				$model->save();
				$this->redirect('../' . $model->project_id);
			}
			
			// Change request
			$change = new Change;
			
			if(isset($_POST['Change'])){
				$file = $change->file;
				$change->attributes = $_POST['Change'];
				$change->task = 'bug';
				$change->task_id = $_GET['id'];
				$change->file = CUploadedFile::getInstance($change,'file');

				if($change->file != null){
					$ext = explode('.', $change->file);
					$change->file->saveAs('files/' . Yii::app()->user->company . '/' . $model->project_id . '/changes/' . $change->id . '.' . end($ext));
				}
				$file = $change->file;
				$change->file = $file;
				$change->save();
				
				if ($_POST['state'] == 'code'){
					$model->code = 0;
					$model->test = 0;
				}
				else if ($_POST['state'] == 'test'){
					$model->code = 1;
					$model->test = 0;
				}
				$model->update();
			}
			$changes = Change::model()->findAllbyAttributes(array(
				'task_id' => $_GET['id'],
				'task' => 'bug',
			));
			
			$state = 'test';
			if(!$model->code){
				$state = 'code';
			}
			$timesheet = $this->timesheetHandle($model, 'bug', $state);
			
			$timesheets = Timesheet::model()->findAllbyAttributes(array(
				'task_id' => $_GET['id'],
				'task' => 'bug',
			));

			$project  = Project::model()->findbyPk($model->project_id);
			$this->render('bug',array(
				'model'    => $model,
				'project'  => $project,
				'timesheet'   => $timesheet,
				'timesheets'  => $timesheets,
				'change'     => $change,
				'changes'    => $changes,
			));
		}
		else{
			$this->redirect('../index');
		}
	}

	public function actionScreen()
	{
		if (isset($_GET['id'])){
			$model = Screen::model()->findbyPk($_GET['id']);

			if(isset($_POST['Screen'])){
				$file = $model->file;
				$model->attributes = $_POST['Screen'];
				$model->file       = CUploadedFile::getInstance($model,'file');

				if($model->file != null){
					$ext = explode('.', $model->file);
					$model->file->saveAs('files/' . Yii::app()->user->company . '/' . $model->project_id . '/screens/' . $model->id . '.' . end($ext));
					$file = $model->file;
				}
				$model->file = $file;
				
				// User change to lowest workload
				$users = Functions::getProjectUsers($model->project_id);
				$user = $model->user_id;
				
				if ($model->test){
					$user = null;
				}
				else if ($model->code){
					$user = $this->getFreeUser($users, 'tester');
				}
				else if ($model->valid){
					$user = $this->getFreeUser($users, 'programmer');
				}
				$model->user_id = $user;
				// End user change
				
				$model->save();
				$this->redirect('../' . $model->project_id);
			}
			
			// Change request
			$change = new Change;
			
			if(isset($_POST['Change'])){
				$file = $change->file;
				$change->attributes = $_POST['Change'];
				$change->task = 'screen';
				$change->task_id = $_GET['id'];
				$change->file = CUploadedFile::getInstance($change,'file');

				if($change->file != null){
					$ext = explode('.', $change->file);
					$change->file->saveAs('files/' . Yii::app()->user->company . '/' . $model->project_id . '/changes/' . $change->id . '.' . end($ext));
				}
				$file = $change->file;
				$change->file = $file;
				$change->save();
				
				if ($_POST['state'] == 'finish'){
					$model->finish = 0;
					$model->valid = 0;
					$model->code = 0;
					$model->test = 0;
				}
				else if ($_POST['state'] == 'valid'){
					$model->finish = 1;
					$model->valid = 0;
					$model->code = 0;
					$model->test = 0;
				}
				else if ($_POST['state'] == 'code'){
					$model->finish = 1;
					$model->valid = 1;
					$model->code = 0;
					$model->test = 0;
				}
				else if ($_POST['state'] == 'test'){
					$model->finish = 1;
					$model->valid = 1;
					$model->code = 1;
					$model->test = 0;
				}
				$model->update();
			}
			$changes = Change::model()->findAllbyAttributes(array(
				'task_id' => $_GET['id'],
				'task' => 'screen',
			));
			
			$state = 'test';
			if(!$model->file){
				$state = 'art';
			}
			else if(!$model->valid){
				$state = 'design';
			}
			else if(!$model->code){
				$state = 'code';
			}
			$timesheet = $this->timesheetHandle($model, 'screen', $state);
			
			$timesheets = Timesheet::model()->findAllbyAttributes(array(
				'task_id' => $_GET['id'],
				'task' => 'screen',
			));
			
			$model->graphics = preg_split('/,/', $model->graphics, null, PREG_SPLIT_NO_EMPTY);
			$model->sounds   = preg_split('/,/', $model->sounds, null, PREG_SPLIT_NO_EMPTY);
			$model->music    = preg_split('/,/', $model->music, null, PREG_SPLIT_NO_EMPTY);
			
			$graphics = array();
			$sounds   = array();
			$musics   = array();
			
			foreach ($model->graphics as $graphic) {
				array_push($graphics, Graphic::model()->findbyPk($graphic));
			}
			foreach ($model->sounds as $sound) {
				array_push($sounds, Sound::model()->findbyPk($sound));
			}
			foreach ($model->music as $music) {
				array_push($musics, Music::model()->findbyPk($music));
			}

			$project  = Project::model()->findbyPk($model->project_id);
			$sections = Section::model()->findAllbyAttributes(array(
				'project_id' => $project->id,
				'section_id' => 4,
			));
			$this->render('screen',array(
				'model'     => $model,
				'graphics'  => $graphics,
				'sounds'    => $sounds,
				'musics'    => $musics,
				'project'   => $project,
				'sections'  => $sections,
				'timesheet'   => $timesheet,
				'timesheets'  => $timesheets,
				'change'     => $change,
				'changes'    => $changes,
			));
		}
		else{
			$this->redirect('../index');
		}
	}

	public function actionLevel()
	{
		if (isset($_GET['id'])){
			$model = Level::model()->findbyPk($_GET['id']);

			if(isset($_POST['Level'])){
				$file = $model->design;
				$model->attributes = $_POST['Level'];
				$model->design     = CUploadedFile::getInstance($model,'design');

				if($model->design != null){
					$ext = explode('.', $model->design);
					$model->design->saveAs('files/' . Yii::app()->user->company . '/' . $model->project_id . '/levels/' . $model->id . '.' . end($ext));
					$file = $model->design;
				}
				$model->design = $file;
				
				// User change to lowest workload
				$users = Functions::getProjectUsers($model->project_id);
				$user = $model->user_id;
				
				if ($model->test){
					$user = null;
				}
				else if ($model->valid){
					$user = $this->getFreeUser($users, 'tester');
				}
				else if ($model->finish){
					$user = $this->getFreeUser($users, 'programmer');
				}
				$model->user_id = $user;
				// End user change
				
				$model->save();
				$this->redirect('../' . $model->project_id);
			}
			
			// Change request
			$change = new Change;
			
			if(isset($_POST['Change'])){
				$file = $change->file;
				$change->attributes = $_POST['Change'];
				$change->task = 'level';
				$change->task_id = $_GET['id'];
				$change->file = CUploadedFile::getInstance($change,'file');

				if($change->file != null){
					$ext = explode('.', $change->file);
					$change->file->saveAs('files/' . Yii::app()->user->company . '/' . $model->project_id . '/changes/' . $change->id . '.' . end($ext));
				}
				$file = $change->file;
				$change->file = $file;
				$change->save();
				
				if ($_POST['state'] == 'finish'){
					$model->finish = 0;
					$model->code   = 0;
					$model->valid  = 0;
					$model->test   = 0;
				}
				else if ($_POST['state'] == 'code'){
					$model->finish = 1;
					$model->code   = 0;
					$model->valid  = 0;
					$model->test   = 0;
				}
				else if ($_POST['state'] == 'valid'){
					$model->finish = 1;
					$model->code   = 1;
					$model->valid  = 0;
					$model->test   = 0;
				}
				else if ($_POST['state'] == 'test'){
					$model->finish = 1;
					$model->code   = 1;
					$model->valid  = 1;
					$model->test   = 0;
				}
				$model->update();
			}
			$changes = Change::model()->findAllbyAttributes(array(
				'task_id' => $_GET['id'],
				'task' => 'level',
			));
			
			$state = 'test';
			if(!$model->design){
				$state = 'design';
			}
			else if(!$model->code){
				$state = 'code';
			}
			else if(!$model->valid){
				$state = 'design';
			}
			$timesheet = $this->timesheetHandle($model, 'level', $state);
			
			$timesheets = Timesheet::model()->findAllbyAttributes(array(
				'task_id' => $_GET['id'],
				'task' => 'level',
			));
			
			$model->graphics   = preg_split('/,/', $model->graphics, null, PREG_SPLIT_NO_EMPTY);
			$model->sounds     = preg_split('/,/', $model->sounds, null, PREG_SPLIT_NO_EMPTY);
			$model->music      = preg_split('/,/', $model->music, null, PREG_SPLIT_NO_EMPTY);
			$model->characters = preg_split('/,/', $model->characters, null, PREG_SPLIT_NO_EMPTY);
			$model->enviroment = preg_split('/,/', $model->enviroment, null, PREG_SPLIT_NO_EMPTY);
			$model->cutscenes  = preg_split('/,/', $model->cutscenes, null, PREG_SPLIT_NO_EMPTY);
			
			$graphics    = array();
			$sounds      = array();
			$musics      = array();
			$characters  = array();
			$enviroments = array();
			$cutscenes   = array();
			
			foreach ($model->graphics as $graphic) {
				array_push($graphics, Graphic::model()->findbyPk($graphic));
			}
			foreach ($model->sounds as $sound) {
				array_push($sounds, Sound::model()->findbyPk($sound));
			}
			foreach ($model->music as $music) {
				array_push($musics, Music::model()->findbyPk($music));
			}
			foreach ($model->characters as $character) {
				array_push($characters, Character::model()->findbyPk($character));
			}
			foreach ($model->enviroment as $enviroment) {
				array_push($enviroments, Enviroment::model()->findbyPk($enviroment));
			}
			foreach ($model->cutscenes as $cutscene) {
				array_push($cutscenes, Cutscene::model()->findbyPk($cutscene));
			}

			$project  = Project::model()->findbyPk($model->project_id);
			$sections = Section::model()->findAllbyAttributes(array(
				'project_id' => $project->id,
				'section_id' => 3,
			));
			$this->render('level',array(
				'model'       => $model,
				'graphics'    => $graphics,
				'sounds'      => $sounds,
				'musics'      => $musics,
				'characters'  => $characters,
				'enviroments' => $enviroments,
				'cutscenes'   => $cutscenes,
				'project'     => $project,
				'sections'    => $sections,
				'timesheet'   => $timesheet,
				'timesheets'  => $timesheets,
				'change'      => $change,
				'changes'     => $changes,
			));
		}
		else{
			$this->redirect('../index');
		}
	}

	public function actionCutscene()
	{
		if (isset($_GET['id'])){
			$model = Cutscene::model()->findbyPk($_GET['id']);

			if(isset($_POST['Cutscene'])){
				$file = $model->storyboard;
				$model->attributes = $_POST['Cutscene'];
				$model->storyboard = CUploadedFile::getInstance($model,'storyboard');

				if($model->storyboard != null){
					$ext = explode('.', $model->storyboard);
					$model->storyboard->saveAs('files/' . Yii::app()->user->company . '/' . $model->project_id . '/cutscenes/' . $model->id . '.' . end($ext));
					$file = $model->storyboard;
				}
				$model->storyboard = $file;
				
				// User change to lowest workload
				$users = Functions::getProjectUsers($model->project_id);
				$user = $model->user_id;
				
				if ($model->test){
					$user = null;
				}
				else if ($model->code){
					$user = $this->getFreeUser($users, 'tester');
				}
				else if ($model->valid){
					$user = $this->getFreeUser($users, 'programmer');
				}
				else if ($model->finish){
					$user = $this->getFreeUser($users, 'artist');
				}
				$model->user_id = $user;
				// End user change
				
				$model->save();
				$this->redirect('../' . $model->project_id);
			}
			
			// Change request
			$change = new Change;
			
			if(isset($_POST['Change'])){
				$file = $change->file;
				$change->attributes = $_POST['Change'];
				$change->task = 'cutscene';
				$change->task_id = $_GET['id'];
				$change->file = CUploadedFile::getInstance($change,'file');

				if($change->file != null){
					$ext = explode('.', $change->file);
					$change->file->saveAs('files/' . Yii::app()->user->company . '/' . $model->project_id . '/changes/' . $change->id . '.' . end($ext));
				}
				$file = $change->file;
				$change->file = $file;
				$change->save();
				
				if ($_POST['state'] == 'finish'){
					$model->finish = 0;
					$model->sketch = 0;
					$model->valid = 0;
					$model->code = 0;
					$model->test = 0;
				}
				else if ($_POST['state'] == 'sketch'){
					$model->finish = 1;
					$model->sketch = 0;
					$model->valid = 0;
					$model->code = 0;
					$model->test = 0;
				}
				else if ($_POST['state'] == 'valid'){
					$model->finish = 1;
					$model->sketch = 1;
					$model->valid = 0;
					$model->code = 0;
					$model->test = 0;
				}
				else if ($_POST['state'] == 'code'){
					$model->finish = 1;
					$model->sketch = 1;
					$model->valid = 1;
					$model->code = 0;
					$model->test = 0;
				}
				else if ($_POST['state'] == 'test'){
					$model->finish = 1;
					$model->sketch = 1;
					$model->valid = 1;
					$model->code = 1;
					$model->test = 0;
				}
				$model->update();
			}
			$changes = Change::model()->findAllbyAttributes(array(
				'task_id' => $_GET['id'],
				'task' => 'cutscene',
			));
			
			$state = 'test';
			if(!$model->script){
				$state = 'write';
			}
			else if(!$model->storyboard){
				$state = 'art';
			}
			else if(!$model->valid){
				$state = 'design';
			}
			else if(!$model->code){
				$state = 'code';
			}
			$timesheet = $this->timesheetHandle($model, 'cutscene', $state);
			
			$timesheets = Timesheet::model()->findAllbyAttributes(array(
				'task_id' => $_GET['id'],
				'task' => 'cutscene',
			));
			
			$model->graphics   = preg_split('/,/', $model->graphics, null, PREG_SPLIT_NO_EMPTY);
			$model->sounds     = preg_split('/,/', $model->sounds, null, PREG_SPLIT_NO_EMPTY);
			$model->music      = preg_split('/,/', $model->music, null, PREG_SPLIT_NO_EMPTY);
			$model->actors     = preg_split('/,/', $model->actors, null, PREG_SPLIT_NO_EMPTY);
			$model->enviroment = preg_split('/,/', $model->enviroment, null, PREG_SPLIT_NO_EMPTY);
			
			$graphics    = array();
			$sounds      = array();
			$musics      = array();
			$characters  = array();
			$enviroments = array();
			
			foreach ($model->graphics as $graphic) {
				array_push($graphics, Graphic::model()->findbyPk($graphic));
			}
			foreach ($model->sounds as $sound) {
				array_push($sounds, Sound::model()->findbyPk($sound));
			}
			foreach ($model->music as $music) {
				array_push($musics, Music::model()->findbyPk($music));
			}
			foreach ($model->actors as $character) {
				array_push($characters, Character::model()->findbyPk($character));
			}
			foreach ($model->enviroment as $enviroment) {
				array_push($enviroments, Enviroment::model()->findbyPk($enviroment));
			}

			$project  = Project::model()->findbyPk($model->project_id);
			$sections = Section::model()->findAllbyAttributes(array(
				'project_id' => $project->id,
				'section_id' => 2,
			));
			$this->render('cutscene',array(
				'model'       => $model,
				'graphics'    => $graphics,
				'sounds'      => $sounds,
				'musics'      => $musics,
				'characters'  => $characters,
				'enviroments' => $enviroments,
				'project'     => $project,
				'sections'    => $sections,
				'timesheet'   => $timesheet,
				'timesheets'  => $timesheets,
				'change'     => $change,
				'changes'    => $changes,
			));
		}
		else{
			$this->redirect('../index');
		}
	}

	public function actionDialog()
	{
		if (isset($_GET['id'])){
			$model = Dialog::model()->findbyPk($_GET['id']);

			if(isset($_POST['Dialog'])){
				$model->attributes = $_POST['Dialog'];
				
				// User change to lowest workload
				$users = Functions::getProjectUsers($model->project_id);
				$user = $model->user_id;
				
				if ($model->test){
					$user = null;
				}
				else if ($model->code){
					$user = $this->getFreeUser($users, 'tester');
				}
				else if ($model->valid){
					$user = $this->getFreeUser($users, 'programmer');
				}
				$model->user_id = $user;
				// End user change
				
				$model->update();
				$this->redirect('../' . $model->project_id);
			}
			
			// Change request
			$change = new Change;
			
			if(isset($_POST['Change'])){
				$file = $change->file;
				$change->attributes = $_POST['Change'];
				$change->task = 'dialog';
				$change->task_id = $_GET['id'];
				$change->file = CUploadedFile::getInstance($change,'file');

				if($change->file != null){
					$ext = explode('.', $change->file);
					$change->file->saveAs('files/' . Yii::app()->user->company . '/' . $model->project_id . '/changes/' . $change->id . '.' . end($ext));
				}
				$file = $change->file;
				$change->file = $file;
				$change->save();
				
				if ($_POST['state'] == 'finish'){
					$model->finish = 0;
					$model->valid = 0;
					$model->code = 0;
					$model->test = 0;
				}
				else if ($_POST['state'] == 'valid'){
					$model->finish = 1;
					$model->valid = 0;
					$model->code = 0;
					$model->test = 0;
				}
				else if ($_POST['state'] == 'code'){
					$model->finish = 1;
					$model->valid = 1;
					$model->code = 0;
					$model->test = 0;
				}
				else if ($_POST['state'] == 'test'){
					$model->finish = 1;
					$model->valid = 1;
					$model->code = 1;
					$model->test = 0;
				}
				$model->update();
			}
			$changes = Change::model()->findAllbyAttributes(array(
				'task_id' => $_GET['id'],
				'task' => 'dialog',
			));
			
			$state = 'test';
			if(!$model->content){
				$state = 'write';
			}
			else if(!$model->valid){
				$state = 'design';
			}
			else if(!$model->code){
				$state = 'code';
			}
			$timesheet = $this->timesheetHandle($model, 'dialog', $state);
			
			$timesheets = Timesheet::model()->findAllbyAttributes(array(
				'task_id' => $_GET['id'],
				'task' => 'dialog',
			));

			$project  = Project::model()->findbyPk($model->project_id);
			$sections = Section::model()->findAllbyAttributes(array(
				'project_id' => $project->id,
				'section_id' => 2,
			));
			$this->render('dialog',array(
				'model'       => $model,
				'project'     => $project,
				'sections'    => $sections,
				'timesheet'   => $timesheet,
				'timesheets'  => $timesheets,
				'change'     => $change,
				'changes'    => $changes,
			));
		}
		else{
			$this->redirect('../index');
		}
	}
	
	public function getFreeUser($users, $role)
	{
		$user = null;
		$count = 0;
		foreach ($users as $u){
			if (in_array($role, explode(',', $u->roles))){
				if ($count == 0){
					$user = $u->id;
					$workload = Functions::getUserWorkload($u); // Get user workload
					//echo $u->id . ' ' . $workload . '<br/>';
					$count = 1;
				}
				else{
					$newWorkload = Functions::getUserWorkload($u); // Get user workload
					//echo  $u->id . ' ' . $newWorkload . '<br/>';
					if ($newWorkload < $workload){
						$user = $u->id;
						$workload = $newWorkload;
					}
				}
			}
		}
		//die();
		return $user;
	}
}
