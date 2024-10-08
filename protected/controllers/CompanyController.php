<?php

class CompanyController extends Controller
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
				'actions'=>array('index','update','payment'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 */
	public function actionPayment()
	{
		$company = Company::model()->findByPK(Yii::app()->user->company);
		$cost = 0.99;
		
		if(isset($_GET['success']) && (bool)$_GET['success'] === true){
			if (PayPal::process($_GET['paymentId'], $_GET['PayerID'])){
				$users = User::model()->findAllbyAttributes(array('company_id'=>Yii::app()->user->company));
				$company->month_users = count($users);
				$now = date("Y-m-d H:i:s");
				
				if ($company->referral_id){
					$referral = Company::model()->findByPK($company->referral_id);
					if ($referral->month_users <= 8){
						if($now > $referral->membership){
							$referral->membership = date('Y-m-d H:i:s', strtotime("+7 days", strtotime($now)));
						}
						else{
							$referral->membership = date('Y-m-d H:i:s', strtotime("+7 days", strtotime($referral->membership)));
						}
						$referral->update();
					}
					$company->referral_id = null;
				}
				
				$expiry = date('Y-m-d H:i:s', strtotime("+15 days", strtotime($company->membership)));
				
				if ($now > $expiry){
					$date = date('Y-m-d H:i:s', strtotime("+1 month", strtotime($now)));
				}
				else{	
					$date = date('Y-m-d H:i:s', strtotime("+1 month", strtotime($company->membership)));
				}
				
				$company->membership = $date;
				$company->update();
			}
			/*else{
				echo "Error";
			}*/
		}
		else if(isset($_GET['type'])){
			if ($_GET['type'] == 'paypal'){
				PayPal::checkout("GDDManager Membership", ($company->month_users * $cost) + ($company->month_users * $cost * 0.16));
			}
		}

		$this->render('invoice', array(
			'model'   => $this->loadModel(),
			'company' => $company,
			'cost'    => $cost,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionUpdate()
	{
		$model=$this->loadModel();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Company']))
		{
			$model->attributes = $_POST['Company'];
			$model->avatar     = CUploadedFile::getInstance($model,'avatar');
			if($model->save()){
				if($model->avatar != null){
					$model->avatar->saveAs('files/' . Yii::app()->user->company . '/avatars/company.png');
				}
				$this->redirect(array('index'));
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$this->render('index', array('model' => $this->loadModel()));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 */
	public function loadModel()
	{
		if($this->_model===null)
		{
			$this->_model=Company::model()->findbyPk(Yii::app()->user->company);
		}
		return $this->_model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='company-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
