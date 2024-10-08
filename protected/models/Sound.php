<?php

/**
 * This is the model class for table "Sound".
 *
 * The followings are the available columns in table 'Sound':
 * @property integer $id
 * @property integer $project_id
 * @property integer $user_id
 * @property string $name
 * @property string $description
 * @property string $file
 * @property integer $finish
 * @property integer $valid
 * @property string $deadline
 * @property integer $time
 * @property integer $time_est
 */
class Sound extends CActiveRecord
{
	public function __toString(){
		return strval($this->id);
	}
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sound';
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
			array('project_id, user_id, finish, valid, time, time_est', 'numerical', 'integerOnly'=>true),
			array('name, description, file, deadline', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, project_id, user_id, name, description, file, finish, valid, deadline, time, time_est', 'safe', 'on'=>'search'),
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
			'name' => 'Name',
			'description' => 'Description',
			'file' => 'File',
			'finish' => 'Finish',
			'valid' => 'Valid',
			'deadline' => 'Deadline',
			'time' => 'Time',
			'time_est' => 'Time Est',
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

		$criteria->compare('name',$this->name,true);

		$criteria->compare('description',$this->description,true);

		$criteria->compare('file',$this->file,true);

		$criteria->compare('finish',$this->finish);

		$criteria->compare('valid',$this->valid);

		$criteria->compare('deadline',$this->deadline,true);

		$criteria->compare('time',$this->time);

		$criteria->compare('time_est',$this->time_est);

		return new CActiveDataProvider('Sound', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Sound the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}