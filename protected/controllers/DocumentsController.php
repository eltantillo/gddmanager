<?php

class DocumentsController extends Controller
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
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','view'),
				'users'=>array('@', '*'),
			),
		);
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionIndex()
	{
		if (Yii::app()->user->isGuest){
			$this->layout = '//layouts/site';
			$projects = Project::model()->findAllbyAttributes(array(
				'public' => 1,
			));
		}
		else{
			$projects = Project::model()->findAllbyAttributes(array(
				'company_id' => Yii::app()->user->company,
			));
		}
		

		$this->render('index',array(
			'projects' => $projects,
		));
	}

	public function actionView()
	{
		if(isset($_GET['id'])){
			$project = Project::model()->findbyPk($_GET['id']);
			if ($project->public or (!Yii::app()->user->isGuest and Yii::app()->user->company == $project->company_id)){
				if (!Yii::app()->user->isGuest){
					$user = User::model()->findByPk(Yii::app()->user->id);
					$user->active_project_id = $project->id;
					$user->update();
				}
			
				if (Yii::app()->user->isGuest){
					$this->layout = '//layouts/site';
				}
	
				$overviewSections = Section::model()->findAllbyAttributes(array(
					'project_id'=>$project->id,
					'section_id'=>0,
				));
				$gameplaySections = Section::model()->findAllbyAttributes(array(
					'project_id'=>$project->id,
					'section_id'=>1,
				));
				$storySections = Section::model()->findAllbyAttributes(array(
					'project_id'=>$project->id,
					'section_id'=>2,
				));
				$areasSections = Section::model()->findAllbyAttributes(array(
					'project_id'=>$project->id,
					'section_id'=>3,
				));
				$interfaceSections = Section::model()->findAllbyAttributes(array(
					'project_id'=>$project->id,
					'section_id'=>4,
				));
				$technicalSections = Section::model()->findAllbyAttributes(array(
					'project_id'=>$project->id,
					'section_id'=>5,
				));
				$artSections = Section::model()->findAllbyAttributes(array(
					'project_id'=>$project->id,
					'section_id'=>6,
				));
				$managementSections = Section::model()->findAllbyAttributes(array(
					'project_id'=>$project->id,
					'section_id'=>7,
				));
	
				$criteria = new CDbCriteria;
				$criteria->addCondition('project_id = ' . $project->id);
	
				$characters = Character::model()->findAll($criteria);
				$enviroment = Enviroment::model()->findAll($criteria);
				$cutscenes  = Cutscene::model()->findAll($criteria);
				$dialogs    = Dialog::model()->findAll($criteria);
				$areas      = Area::model()->findAll($criteria);
				$levels     = Level::model()->findAll($criteria);
				$screens    = Screen::model()->findAll($criteria);
				$sounds     = Sound::model()->findAll($criteria);
				$music      = Music::model()->findAll($criteria);
				$components = Component::model()->findAll($criteria);
				$graphics   = Graphic::model()->findAll($criteria);
				$resources  = Resource::model()->findAll($criteria);
				
				$this->render('view',array(
					'project'            => $project,
					'overviewSections'   => $overviewSections,
					'gameplaySections'   => $gameplaySections,
					'storySections'      => $storySections,
					'areasSections'      => $areasSections,
					'interfaceSections'  => $interfaceSections,
					'technicalSections'  => $technicalSections,
					'artSections'        => $artSections,
					'managementSections' => $managementSections,
					'characters'         => $characters,
					'enviroments'        => $enviroment,
					'cutscenes'          => $cutscenes,
					'dialogs'            => $dialogs,
					'areas'              => $areas,
					'levels'             => $levels,
					'screens'            => $screens,
					'sounds'             => $sounds,
					'musics'             => $music,
					'components'         => $components,
					'graphics'           => $graphics,
					'resources'          => $resources,
				));
			}
			else{
				$this->redirect('../');
			}
		}
		else{
			$this->redirect('index');
		}
	}
}
