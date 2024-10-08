<?php

class LevelController extends Controller
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

			$model             = new Level;
			$model->project_id = $project->id;

			$criteria = new CDbCriteria;
			$criteria->addCondition('project_id = ' . $project->id);

			$users = CHtml::listData(
				User::model()->findAllbyAttributes(array(), 'roles LIKE \'%designer%\' AND company_id = ' . Yii::app()->user->company),
				'id',
				'name'
			);
			$usersArray = explode(',', $project->team);
			foreach ($users as $key => $user) {
				if (!in_array($key, $usersArray)){
					unset($users[$key]);
				}
			}

			$areas      = CHtml::listData(Area::model()->findAll($criteria),'id','name');
			$enviroment = CHtml::listData(Enviroment::model()->findAll($criteria),'id','name');
			$characters = CHtml::listData(Character::model()->findAll($criteria),'id','name');
			$graphics   = CHtml::listData(Graphic::model()->findAll($criteria),'id','name');
			$music      = CHtml::listData(Music::model()->findAll($criteria),'id','name');
			$sounds     = CHtml::listData(Sound::model()->findAll($criteria),'id','name');
			$cutscenes  = CHtml::listData(Cutscene::model()->findAll($criteria),'id','description');

			// Uncomment the following line if AJAX validation is needed
			// $this->performAjaxValidation($model);

			if(isset($_POST['Level']))
			{
				$model->attributes = $_POST['Level'];

				if ($model->deadline == ''){
					$model->deadline = null;
				}
				if (!is_array($model->enviroment)){
					$model->enviroment = array();
				}
				if (!is_array($model->characters)){
					$model->characters = array();
				}
				if (!is_array($model->graphics)){
					$model->graphics = array();
				}
				if (!is_array($model->music)){
					$model->music = array();
				}
				if (!is_array($model->sounds)){
					$model->sounds = array();
				}
				if (!is_array($model->cutscenes)){
					$model->cutscenes = array();
				}
				$model->enviroment = implode(',', $model->enviroment);
				$model->characters = implode(',', $model->characters);
				$model->graphics   = implode(',', $model->graphics);
				$model->music      = implode(',', $model->music);
				$model->sounds     = implode(',', $model->sounds);
				$model->cutscenes  = implode(',', $model->cutscenes);

				if($model->save())
					$this->redirect(array('project/levels','id'=>$project->id));
			}

			$this->render('create',array(
				'model'      => $model,
				'project'    => $project,
				'areas'      => $areas,
				'enviroment' => $enviroment,
				'characters' => $characters,
				'graphics'   => $graphics,
				'music'      => $music,
				'sounds'     => $sounds,
				'cutscenes'  => $cutscenes,
				'users'      => $users,
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

			if(isset($_POST['Level']))
			{
				$model->attributes=$_POST['Level'];

				if ($model->deadline == ''){
					$model->deadline = null;
				}
				if (!is_array($model->enviroment)){
					$model->enviroment = array();
				}
				if (!is_array($model->characters)){
					$model->characters = array();
				}
				if (!is_array($model->graphics)){
					$model->graphics = array();
				}
				if (!is_array($model->music)){
					$model->music = array();
				}
				if (!is_array($model->sounds)){
					$model->sounds = array();
				}
				if (!is_array($model->cutscenes)){
					$model->cutscenes = array();
				}
				$model->enviroment = implode(',', $model->enviroment);
				$model->characters = implode(',', $model->characters);
				$model->graphics   = implode(',', $model->graphics);
				$model->music      = implode(',', $model->music);
				$model->sounds     = implode(',', $model->sounds);
				$model->cutscenes  = implode(',', $model->cutscenes);

				if($model->save())
					$this->redirect(array('project/levels','id'=>$project->id));
			}
			
			$model->enviroment = explode(',', $model->enviroment);
			$model->characters = explode(',', $model->characters);
			$model->graphics   = explode(',', $model->graphics);
			$model->music      = explode(',', $model->music);
			$model->sounds     = explode(',', $model->sounds);
			$model->cutscenes  = explode(',', $model->cutscenes);

			$criteria = new CDbCriteria;
			$criteria->addCondition('project_id = ' . $project->id);

			$users = CHtml::listData(
				User::model()->findAllbyAttributes(array(), 'roles LIKE \'%designer%\' AND company_id = ' . Yii::app()->user->company),
				'id',
				'name'
			);
			$usersArray = explode(',', $project->team);
			foreach ($users as $key => $user) {
				if (!in_array($key, $usersArray)){
					unset($users[$key]);
				}
			}

			$areas      = CHtml::listData(Area::model()->findAll($criteria),'id','name');
			$enviroment = CHtml::listData(Enviroment::model()->findAll($criteria),'id','name');
			$characters = CHtml::listData(Character::model()->findAll($criteria),'id','name');
			$graphics   = CHtml::listData(Graphic::model()->findAll($criteria),'id','name');
			$music      = CHtml::listData(Music::model()->findAll($criteria),'id','name');
			$sounds     = CHtml::listData(Sound::model()->findAll($criteria),'id','name');
			$cutscenes  = CHtml::listData(Cutscene::model()->findAll($criteria),'id','description');

			// Uncomment the following line if AJAX validation is needed
			// $this->performAjaxValidation($model);

			$this->render('update',array(
				'model'      => $model,
				'project'    => $project,
				'areas'      => $areas,
				'enviroment' => $enviroment,
				'characters' => $characters,
				'graphics'   => $graphics,
				'music'      => $music,
				'sounds'     => $sounds,
				'cutscenes'  => $cutscenes,
				'users'      => $users,
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
				$this->_model=Level::model()->findbyPk($_GET['id']);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='level-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
