<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions(){
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex(){
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		if (!Yii::app()->user->isGuest){
			$this->layout = '//layouts/column2';
			$this->render('dashboard');
		}
		else{
			$projects = Project::model()->findAllbyAttributes(array(
				'public' => 1,
			),
			array(
			    'order' => 'RAND ()',
			    'limit' => 9,
			)
			);
			
			$this->render('index',array(
				'projects' => $projects,
			));
		}
	}
	public function actionDevlogs(){
		if (isset($_GET['id'])){
			$model = Devlog::model()->findbyPk($_GET['id']);
			$project = Project::model()->findbyPk($model->project_id);
			$this->render('devlog',array(
				'model' => $model,
				'project' => $project,
			));
		}
		else{
			$models = Devlog::model()->findAllbyAttributes(array(
				'public' => 1,
			),
			array(
			    'order' => 'id DESC',
			));
			$this->render('devlogs',array(
				'models' => $models,
			));
		}
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError(){
		if($error=Yii::app()->errorHandler->error){
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the registry page
	 */
	public function actionRegister(){
		$company = new Company;
		$user    = new User;

		$this->performAjaxValidation($company);

		if(isset($_POST['Company']) && isset($_POST['User'])){
			$company->attributes = $_POST['Company'];
			$user->attributes    = $_POST['User'];
			$user->name          = $company->name;
			$user->roles         = 'admin';
			
			if (isset($_GET['ref'])){
				$company->referral_id = $_GET['ref'];
			}

			$valid = $company->validate();
			$valid = $user->validate() && $valid;
	
			if ($user->password != $user->password2){
				$user->addError("password", Language::$passwordMismatch);
				$valid = false;
			}
			else{
				$user->password = password_hash($user->password, PASSWORD_DEFAULT);
			}

			if($valid){
				$company->save(false);
				$user->company_id = $company->id;
				$user->language = LANG;
				$user->save(false);
				mkdir('files/' . $company->id);
				mkdir('files/' . $company->id . '/avatars');
				mkdir('files/' . $company->id . '/applications');
				$this->redirect(array('login'));
			}
		}

		$user->password  = '';
		$user->password2 = '';

		$this->render('register',array(
			'company'=> $company, 
			'user'=> $user
		));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model = new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form'){
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm'])){
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	public function actionRecover()
	{
		if(isset($_GET['email']) and isset($_GET['token'])){
			$user = User::model()->findByAttributes(array('email'=>$_GET['email']));
			
			// Check Token
			if($_GET['token'] == $user-> token){
				if(isset($_POST['password'])){
					$user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
					$user-> token = null;
					$user->update();
					$this->redirect('login');
				}
				$this->render('recover', array('change'=>true));
			}
			// If wrong token, redirect to index
			else{
				$this->redirect('index');
			}
		}
		else if(isset($_POST['email'])){
			$user = User::model()->findByAttributes(array('email'=>$_POST['email']));
			
			if($user){
				$token = md5(uniqid(rand(), true));
				$user->token = $token;
				$user->update();
				Email::smtp_mail(
					Language::$recoverEmailTitle,
					$_POST['email'],
					$user->name,
					sprintf(Language::$recoverEmail, $user->name, $_POST['email'], $token),
					sprintf(Language::$emailFooter, $_POST['email'], $_POST['email'])
					/*Language::$RecoverPasswordMail*/);
				$this->render('recover', array(
					'message'=> Language::$recoverEmailSent,
				));
			}
		}
		$this->render('recover');
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout(){
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='register-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}