<?php

/**
 * This is the model class for table "Change".
 *
 * The followings are the available columns in table 'Change':
 * @property integer $id
 * @property string $task
 * @property integer $task_id
 * @property string $description
 * @property string $file
 */
class Change extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'change';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('task, task_id', 'required'),
			array('task_id', 'numerical', 'integerOnly'=>true),
			array('description, file', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, task, task_id, description, file', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'task' => 'Task',
			'task_id' => 'Task',
			'description' => 'Description',
			'file' => 'File',
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

		$criteria->compare('task',$this->task,true);

		$criteria->compare('task_id',$this->task_id);

		$criteria->compare('description',$this->description,true);

		$criteria->compare('file',$this->file,true);

		return new CActiveDataProvider('Change', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Change the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}