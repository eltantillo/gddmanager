<?php

class ComponentController extends Controller
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
				'actions'=>array('create','update','delete'),
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
	public function actionCreate()
	{
		$project = Project::model()->findbyPk($_GET['project']);
		if ($project->company_id == Yii::app()->user->company && (in_array('admin', Yii::app()->user->roles) || in_array(Yii::app()->user->id, explode(',', $project->team) || Yii::app()->user->id == $project->leader_id))){

			$model = new Component;
			$model->project_id = $project->id;

			$criteria = new CDbCriteria;
			$criteria->addCondition('project_id = ' . $project->id);
			
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
			
			$components = CHtml::listData(Component::model()->findAll($criteria),'id','name');
			$characters = CHtml::listData(Character::model()->findAll($criteria),'id','name');
			$sounds     = CHtml::listData(Sound::model()->findAll($criteria),'id','name');
			$graphics   = CHtml::listData(Graphic::model()->findAll($criteria),'id','name');
			$enviroment = CHtml::listData(Enviroment::model()->findAll($criteria),'id','name');
			$screens    = CHtml::listData(Screen::model()->findAll($criteria),'id','name');
			$levels     = CHtml::listData(Level::model()->findAll($criteria),'id','name');
			$cutscenes  = CHtml::listData(Cutscene::model()->findAll($criteria),'id','description');

			// Uncomment the following line if AJAX validation is needed
			// $this->performAjaxValidation($model);

			if(isset($_POST['Component']))
			{
				$model->attributes = $_POST['Component'];

				if ($model->deadline == ''){
					$model->deadline = null;
				}
				if (!is_array($model->sounds)){
					$model->sounds = array();
				}
				if (!is_array($model->graphics)){
					$model->graphics = array();
				}
				$model->sounds   = implode(',', $model->sounds);
				$model->graphics = implode(',', $model->graphics);

				if($model->save())
					$this->redirect(array('project/components','id'=>$project->id));
			}

			$this->render('create',array(
				'model'      => $model,
				'project'    => $project,
				'components' => $components,
				'characters' => $characters,
				'sounds'     => $sounds,
				'graphics'   => $graphics,
				'users'      => $users,
				'enviroment' => $enviroment,
				'screens'    => $screens,
				'levels'     => $levels,
				'cutscenes'  => $cutscenes,
			));
		}
		else{
			$this->redirect(Yii::app()->createAbsoluteUrl('/project/index'));	
		}
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionUpdate()
	{
		$project = Project::model()->findbyPk($_GET['project']);
		if ($project->company_id == Yii::app()->user->company && (in_array('admin', Yii::app()->user->roles) || in_array(Yii::app()->user->id, explode(',', $project->team) || Yii::app()->user->id == $project->leader_id))){

			$model = $this->loadModel();

			if(isset($_POST['Component']))
			{
				$model->attributes = $_POST['Component'];

				if ($model->deadline == ''){
					$model->deadline = null;
				}
				if (!is_array($model->sounds)){
					$model->sounds = array();
				}
				if (!is_array($model->graphics)){
					$model->graphics = array();
				}
				$model->sounds   = implode(',', $model->sounds);
				$model->graphics = implode(',', $model->graphics);

				if($model->save())
					$this->redirect(array('project/components','id'=>$project->id));
			}
			
			$model->sounds   = explode(',', $model->sounds);
			$model->graphics = explode(',', $model->graphics);

			$criteria = new CDbCriteria;
			$criteria->addCondition('project_id = ' . $project->id);

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

			$components = CHtml::listData(Component::model()->findAll($criteria),'id','name');
			$characters = CHtml::listData(Character::model()->findAll($criteria),'id','name');
			$sounds     = CHtml::listData(Sound::model()->findAll($criteria),'id','name');
			$graphics   = CHtml::listData(Graphic::model()->findAll($criteria),'id','name');
			$enviroment = CHtml::listData(Enviroment::model()->findAll($criteria),'id','name');
			$screens    = CHtml::listData(Screen::model()->findAll($criteria),'id','name');
			$levels     = CHtml::listData(Level::model()->findAll($criteria),'id','name');
			$cutscenes  = CHtml::listData(Cutscene::model()->findAll($criteria),'id','description');

			unset($components[$model->id]);
			// Uncomment the following line if AJAX validation is needed
			// $this->performAjaxValidation($model);

			$this->render('update',array(
				'model'      => $model,
				'project'    => $project,
				'components' => $components,
				'characters' => $characters,
				'sounds'     => $sounds,
				'graphics'   => $graphics,
				'users'      => $users,
				'enviroment' => $enviroment,
				'screens'    => $screens,
				'levels'     => $levels,
				'cutscenes'  => $cutscenes,
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
		$model=$this->loadModel();
		if ($model->company_id == Yii::app()->user->company && in_array('admin', Yii::app()->user->roles)){
			if(Yii::app()->request->isPostRequest)
			{
				// we only allow deletion via POST request
				$this->loadModel()->delete();
	
				// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
				if(!isset($_GET['ajax']))
					$this->redirect(array('index'));
			}
			else
				throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		}
		else{
			$this->redirect(array('index'));
		}
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
				$this->_model=Component::model()->findbyPk($_GET['id']);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='component-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
