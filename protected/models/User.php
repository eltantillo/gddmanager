<?php

/**
 * This is the model class for table "User".
 *
 * The followings are the available columns in table 'User':
 * @property integer $id
 * @property integer $company_id
 * @property string $date
 * @property string $email
 * @property string $password
 * @property string $name
 * @property string $roles
 * @property string $activity
 * @property integer $active_project_id
 * @property string $location
 * @property string $language
 * @property string $timezone
 * @property double $worktime
 * @property string $workdays
 * @property double $salary
 * @property string $token
 */
class User extends CActiveRecord
{
	public $password2;
	public $avatar;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive User inputs.
		return array(
			array('email', 'required'),
			array('email', 'unique', 'message' => Language::$duplcateEmail),
			array('email', 'length', 'max'=>255),
			array('company_id, active_project_id', 'numerical', 'integerOnly'=>true),
			array('worktime, salary', 'numerical'),
			array('language', 'length', 'max'=>5),
			array('password, password2, name, roles, activity, location, timezone, workdays, avatar', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, company_id, date, email, password, name, roles, activity, active_project_id, location, language, timezone, worktime, workdays, salary, token', 'safe', 'on'=>'search'),
			array('avatar', 'file', 'types'=>'jpg, gif, png', 'safe'=>false, 'allowEmpty'=>true),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'bugs' => array(self::HAS_MANY, 'Bug', 'User_id'),
			'changes' => array(self::HAS_MANY, 'Change', 'User_id'),
			'components' => array(self::HAS_MANY, 'Component', 'User_id'),
			'cutscenes' => array(self::HAS_MANY, 'Cutscene', 'User_id'),
			'dialogs' => array(self::HAS_MANY, 'Dialog', 'User_id'),
			'graphics' => array(self::HAS_MANY, 'Graphic', 'User_id'),
			'levels' => array(self::HAS_MANY, 'Level', 'User_id'),
			'messages' => array(self::HAS_MANY, 'Message', 'User_to_id'),
			'musics' => array(self::HAS_MANY, 'Music', 'User_id'),
			'projects' => array(self::HAS_MANY, 'Project', 'leader_id'),
			'screens' => array(self::HAS_MANY, 'Screen', 'User_id'),
			'sounds' => array(self::HAS_MANY, 'Sound', 'User_id'),
			'timesheets' => array(self::HAS_MANY, 'Timesheet', 'User_id'),
			'company' => array(self::BELONGS_TO, 'Company', 'company_id'),
			'active_project' => array(self::BELONGS_TO, 'Project', 'active_project_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'company_id' => 'Company',
			'date' => 'Date',
			'email' => 'Email',
			'password' => 'Password',
			'name' => 'Name',
			'roles' => 'Roles',
			'activity' => 'Activity',
			'active_project_id' => 'Active Project',
			'location' => 'Location',
			'language' => 'Language',
			'timezone' => 'Timezone',
			'worktime' => 'Worktime',
			'workdays' => 'Workdays',
			'salary' => 'Salary',
			'token' => 'Token',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);

		$criteria->compare('company_id',$this->company_id);

		$criteria->compare('date',$this->date,true);

		$criteria->compare('email',$this->email,true);

		$criteria->compare('password',$this->password,true);

		$criteria->compare('name',$this->name,true);

		$criteria->compare('roles',$this->roles,true);

		$criteria->compare('activity',$this->activity,true);

		$criteria->compare('active_project_id',$this->active_project_id);

		$criteria->compare('location',$this->location,true);

		$criteria->compare('language',$this->language,true);

		$criteria->compare('timezone',$this->timezone,true);

		$criteria->compare('worktime',$this->worktime);

		$criteria->compare('workdays',$this->workdays,true);

		$criteria->compare('salary',$this->salary);

		$criteria->compare('token',$this->salary);

		return new CActiveDataProvider('User', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}