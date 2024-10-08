<?php

/**
 * This is the model class for table "Timesheet".
 *
 * The followings are the available columns in table 'Timesheet':
 * @property integer $id
 * @property integer $user_id
 * @property string $date
 * @property integer $time
 * @property string $task
 * @property integer $task_id
 * @property string $state
 * @property string $description
 */
class Timesheet extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'timesheet';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, time', 'required'),
			array('user_id, time, task_id', 'numerical', 'integerOnly'=>true),
			array('task, state, description', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, date, time, task, task_id, state, description', 'safe', 'on'=>'search'),
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
			'user_id' => 'User',
			'date' => 'Date',
			'time' => 'Time',
			'task' => 'Task',
			'task_id' => 'Task',
			'state' => 'State',
			'description' => 'Description',
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

		$criteria->compare('user_id',$this->user_id);

		$criteria->compare('date',$this->date,true);

		$criteria->compare('time',$this->time);

		$criteria->compare('task',$this->task,true);

		$criteria->compare('task_id',$this->task_id);

		$criteria->compare('state',$this->state,true);

		$criteria->compare('description',$this->description,true);

		return new CActiveDataProvider('Timesheet', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Timesheet the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}