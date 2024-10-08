<?php

class ProjectController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_model;

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
			array('allow',
				'actions'=>array(
					'index',
					'view',
					'create',
					'overview',
					'gameplay',
					'story',
					'devlogs',
					'characters',
					'enviroment',
					'cutscenes',
					'dialogs',
					'areaslevels',
					'areas',
					'levels',
					'interface',
					'screens',
					'sounds',
					'music',
					'technical',
					'components',
					'art',
					'graphics',
					'management',
					'resources',
					'tasks',
					'delete'
				),
				'users'=>array('@'),
			),
			array('deny',
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 */
	public function actionView()
	{
		$model = $this->loadModel();
		if ($model->company_id == Yii::app()->user->company && (in_array('admin', Yii::app()->user->roles) || in_array(Yii::app()->user->id, explode(',', $model->team))) || Yii::app()->user->id == $model->leader_id){
			$user = User::model()->findByPk(Yii::app()->user->id);
			$user->active_project_id = $model->id;
			$user->update();

			$overviewSections = Section::model()->findAllbyAttributes(array(
				'project_id'=>$model->id,
				'section_id'=>0,
			));
			$gameplaySections = Section::model()->findAllbyAttributes(array(
				'project_id'=>$model->id,
				'section_id'=>1,
			));
			$storySections = Section::model()->findAllbyAttributes(array(
				'project_id'=>$model->id,
				'section_id'=>2,
			));
			$areasSections = Section::model()->findAllbyAttributes(array(
				'project_id'=>$model->id,
				'section_id'=>3,
			));
			$interfaceSections = Section::model()->findAllbyAttributes(array(
				'project_id'=>$model->id,
				'section_id'=>4,
			));
			$technicalSections = Section::model()->findAllbyAttributes(array(
				'project_id'=>$model->id,
				'section_id'=>5,
			));
			$artSections = Section::model()->findAllbyAttributes(array(
				'project_id'=>$model->id,
				'section_id'=>6,
			));
			$managementSections = Section::model()->findAllbyAttributes(array(
				'project_id'=>$model->id,
				'section_id'=>7,
			));

			$this->render('view',array(
				'model'              => $model,
				'overviewSections'   => $overviewSections,
				'gameplaySections'   => $gameplaySections,
				'storySections'      => $storySections,
				'areasSections'      => $areasSections,
				'interfaceSections'  => $interfaceSections,
				'technicalSections'  => $technicalSections,
				'artSections'        => $artSections,
				'managementSections' => $managementSections,
			));
		}
		else{
			$this->redirect(Yii::app()->createAbsoluteUrl('/project/index'));
		}
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model = new Project;
		$users = User::model()->findAllbyAttributes(array(
			'company_id' => Yii::app()->user->company,
		));

		$this->performAjaxValidation($model);

		if(isset($_POST['Project']))
		{
			if (!is_array($model->team)){
				$model->team = array();
			}

			$model->attributes = $_POST['Project'];
			$model->company_id = Yii::app()->user->company;
			$model->cover      = CUploadedFile::getInstance($model,'cover');
			$model->banner     = CUploadedFile::getInstance($model,'banner');
			$model->team       = implode(',', $model->team);

			if ($model->date === ''){
				$model->date = NULL;
			}
			if ($model->production_date === ''){
				$model->production_date = NULL;
			}
			if ($model->launch_date === ''){
				$model->launch_date = NULL;
			}

			if($model->save()){
				$dir = 'files/' . $model->company_id . '/' . $model->id;
				mkdir($dir);
				mkdir($dir . '/graphics/');
				mkdir($dir . '/sounds/');
				mkdir($dir . '/music/');
				mkdir($dir . '/screens/');
				mkdir($dir . '/levels/');
				mkdir($dir . '/sections/');
				mkdir($dir . '/bugs/');
				mkdir($dir . '/cutscenes/');
				mkdir($dir . '/characters/');
				mkdir($dir . '/changes/');
				if($model->cover != null){
					$model->cover->saveAs('files/' . $model->company_id . '/' . $model->id . '/cover.png');
				}
				if($model->banner != null){
					$model->banner->saveAs('files/' . $model->company_id . '/' . $model->id . '/banner.png');
				}
				$this->redirect(array('view','id'=>$model->id));
				//$this->redirect(array('index'));
			}
		}
		$this->render('create',array(
			'model'    => $model,
			'users'    => $users,
		));
	}

	public function actionOverview()
	{
		$model = $this->loadModel();
		if ($model->company_id == Yii::app()->user->company && (in_array('admin', Yii::app()->user->roles) || in_array(Yii::app()->user->id, explode(',', $model->team)))){

			$model->team = explode(',', $model->team);
			$sec = 0;
			$sections = Section::model()->findAllbyAttributes(array(
				'project_id'=>$model->id,
				'section_id'=>$sec,
			));
			$users = User::model()->findAllbyAttributes(array(
				'company_id'=>$model->company_id,
			));
			array_push($sections, new Section);

			$this->performAjaxValidation($model);

			if(isset($_POST['Project']))
			{
				if (!is_array($model->team)){
					$model->team = array();
				}

				$model->attributes = $_POST['Project'];
				$model->cover      = CUploadedFile::getInstance($model,'cover');
				$model->banner     = CUploadedFile::getInstance($model,'banner');
				$model->team       = implode(',', $model->team);
				
				$this->manage_sections($sections, $model, $sec);

				if($model->validate()){
					$model->update();
					if($model->cover != null){
						$model->cover->saveAs('files/' . $model->company_id . '/' . $model->id . '/cover.png');
					}
					if($model->banner != null){
						$model->banner->saveAs('files/' . $model->company_id . '/' . $model->id . '/banner.png');
					}

					$this->redirect(array('overview','id'=>$model->id));
					//$this->redirect(array('index'));
				}
			}
			$this->render('overview',array(
				'model'    => $model,
				'sections' => $sections,
				'users'    => $users,
			));
		}
		else{
			$this->redirect(Yii::app()->createAbsoluteUrl('/project/index'));
		}
	}

	public function actionGameplay()
	{
		$model    = $this->loadModel();
		if ($model->company_id == Yii::app()->user->company && (in_array('admin', Yii::app()->user->roles) || in_array(Yii::app()->user->id, explode(',', $model->team)))){

			$sec = 1;
			$sections = Section::model()->findAllbyAttributes(array(
				'project_id'=>$model->id,
				'section_id'=>$sec,
			));
			array_push($sections, new Section);

			$this->performAjaxValidation($model);

			if(isset($_POST['Project']))
			{
				$model->attributes = $_POST['Project'];
				$this->manage_sections($sections, $model, $sec);

				if($model->validate()){
					$model->update();
					$this->redirect(array('gameplay','id'=>$model->id));
				}
			}
			$this->render('gameplay',array(
				'model'=>$model,
				'sections'=>$sections,
			));
		}
		else{
			$this->redirect(Yii::app()->createAbsoluteUrl('/project/index'));
		}
	}

	public function actionStory()
	{
		$model    = $this->loadModel();
		if ($model->company_id == Yii::app()->user->company && (in_array('admin', Yii::app()->user->roles) || in_array(Yii::app()->user->id, explode(',', $model->team)))){

			$sec = 2;
			$sections = Section::model()->findAllbyAttributes(array(
				'project_id'=>$model->id,
				'section_id'=>$sec,
			));
			array_push($sections, new Section);

			$criteria = new CDbCriteria;
			$criteria->select = 'id';
			$criteria->addCondition('project_id = ' . $model->id);
			
			$characters = (new Character)->count($criteria);
			$cutscenes  = (new Cutscene)->count($criteria);
			$dialogs    = (new Dialog)->count($criteria);

			$this->performAjaxValidation($model);

			if(isset($_POST['Project']))
			{
				$model->attributes = $_POST['Project'];
				$this->manage_sections($sections, $model, $sec);

				if($model->validate()){
					$model->update();
					$this->redirect(array('story','id'=>$model->id));
				}
			}
			$this->render('story',array(
				'model'      => $model,
				'sections'   => $sections,
				'characters' => $characters,
				'cutscenes'  => $cutscenes,
				'dialogs'    => $dialogs,
			));
		}
		else{
			$this->redirect(Yii::app()->createAbsoluteUrl('/project/index'));
		}
	}

	public function actionDevlogs(){
		$model = $this->loadModel();
		if ($model->company_id == Yii::app()->user->company && (in_array('admin', Yii::app()->user->roles) || in_array(Yii::app()->user->id, explode(',', $model->team)))){

			if(isset($_POST['create'])){
				$this->redirect(array('devlog/create',
					'project' => $model->id,
				));
			}

			$devlogs = Devlog::model()->findAllbyAttributes(array(
				'project_id'=>$model->id,
			));
			$this->render('devlogs',array(
					'model'=>$model,
					'devlogs'=>$devlogs,
				));
		}
		else{
			$this->redirect(Yii::app()->createAbsoluteUrl('/project/index'));	
		}
	}

	public function actionCharacters(){
		$model = $this->loadModel();
		if ($model->company_id == Yii::app()->user->company && (in_array('admin', Yii::app()->user->roles) || in_array(Yii::app()->user->id, explode(',', $model->team)))){

			if(isset($_POST['create'])){
				$this->redirect(array('character/create',
					'project' => $model->id,
				));
			}

			$characters = Character::model()->findAllbyAttributes(array(
				'project_id'=>$model->id,
			));
			$this->render('characters',array(
					'model'=>$model,
					'characters'=>$characters,
				));
		}
		else{
			$this->redirect(Yii::app()->createAbsoluteUrl('/project/index'));	
		}
	}

	public function actionEnviroment(){
		$model = $this->loadModel();
		if ($model->company_id == Yii::app()->user->company && (in_array('admin', Yii::app()->user->roles) || in_array(Yii::app()->user->id, explode(',', $model->team)))){

			if(isset($_POST['create'])){
				$this->redirect(array('enviroment/create',
					'project' => $model->id,
				));
			}

			$enviroment = Enviroment::model()->findAllbyAttributes(array(
				'project_id'=>$model->id,
			));
			$this->render('enviroment',array(
					'model'=>$model,
					'enviroment'=>$enviroment,
				));
		}
		else{
			$this->redirect(Yii::app()->createAbsoluteUrl('/project/index'));	
		}
	}

	public function actionCutscenes(){
		$model = $this->loadModel();
		if ($model->company_id == Yii::app()->user->company && (in_array('admin', Yii::app()->user->roles) || in_array(Yii::app()->user->id, explode(',', $model->team)))){

			if(isset($_POST['create'])){
				$this->redirect(array('cutscene/create',
					'project' => $model->id,
				));
			}

			$cutscenes = Cutscene::model()->findAllbyAttributes(array(
				'project_id'=>$model->id,
			));
			$this->render('cutscenes',array(
					'model'=>$model,
					'cutscenes'=>$cutscenes,
				));
		}
		else{
			$this->redirect(Yii::app()->createAbsoluteUrl('/project/index'));	
		}
	}

	public function actionDialogs(){
		$model = $this->loadModel();
		if ($model->company_id == Yii::app()->user->company && (in_array('admin', Yii::app()->user->roles) || in_array(Yii::app()->user->id, explode(',', $model->team)))){

			if(isset($_POST['create'])){
				$this->redirect(array('dialog/create',
					'project' => $model->id,
				));
			}

			$dialogs = Dialog::model()->findAllbyAttributes(array(
				'project_id'=>$model->id,
			));
			$this->render('dialogs',array(
					'model'=>$model,
					'dialogs'=>$dialogs,
				));
		}
		else{
			$this->redirect(Yii::app()->createAbsoluteUrl('/project/index'));	
		}
	}

	public function actionAreaslevels()
	{
		$model = $this->loadModel();
		if ($model->company_id == Yii::app()->user->company && (in_array('admin', Yii::app()->user->roles) || in_array(Yii::app()->user->id, explode(',', $model->team)))){
			
			$sec = 3;
			$sections = Section::model()->findAllbyAttributes(array(
				'project_id'=>$model->id,
				'section_id'=>$sec,
			));
			array_push($sections, new Section);
			
			$criteria = new CDbCriteria;
			$criteria->select = 'id';
			$criteria->addCondition('project_id = ' . $model->id);

			$areas      = (new Area)->count($criteria);
			$levels     = (new Level)->count($criteria);
			$enviroment = (new Enviroment)->count($criteria);

			$this->performAjaxValidation($model);

			if(isset($_POST['Project']))
			{
				$model->attributes = $_POST['Project'];
				$this->manage_sections($sections, $model, 3);
				
				if($model->validate()){
					$model->update();
					$this->redirect(array('areaslevels','id'=>$model->id));
				}
			}
			$this->render('areaslevels',array(
				'model'      => $model,
				'sections'   => $sections,
				'areas'      => $areas,
				'levels'     => $levels,
				'enviroment' => $enviroment,
			));
		}
		else{
			$this->redirect(Yii::app()->createAbsoluteUrl('/project/index'));
		}
	}

	public function actionAreas(){
		$model = $this->loadModel();
		if ($model->company_id == Yii::app()->user->company && (in_array('admin', Yii::app()->user->roles) || in_array(Yii::app()->user->id, explode(',', $model->team)))){

			if(isset($_POST['create'])){
				$this->redirect(array('area/create',
					'project' => $model->id,
				));
			}

			$areas = Area::model()->findAllbyAttributes(array(
				'project_id'=>$model->id,
			));
			$this->render('areas',array(
					'model'=>$model,
					'areas'=>$areas,
				));
		}
		else{
			$this->redirect(Yii::app()->createAbsoluteUrl('/project/index'));	
		}
	}

	public function actionLevels(){
		$model = $this->loadModel();
		if ($model->company_id == Yii::app()->user->company && (in_array('admin', Yii::app()->user->roles) || in_array(Yii::app()->user->id, explode(',', $model->team)))){

			if(isset($_POST['create'])){
				$this->redirect(array('level/create',
					'project' => $model->id,
				));
			}
			
			$levels  = Level::model()->findAllbyAttributes(array(
				'project_id'=>$model->id,
			));
			$this->render('levels',array(
					'model'=>$model,
					'levels'=>$levels,
				));
		}
		else{
			$this->redirect(Yii::app()->createAbsoluteUrl('/project/index'));	
		}
	}

	public function actionInterface()
	{
		$model    = $this->loadModel();
		if ($model->company_id == Yii::app()->user->company && (in_array('admin', Yii::app()->user->roles) || in_array(Yii::app()->user->id, explode(',', $model->team)))){

			$sec = 4;
			$sections = Section::model()->findAllbyAttributes(array(
				'project_id'=>$model->id,
				'section_id'=>$sec,
			));
			array_push($sections, new Section);

			$criteria = new CDbCriteria;
			$criteria->select = 'id';
			$criteria->addCondition('project_id = ' . $model->id);
			
			$screens = (new Screen)->count($criteria);
			$sounds = (new Sound)->count($criteria);
			$music = (new Music)->count($criteria);

			$this->performAjaxValidation($model);

			if(isset($_POST['Project']))
			{
				$model->attributes = $_POST['Project'];
				$this->manage_sections($sections, $model, $sec);

				if($model->validate()){
					$model->update();
					$this->redirect(array('interface','id'=>$model->id));
				}
			}
			$this->render('interface',array(
				'model'=>$model,
				'sections'=>$sections,
				'screens'=>$screens,
				'sounds'=>$sounds,
				'music'=>$music,
			));
		}
		else{
			$this->redirect(Yii::app()->createAbsoluteUrl('/project/index'));
		}
	}	

	public function actionScreens(){
		$model = $this->loadModel();
		if ($model->company_id == Yii::app()->user->company && (in_array('admin', Yii::app()->user->roles) || in_array(Yii::app()->user->id, explode(',', $model->team)))){

			if(isset($_POST['create'])){
				$this->redirect(array('screen/create',
					'project' => $model->id,
				));
			}
			$screens = Screen::model()->findAllbyAttributes(array(
				'project_id'=>$model->id,
			));
			$this->render('screens',array(
					'model'=>$model,
					'screens'=>$screens,
				));
		}
		else{
			$this->redirect(Yii::app()->createAbsoluteUrl('/project/index'));	
		}
	}	

	public function actionSounds(){
		$model = $this->loadModel();
		if ($model->company_id == Yii::app()->user->company && (in_array('admin', Yii::app()->user->roles) || in_array(Yii::app()->user->id, explode(',', $model->team)))){

			if(isset($_POST['create'])){
				$this->redirect(array('sound/create',
					'project' => $model->id,
				));
			}
			$sounds = Sound::model()->findAllbyAttributes(array(
				'project_id'=>$model->id,
			));
			$this->render('sounds',array(
					'model'=>$model,
					'sounds'=>$sounds,
				));
		}
		else{
			$this->redirect(Yii::app()->createAbsoluteUrl('/project/index'));	
		}
	}	

	public function actionmusic(){
		$model = $this->loadModel();
		if ($model->company_id == Yii::app()->user->company && (in_array('admin', Yii::app()->user->roles) || in_array(Yii::app()->user->id, explode(',', $model->team)))){

			if(isset($_POST['create'])){
				$this->redirect(array('music/create',
					'project' => $model->id,
				));
			}
			$music = Music::model()->findAllbyAttributes(array(
				'project_id'=>$model->id,
			));
			$this->render('music',array(
					'model'=>$model,
					'music'=>$music,
				));
		}
		else{
			$this->redirect(Yii::app()->createAbsoluteUrl('/project/index'));	
		}
	}

	public function actionTechnical()
	{
		$model    = $this->loadModel();
		if ($model->company_id == Yii::app()->user->company && (in_array('admin', Yii::app()->user->roles) || in_array(Yii::app()->user->id, explode(',', $model->team)))){

			$sec = 5;
			$sections = Section::model()->findAllbyAttributes(array(
				'project_id'=>$model->id,
				'section_id'=>$sec,
			));
			array_push($sections, new Section);

			$criteria = new CDbCriteria;
			$criteria->select = 'id';
			$criteria->addCondition('project_id = ' . $model->id);
			
			$components = (new Component)->count($criteria);

			$this->performAjaxValidation($model);

			if(isset($_POST['Project']))
			{
				$model->attributes = $_POST['Project'];
				$this->manage_sections($sections, $model, $sec);

				if($model->validate()){
					$model->update();
					$this->redirect(array('technical','id'=>$model->id));
				}
			}
			$this->render('technical',array(
				'model'=>$model,
				'sections'=>$sections,
				'components'=>$components,
			));
		}
		else{
			$this->redirect(Yii::app()->createAbsoluteUrl('/project/index'));
		}
	}	

	public function actionComponents(){
		$model = $this->loadModel();
		if ($model->company_id == Yii::app()->user->company && (in_array('admin', Yii::app()->user->roles) || in_array(Yii::app()->user->id, explode(',', $model->team)))){

			if(isset($_POST['create'])){
				$this->redirect(array('component/create',
					'project' => $model->id,
				));
			}
			$components = Component::model()->findAllbyAttributes(array(
				'project_id'=>$model->id,
			));
			$this->render('components',array(
					'model'=>$model,
					'components'=>$components,
				));
		}
		else{
			$this->redirect(Yii::app()->createAbsoluteUrl('/project/index'));	
		}
	}

	public function actionArt()
	{
		$model    = $this->loadModel();
		if ($model->company_id == Yii::app()->user->company && (in_array('admin', Yii::app()->user->roles) || in_array(Yii::app()->user->id, explode(',', $model->team)))){
			
			$sec = 6;
			$sections = Section::model()->findAllbyAttributes(array(
				'project_id'=>$model->id,
				'section_id'=>$sec,
			));
			array_push($sections, new Section);

			$criteria = new CDbCriteria;
			$criteria->select = 'id';
			$criteria->addCondition('project_id = ' . $model->id);
			
			$graphics = (new Graphic)->count($criteria);

			$this->performAjaxValidation($model);

			if(isset($_POST['Project']))
			{
				$model->attributes = $_POST['Project'];
				$this->manage_sections($sections, $model, $sec);

				if($model->validate()){
					$model->update();
					$this->redirect(array('art','id'=>$model->id));
				}
			}
			$this->render('art',array(
				'model'=>$model,
				'sections'=>$sections,
				'graphics'=>$graphics,
			));
		}
		else{
			$this->redirect(Yii::app()->createAbsoluteUrl('/project/index'));
		}
	}

	public function actionGraphics(){
		$model = $this->loadModel();
		if ($model->company_id == Yii::app()->user->company && (in_array('admin', Yii::app()->user->roles) || in_array(Yii::app()->user->id, explode(',', $model->team)))){

			if(isset($_POST['create'])){
				$this->redirect(array('graphic/create',
					'project' => $model->id,
				));
			}
			$graphics = Graphic::model()->findAllbyAttributes(array(
				'project_id'=>$model->id,
			));
			$this->render('graphics',array(
					'model'=>$model,
					'graphics'=>$graphics,
				));
		}
		else{
			$this->redirect(Yii::app()->createAbsoluteUrl('/project/index'));	
		}
	}

	public function actionManagement()
	{
		$model    = $this->loadModel();
		if ($model->company_id == Yii::app()->user->company && (in_array('admin', Yii::app()->user->roles) || in_array(Yii::app()->user->id, explode(',', $model->team)))){

			$sec = 7;
			$sections = Section::model()->findAllbyAttributes(array(
				'project_id'=>$model->id,
				'section_id'=>$sec,
			));
			array_push($sections, new Section);

			$criteria = new CDbCriteria;
			$criteria->select = 'id';
			$criteria->addCondition('project_id = ' . $model->id);
			
			$resources = (new Resource)->count($criteria);
			$tasks = (new Task)->count($criteria);

			$this->performAjaxValidation($model);

			if(isset($_POST['Project']))
			{
				$model->attributes = $_POST['Project'];
				
				if ($model->production_date === ''){
					$model->production_date = NULL;
				}
				if ($model->launch_date === ''){
					$model->launch_date = NULL;
				}
				$this->manage_sections($sections, $model, $sec);

				if($model->validate()){
					$model->update();
					$this->redirect(array('management','id'=>$model->id));
				}
			}
			$this->render('management',array(
				'model'     => $model,
				'sections'  => $sections,
				'resources' => $resources,
				'tasks'     => $tasks,
			));
		}
		else{
			$this->redirect(Yii::app()->createAbsoluteUrl('/project/index'));
		}
	}

	public function actionResources(){
		$model = $this->loadModel();
		if ($model->company_id == Yii::app()->user->company && (in_array('admin', Yii::app()->user->roles) || in_array(Yii::app()->user->id, explode(',', $model->team)))){

			if(isset($_POST['create'])){
				$this->redirect(array('resource/create',
					'project' => $model->id,
				));
			}
			$resources = Resource::model()->findAllbyAttributes(array(
				'project_id'=>$model->id,
			));
			$this->render('resources',array(
					'model'=>$model,
					'resources'=>$resources,
				));
		}
		else{
			$this->redirect(Yii::app()->createAbsoluteUrl('/project/index'));	
		}
	}

	public function actionTasks(){
		$model = $this->loadModel();
		if ($model->company_id == Yii::app()->user->company && (in_array('admin', Yii::app()->user->roles) || in_array(Yii::app()->user->id, explode(',', $model->team)))){

			if(isset($_POST['create'])){
				$this->redirect(array('task/create',
					'project' => $model->id,
				));
			}
			$tasks = Task::model()->findAllbyAttributes(array(
				'project_id'=>$model->id,
			));
			$this->render('tasks',array(
					'model'=>$model,
					'tasks'=>$tasks,
				));
		}
		else{
			$this->redirect(Yii::app()->createAbsoluteUrl('/project/index'));	
		}
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 */
	public function actionDelete()
	{
		if (isset($_GET['id'])){
			$id = $_GET['id'];
			$model = Project::model()->findbyPk($id);
			if ($model->company_id == Yii::app()->user->company && in_array('admin', Yii::app()->user->roles)){
				$model->delete();	
			}
		}
		$this->redirect(Yii::app()->createAbsoluteUrl('/project/index'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$projects = Project::model()->findAllbyAttributes(array('company_id'=>Yii::app()->user->company));
		$user = User::model()->findByPk(Yii::app()->user->id);
		$user->active_project_id = null;
		$user->update();
		
		if (!in_array('admin', Yii::app()->user->roles)){
			foreach ($projects as $key => $project) {
				$usersArray = explode(',', $project->team);
				if (!in_array(Yii::app()->user->id, $usersArray) and Yii::app()->user->id != $project->leader_id){
					unset($projects[$key]);
				}
			}
		}

		$this->render('index',array(
			'projects'=>$projects,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 */
	public function loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id']))
				$this->_model=Project::model()->findbyPk($_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='project-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	protected function manage_sections($sections, $model, $sec){
		foreach ($sections as $i => $section) {
			$file = $section->file;
			$section->attributes = $_POST['Section'][$i];
			$section->project_id = $model->id;
			$section->section_id = $sec;
			
			$section->file = CUploadedFile::getInstance($section,'[' . $i . ']file');
			
			if($section->name != '' and $section->validate()){
				$section->save();

				if($section->file != null){
					$ext = explode('.', $section->file);
					$section->file->saveAs('files/' . Yii::app()->user->company . '/' . $section->project_id . '/sections/' . $section->id . '.' . end($ext));
					$file = $section->file;
				}
				$section->file = $file;
			}
		}
	}
}
