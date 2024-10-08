<?php

class UserController extends Controller
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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','create','update','delete'),
				'users'=>array('@'),
			),
			//array('allow', // allow authenticated user to perform 'create' and 'update' actions
			//	'actions'=>array('create','update','delete'),
			//	'users'=>array('@'),
			//),
			array('deny',  // deny all users
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
		if ($model->company_id == Yii::app()->user->company){
			$this->render('view',array(
				'model'=>$model,
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
		$model = new User;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes = $_POST['User'];

			if (!is_array($model->roles)){
				$model->roles = array();
			}
			if (!is_array($model->workdays)){
				$model->workdays = array();
			}
			$model->company_id = Yii::app()->user->company;
			$model->avatar     = CUploadedFile::getInstance($model,'avatar');
			$model->roles      = implode(',', $model->roles);
			$model->workdays   = implode(',', $model->workdays);

			$token           = md5(uniqid(rand(), true));
			$model->token    = $token;
			$model->password = password_hash(uniqid(rand(), true), PASSWORD_DEFAULT);

			if ($model->validate()){
				$company = Company::model()->findByPK(Yii::app()->user->company);
				$company->month_users += 1;
				$company->update();

				if ($model->name){
					$name = $model->name;
				}
				else{
					$name = $model->email;
				}
				Email::smtp_mail(
					Language::$registerEmailTitle,
					$model->email,
					$name,
					sprintf(Language::$registerEmail, $name, $model->email, $token),
					sprintf(Language::$emailFooter, $model->email, $model->email)
				);

				$model->save();
				if($model->avatar != null){
					$model->avatar->saveAs('files/' . Yii::app()->user->company . '/avatars/' . Yii::app()->user->id . '.png');
				}

				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionUpdate()
	{
		$model = $this->loadModel();
		$model->roles    = explode(',', $model->roles);
		$model->workdays = explode(',', $model->workdays);
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			if (!is_array($model->roles)){
				$model->roles = array();
			}
			if (!is_array($model->workdays)){
				$model->workdays = array();
			}
			
			$model->attributes = $_POST['User'];
			$model->avatar     = CUploadedFile::getInstance($model,'avatar');
			$model->roles      = implode(',', $model->roles);
			$model->workdays   = implode(',', $model->workdays);

			$user = user::model()->findByAttributes(array('id'=>$model->id));
			
			if ($model->password == ''){
				$model->password = $user->password;
			}
			else{
				$model->password = password_hash($model->password, PASSWORD_DEFAULT);
			}
			
			$valid = strpos($model->roles, 'admin') !== false;
			
			if (!$valid){
				$users = user::model()->findAllbyAttributes(array(
					'company_id' => $model->company_id
				), ' id != ' . $model->id);
				foreach ($users as $u){
					if (strpos($u->roles, 'admin') !== false){
						$valid = true;
					}
				}
			}

			if ($valid and $model->validate()){
				$model->update();
				if($model->avatar != null){
					$model->avatar->saveAs('files/' . Yii::app()->user->company . '/avatars/' . Yii::app()->user->id . '.png');
				}
				$this->redirect(array('view','id'=>$model->id));
			}
			else{
				$model->roles = explode(',', $model->roles);
				$model->addError('roles', Language::$noAdminError);
			}
		}

		$id = $_GET['id'];
		if ($id == Yii::app()->user->id || in_array('admin', Yii::app()->user->roles)){

			$this->render('update',array(
				'model'=>$model,
			));
		}
		else{
			$this->redirect(Yii::app()->createAbsoluteUrl('/user/index'));
		}
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 */
	public function actionDelete()
	{
		$model = $this->loadModel();
		if (isset($_GET['id'])){
			$id = $_GET['id'];
			if ($model->company_id == Yii::app()->user->company && in_array('admin', Yii::app()->user->roles)){
				$user = User::model()->findbyPk($id);
				$user->delete();	
			}
		}
		$this->redirect(Yii::app()->createAbsoluteUrl('/user/index'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$users = User::model()->findAllbyAttributes(array('company_id'=>Yii::app()->user->company));

		$this->render('index',array(
			'users'=>$users,
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
				$this->_model=User::model()->findbyPk($_GET['id']);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
