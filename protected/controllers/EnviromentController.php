<?php

class EnviromentController extends Controller
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

			$model=new Enviroment;
			$model->project_id = $project->id;

			// Uncomment the following line if AJAX validation is needed
			// $this->performAjaxValidation($model);

			if(isset($_POST['Enviroment']))
			{
				$model->attributes=$_POST['Enviroment'];
				if($model->save())
					$this->redirect(array('project/enviroment','id'=>$project->id));
			}

			$this->render('create',array(
				'model'=>$model,
				'project'=>$project,
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

			$model=$this->loadModel();

			// Uncomment the following line if AJAX validation is needed
			// $this->performAjaxValidation($model);

			if(isset($_POST['Enviroment']))
			{
				$model->attributes=$_POST['Enviroment'];
				if($model->save())
					$this->redirect(array('project/enviroment','id'=>$project->id));
			}

			$this->render('update',array(
				'model'=>$model,
				'project'=>$project,
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
				$this->_model=Enviroment::model()->findbyPk($_GET['id']);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='enviroment-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
