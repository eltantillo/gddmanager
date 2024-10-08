<?php

class MessagesController extends Controller
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
				'actions'=>array('view', 'create', 'get'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	public function actionView()
	{
		$user = $this->_model=User::model()->findbyPk($_GET['id']);
		$sentMessages = $this->_model=Message::model()->findAllByAttributes(array(
			'user_from_id' => Yii::app()->user->getId(),
			'user_to_id' => $_GET['id'],
		));
		if ($user->id != Yii::app()->user->id){
			$receivedMessages = $this->_model=Message::model()->findAllByAttributes(array(
				'user_from_id' => $_GET['id'],
				'user_to_id' => Yii::app()->user->getId(),
			));
		}
		else{
			$receivedMessages = array();
		}
		
		foreach ($receivedMessages as $message){
			if (!$message->read){
				$message->read = true;
				$message->update();
			}
		}
		
		$messages = array_merge($sentMessages, $receivedMessages);
		
		asort($messages);
		
		$this->render('view', array(
			'user' => $user,
			'messages' => $messages,
		));
	}
	
	public function actionCreate()
	{
		if(isset($_POST['message']))
		{
			$message = new Message;
			$message->user_from_id = Yii::app()->user->getId();
			$message->user_to_id =  $_GET['id'];
			$message->message = strip_tags($_POST['message'], '<strong><b><i><p>');//filter_var($_POST['message'], FILTER_SANITIZE_SPECIAL_CHARS);
			$message->save();
		}
	}
	
	public function actionGet()
	{
		$newMessages = $this->_model=Message::model()->findAllByAttributes(array(
			'user_from_id' => $_GET['id'],
			'user_to_id' => Yii::app()->user->getId(),
			'read' => false,
		));
		
		foreach ($newMessages as $message){
			$message->read = true;
			$message->update();
		}
		
		echo CJSON::encode($newMessages);
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
				$this->_model=Message::model()->findbyPk($_GET['id']);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='music-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
