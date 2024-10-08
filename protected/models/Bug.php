<?php

/**
 * This is the model class for table "Bug".
 *
 * The followings are the available columns in table 'Bug':
 * @property integer $id
 * @property integer $project_id
 * @property integer $user_id
 * @property string $description
 * @property string $trigger
 * @property integer $severity
 * @property string $message
 * @property string $picture
 * @property integer $code
 * @property integer $test
 * @property integer $time
 */
class Bug extends CActiveRecord
{
	public function __toString(){
		return strval($this->id);
	}
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'bug';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('project_id', 'required'),
			array('project_id, user_id, severity, code, test, time', 'numerical', 'integerOnly'=>true),
			array('description, trigger, message, picture', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, project_id, user_id, description, trigger, severity, message, picture, code, test, time', 'safe', 'on'=>'search'),
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
			'project' => array(self::BELONGS_TO, 'Project', 'project_id'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'project_id' => 'Project',
			'user_id' => 'User',
			'description' => 'Description',
			'trigger' => 'Trigger',
			'severity' => 'Severity',
			'message' => 'Message',
			'picture' => 'Picture',
			'code' => 'Code',
			'test' => 'Test',
			'time' => 'Time',
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

		$criteria->compare('project_id',$this->project_id);

		$criteria->compare('user_id',$this->user_id);

		$criteria->compare('description',$this->description,true);

		$criteria->compare('trigger',$this->trigger,true);

		$criteria->compare('severity',$this->severity);

		$criteria->compare('message',$this->message,true);

		$criteria->compare('picture',$this->picture,true);

		$criteria->compare('code',$this->code);

		$criteria->compare('test',$this->test);

		$criteria->compare('time',$this->time);

		return new CActiveDataProvider('Bug', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Bug the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}